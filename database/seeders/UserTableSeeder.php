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
            'name' => "Lee Dae Yoon",
            "email" => "lde000@gmail.com",
            "password" => Hash::make("010101")

        ]);
        $admin->assignRole('Admin');

        $editor = User::create([
            'name' => "Khine Su Wai",
            "email" => "ksw888@gmail.com",
            "password" => Hash::make("080808")

        ]);
        $editor->assignRole('Editor');
    }
}
