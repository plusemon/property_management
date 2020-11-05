<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesPermissionSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions

        Permission::create(['name' => 'property manage']);
        Permission::create(['name' => 'property view']);

        Permission::create(['name' => 'tent manage']);
        Permission::create(['name' => 'tent view']);

        Permission::create(['name' => 'agreement manage']);
        Permission::create(['name' => 'agreement view']);

        Permission::create(['name' => 'borrow manage']);
        Permission::create(['name' => 'borrow view']);

        Permission::create(['name' => 'wellpart manage']);
        Permission::create(['name' => 'wellpart view']);

        Permission::create(['name' => 'expense manage']);
        Permission::create(['name' => 'expense view']);

        Permission::create(['name' => 'loan manage']);
        Permission::create(['name' => 'loan view']);

        Permission::create(['name' => 'report view']);
        Permission::create(['name' => 'user manage']);

        // create roles
        Role::create(['name' => 'user']);
        // Role::create(['name' => 'accountant']);
        Role::create(['name' => 'admin']);
        $super_admin = Role::create(['name' => 'super-admin']);
        // assign permissions
        $super_admin->syncPermissions(Permission::all());
    }
}
