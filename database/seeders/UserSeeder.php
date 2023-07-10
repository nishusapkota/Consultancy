<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin1234'),
            'username' => 'admin',
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'University',
            'email' => 'university@university.com',
            'password' => Hash::make('university1234'),
            'username' => 'university',
            'role' => 'university'
        ]);
    }
}
