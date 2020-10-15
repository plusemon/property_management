<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RolesPermissionSeeder extends Seeder
{ /**
    * Create the initial roles and permissions.
    *
    * @return void
    */
   public function run()
   {
       // Reset cached roles and permissions
       app()[PermissionRegistrar::class]->forgetCachedPermissions();

       // create permissions
       Permission::create(['name' => 'manage type']);
       Permission::create(['name' => 'manage property']);
       Permission::create(['name' => 'manage tent']);
       Permission::create(['name' => 'manage agreement']);
       Permission::create(['name' => 'manage borrow']);
       Permission::create(['name' => 'manage wellpart']);
       Permission::create(['name' => 'manage expence']);
       Permission::create(['name' => 'manage loan']);
       Permission::create(['name' => 'manage user']);

       // create roles and assign existing permissions
       $role1 = Role::create(['name' => 'user']);
       $role1->givePermissionTo('manage agreement');
       $role1->givePermissionTo('manage loan');

       $role2 = Role::create(['name' => 'admin']);
       // $admin->givePermissionTo('publish articles');
       // $admin->givePermissionTo('unpublish articles');

       $role3 = Role::create(['name' => 'super-admin']);
       // gets all permissions via Gate::before rule; see AuthServiceProvider

       // create demo users
       $user = User::factory()->create([
           'name' => 'Example User',
           'email' => 'test@mail.com',
       ]);
       $user->assignRole($role1);

       $user = User::factory()->create([
           'name' => 'Example Admin User',
           'email' => 'admin@mail.com',
       ]);
       $user->assignRole($role2);

       $user = User::factory()->create([
           'name' => 'Example Super-Admin User',
           'email' => 'superadmin@mail.com',
       ]);
       $user->assignRole($role3);
   }
}
