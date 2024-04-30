<?php

namespace App\Http\Controllers;

use App\Models\Design_Images;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where("id", session()->get("user_added"))->first();
        $latest_manage_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->count();
        $latest_admin_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 0)->count();
        $latest_deny_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('denied_reason')->where('admin_approval',2)->count();
        $latest_approve_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 1)->count();
        $alluser = User::latest()->get();
        $compact = compact("user", "alluser","latest_manage_designs","latest_manage_designs","latest_admin_designs","latest_approve_designs","latest_deny_designs");
        return view('User.view')->with($compact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add_user()
    {
        $user = User::where("id", session()->get("user_added"))->first();
        $latest_manage_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->count();
        $latest_admin_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 0)->count();
        $latest_deny_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('denied_reason')->where('admin_approval',2)->count();
        $latest_approve_designs = Design_Images::whereNotNull('niche_id')->whereNotNull('collection_id')->whereNotNull('brand_name')->whereNotNull('title')->whereNotNull('bullet_point_1')->whereNotNull('bullet_point_2')->whereNotNull('description')->where('admin_approval', 1)->count();
        $allrole = Role::where('user_id', session()->get('user_added'))->where('role_status', 1)->latest()->get();
        $compact = compact("user", "allrole","latest_manage_designs","latest_deny_designs","latest_admin_designs","latest_approve_designs");
        return view('User.add')->with($compact);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "email" => 'unique:users,email',
        ]);
        date_default_timezone_set("Asia/Karachi");
        User::create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "dob" => $request->dob,
            "contact_number" => $request->contact_no,
            "password" => Hash::make($request->password),
            "street_address" => $request->address,
            "country" => $request->country,
            "state" => $request->state,
            "city" => $request->city,
            "zip_code" => $request->zip_code,
            "email_verified_at" => date('Y-m-d h:i:s A'),
            "is_email_verified" => 1,
            "role" => $request->role,
            "user_status" => 1,
        ]);
        return response()->json([
            "message" => 200,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::where('id', $id)->first();
        $status = $user->user_status;
        if ($status == 1) {
            User::where('id', $user->id)->update([
                "user_status" => 0,
            ]);
        } else {
            User::where('id', $user->id)->update([
                "user_status" => 1,
            ]);
        }
        return response()->json([
            "message" => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::where("id", $id)->first();
        $allrole = Role::where('user_id', session()->get('user_added'))->where('role_status', 1)->latest()->get();
        return response()->json([
            "message" => $user,
            "roles" => $allrole,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "email" => "unique:users,email,$id",
        ]);
        $user = User::where('id', $id)->first();
        User::where('id', $id)->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "dob" => $request->dob,
            "contact_number" => $request->contact_no,
            "password" => $user->password,
            "street_address" => $request->address,
            "country" => $request->country,
            "state" => $request->state,
            "city" => $request->city,
            "zip_code" => $request->zip_code,
            "email_verified_at" => $user->email_verified_at,
            "is_email_verified" => 1,
            "role" => $request->role,
            "user_status" => $user->user_status,
        ]);
        return response()->json([
            "module" => "user",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->delete();
        return response()->json([
            "message" => 200,
        ]);
    }
    public function getPermission($id)
    {
        $array = array();
        $data = Role::where('id', $id)->first();
        if ($data->role_permission == "Custom") {
            $array[0] = "Custom Access";
            if ($data->dashboard != "") {
                $array[1] = "Dashboard";
            }
            if ($data->nish != "") {
                $array[2] = "Nish";
            }
            if ($data->collection != "") {
                $array[3] = "Collection";
            }
            if ($data->design != "") {
                $array[4] = "Design";
            }
            if ($data->role != "") {
                $array[5] = "Roles";
            }
            if ($data->user != "") {
                $array[6] = "Users";
            }
            if ($data->design_manage != "") {
                $array[7] = "Design Management";
            }
        } else {
            $array[0] = "All Access";
        }
        return response()->json([
            "message" => $array,
        ]);
    }
}
