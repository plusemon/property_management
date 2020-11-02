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
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin')
        ])->assignRole('super-admin');

        Setting::create([
            'name' => 'Admin Panel',
            'whatsnew' => 1,
        ]);
    }
}
