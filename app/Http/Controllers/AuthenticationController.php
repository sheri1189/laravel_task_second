<?php

namespace App\Http\Controllers;

ini_set('memory_limit', '-1');
ini_set('max_execution_time', '0');

use App\Models\{Credentials, User};
use Illuminate\Support\Facades\{Hash, Cookie, DB, Mail};
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Carbon\Carbon;
use Laravel\Socialite\Facades\Socialite;

class AuthenticationController extends Controller
{
    public function signin(Request $request)
    {
        $data = DB::table('users')->where("email", $request->email)->where("is_email_verified", 1)->first();
        if ($data) {
            if (Hash::check($request->input("password"), $data->password)) {
                if ($request->has("rememberme")) {
                    Cookie::queue('useremail', $request->email, 60 * 60 * 24 * 365);
                    Cookie::queue('userpassword', $request->password, 60 * 60 * 24 * 365);
                    Cookie::queue('remember', $request->rememberme, 60 * 60 * 24 * 365);
                } else {
                    Cookie::queue('useremail', '');
                    Cookie::queue('userpassword', '');
                    Cookie::queue('remember', '');
                }
                if ($data->user_status == 1) {
                    session()->put('user_added', $data->id);
                    return redirect('/dashboard')->with('success', 200);
                } else {
                    return redirect('/')->with('error', 400);
                }
            } else {
                return redirect('/')->with('error', 300);
            }
        } else {
            return redirect('/')->with('error', 300);
        }
    }
    public function logout()
    {
        if (session()->has('user_added')) {
            session()->forget('user_added');
            return redirect('/');
        } else {
            return redirect('/');
        }
    }
    public function resetLink(Request $request)
    {
        $request->validate(
            [
                "email" => 'email',
            ],
            [
                'email.email' => 'Please Use a valid email format',
            ]
        );
        $data = DB::table('users')->where("email", "=", $request->email)->first();
        if ($data) {
            session()->put('reset-token', $request->email);
            if ($this->isOnline()) {
                $mail_data = [
                    'recipient' => $request->email,
                    'formEmail' => 'shaharyarahmad230@gmail.com',
                    'name' => $data->first_name,
                    'subject' => "Print On Demand System",
                    'body' => $request->email,
                ];
                Mail::send('Authentication.reset-template', $mail_data, function ($message) use ($mail_data) {
                    $message->to($mail_data['recipient'])
                        ->from($mail_data['formEmail'], $mail_data['name'])
                        ->subject($mail_data['subject']);
                });
                return redirect('/forget')->with('success', 200);
            } else {
                return redirect('/forget')->with('error', 300);
            }
        } else {
            return redirect('/forget')->with('error', 400);
        }
    }
    public function resetPassword($email)
    {
        return view('Authentication.reset', compact("email"));
    }
    public function updatePassword(Request $request)
    {
        $request->validate(
            [
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6'
            ],
            [
                'password.confirmed' => 'Your Password is not Matched with the Confirm Password',
            ]
        );
        if (DB::table('users')->where('email', $request->email)->update([
            "password" => Hash::make($request->password),
        ])) {
            $user = DB::table('users')->where('email', $request->email)->first();
            session()->put('user_added', $user->id);
            return redirect('/dashboard')->with('success', 200);
        };
    }
    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            "email" => "unique:users,email,$id",
        ]);
        $user = User::where('id', $id)->first();
        User::where('id', $id)->update([
            "first_name" => $user->first_name,
            "last_name" => $user->last_name,
            "email" => $user->email,
            "dob" => $user->dob,
            "contact_number" => $user->contact_number,
            "password" => $user->password,
            "street_address" => $user->address,
            "country" => $user->country,
            "state" => $user->state,
            "city" => $user->city,
            "zip_code" => $user->zip_code,
            "email_verified_at" => $user->zip_code,
            "is_email_verified" => $user->is_email_verified,
            "role" => $user->role,
            "user_status" => $user->user_status,
        ]);
        return response()->json([
            "message" => 200,
        ]);
    }
    public function isOnline($site = "https://mail.google.com/mail/u/0/#inbox")
    {
        if (@fopen($site, "r")) {
            return true;
        } else {
            return false;
        }
    }
}
