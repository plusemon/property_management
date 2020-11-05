<?php

use App\Accountant;
use App\User;
use App\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultAdminSeeder extends Seeder
{
    public function run()
    {
        // SUPER ADMIN
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin')
        ])->assignRole('super-admin');

        // SAMPLE USER
        User::create([
            'name' => 'Simple User',
            'email' => 'user@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user')
        ])->assignRole('user');

        Setting::create([
            'name' => 'Admin Panel',
            'whatsnew' => 1,
        ]);
    }
}
