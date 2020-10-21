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
        Permission::create(['name' => 'type entry']);
        Permission::create(['name' => 'type view']);

        Permission::create(['name' => 'property entry']);
        Permission::create(['name' => 'property view']);

        Permission::create(['name' => 'tent entry']);
        Permission::create(['name' => 'tent view']);

        Permission::create(['name' => 'agreement entry']);
        Permission::create(['name' => 'agreement view']);

        Permission::create(['name' => 'payment entry']);
        Permission::create(['name' => 'payment view']);

        Permission::create(['name' => 'borrow entry']);
        Permission::create(['name' => 'borrow view']);

        Permission::create(['name' => 'wellpart entry']);
        Permission::create(['name' => 'wellpart view']);

        Permission::create(['name' => 'expense entry']);
        Permission::create(['name' => 'expense view']);

        Permission::create(['name' => 'loan entry']);
        Permission::create(['name' => 'loan view']);

        Permission::create(['name' => 'user entry']);
        Permission::create(['name' => 'user view']);

        Permission::create(['name' => 'permission manage']);

        Permission::create(['name' => 'report view']);

        Permission::create(['name' => 'backup manage']);

        Permission::create(['name' => 'setting manage']);

        // create roles
        Role::create(['name' => 'user']);

        $admin = Role::create(['name' => 'admin']);
        $admin->syncPermissions(Permission::all());

        $super_admin = Role::create(['name' => 'super-admin']);
        $super_admin->syncPermissions(Permission::all());
    }
}
