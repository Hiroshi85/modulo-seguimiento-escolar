<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => "Bruno",
            'email' => "t033300120@unitru.edu.pe",
            'password' => Hash::make(env("ADMIN_USER_PASSWORD")),
        ]);
        $user->assignRole('admin');
    }
}
