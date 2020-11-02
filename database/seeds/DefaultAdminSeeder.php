<?php

use App\Accountant;
use App\User;
use App\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin')
        ])->assignRole('super-admin');

        $accountant =
        User::create([
            'name' => 'Accountant',
            'email' => 'accountant@mail.com',
            'password' => Hash::make('accountant')
        ]);

        Accountant::create([
            'user_id' => $accountant->id,
            'start' => today(),
            'sbalance' => 0,
            'balance' => 0,
            'status' => 1,
        ]);

        Setting::create([
            'name' => 'Admin Panel',
            'whatsnew' => 1,
        ]);
    }
}
