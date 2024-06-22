<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            "password" => Hash::make("121212")

        ]);
        $admin->assignRole('Admin');

        $editor = User::create([
            'name' => "Khine",
            "email" => "khine1245@gmail.com",
            "password" => Hash::make("123456")

        ]);
        $editor->assignRole('Editor');
    }
}
