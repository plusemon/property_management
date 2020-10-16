<?php

use App\User;
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
        $admin = [
            'name' => 'Super Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin')
        ];

        $admin = User::create($admin);

        $admin->assignRole('super-admin');
    }
}
