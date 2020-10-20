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
        Permission::create(['name' => 'manage dashboard']);
        Permission::create(['name' => 'manage rent']);
            Permission::create(['name' => 'manage type']);
            Permission::create(['name' => 'manage property']);
            Permission::create(['name' => 'manage tent']);
            Permission::create(['name' => 'manage agreement']);
            Permission::create(['name' => 'manage payment']);
        Permission::create(['name' => 'manage borrow']);
        Permission::create(['name' => 'manage wellpart']);
        Permission::create(['name' => 'manage expense']);
        Permission::create(['name' => 'manage loan']);
        Permission::create(['name' => 'manage user']);
            Permission::create(['name' => 'manage permission']);
        Permission::create(['name' => 'manage report']);
        Permission::create(['name' => 'manage backup']);
        Permission::create(['name' => 'manage setting']);

        // create roles
        Role::create(['name' => 'user']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'super-admin']);
    }
}
