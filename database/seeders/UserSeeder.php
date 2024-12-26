<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    public function run()
    {
        // Example users
        User::create([
            'name' => 'admin',
            'email' =>'admin'.'@gmail.com',
            'password' =>Hash::make('password'),
            'email_verified_at' => now(),
            'created_at'=>	now(),
            'updated_at'=>now(),
        ]);

//        DB::table('users')->insert([
//            'name' => 'admin',
//            'email' =>'admin'.'@gmail.com',
//            'password' =>Hash::make('password'),
//            'email_verified_at' => now(),
//            'created_at'=>	now(),
//            'updated_at'=>now(),
//        ]);
        // Add more users as needed
    }
}
