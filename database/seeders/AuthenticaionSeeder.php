<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthenticaionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        date_default_timezone_set("Asia/Karachi");
        $user = User::create([
            "first_name" => 'Admin',
            "last_name" => 'Admin',
            "email" => 'admin@gmail.com',
            "dob" => '12 Oct, 2023',
            "contact_number" => '92-374737373',
            "password" => Hash::make('password'),
            "street_address" => 'House # 00',
            "country" => 'Pakistan',
            "state" => 'Punjab',
            "city" => 'Faisalabad',
            "zip_code" => 3800,
            "email_verified_at" => date('Y-m-d h:i:s A'),
            "is_email_verified" => 1,
            "role" => 1,
            "user_status" => 1,
        ]);
        Role::create([
            "role_name" => "admin",
            "role_permission" => "All",
            "role_status" => 1,
            "user_id" => $user->id,
        ]);
    }
}
