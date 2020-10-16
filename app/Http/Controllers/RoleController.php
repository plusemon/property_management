<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('user.roles.index',compact('roles','permissions'));
    }

    public function store(Request $request)
    {
        $permissions = $request->permissions;
        $role = Role::create(['name' => $request->name]);
        $role->givePermissionTo($permissions);

        return redirect()->back()->with('success', 'Added Succefully');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('user.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $permissions = $request->permissions;
        $role->update(['name' => $request->name]);
        $role->syncPermissions($permissions);

        return redirect('admin/permission')->with('success', 'Updated Succefully');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('success', 'Deleted Succefully');
    }
}
