<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "role_id" => 1,
            "gender_id" => 1,
            "first_name" => "John",
            "last_name" => "Smith",
            "email" => "john@gmail.com",
            "password" => bcrypt("password123"),
            "display_picture" => "default.png"
        ]);
        User::create([
            "role_id" => 2,
            "gender_id" => 1,
            "first_name" => "David",
            "last_name" => "Jones",
            "email" => "david@gmail.com",
            "password" => bcrypt("password123"),
            "display_picture" => "default.png"
        ]);
        User::create([
            "role_id" => 2,
            "gender_id" => 2,
            "first_name" => "Susan",
            "last_name" => "Brown",
            "email" => "susan@gmail.com",
            "password" => bcrypt("password123"),
            "display_picture" => "default.png"
        ]);
        User::create([
            "role_id" => 1,
            "gender_id" => 2,
            "first_name" => "Alice",
            "last_name" => "White",
            "email" => "alice@gmail.com",
            "password" => bcrypt("password123"),
            "display_picture" => "default.png"
        ]);
    }
}
