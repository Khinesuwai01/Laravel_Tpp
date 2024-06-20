<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => "Yoon",
            "email" => "yoon45@gmail.com",
            "password" => "121212"

        ]);
        $admin->assignRole('Admin');

        $editor = User::create([
            'name' => "Khine",
            "email" => "khine1245@gmail.com",
            "password" => "123456"

        ]);
        $editor->assignRole('Editor');
    }
}
