<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.user.roles.index',compact('roles','permissions'));
    }

    public function store(Request $request)
    {
        $permissions = $request->permissions;
        $role = Role::create(['name' => $request->name] );
        $role->givePermissionTo($permissions);

        return redirect()->back()->with('success','Added Succefully');
    }

    public function destroy(Request $request)
    {
        Role::findByName($request->name)->delete();
        return redirect()->back()->with('success','Deleted Succefully');
    }
}
