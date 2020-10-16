<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('user.index', compact('users'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
       ]);

        return redirect()->back()->with('success', 'Added Succefully');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('user.edit', compact('user','roles','permissions'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['email', 'max:255'],
            'password' => ['confirmed'],
        ]);

        $user->name = $request->name;

        if ($request->filled('email')) {
            $user->email = $request->email;
        }
        if ($request->filled('password')) {
            $user->password = Hash::make($request['password']);
        }

        $user->syncPermissions($request->permissions);
        $user->syncRoles($request->roles);

        $user->save();

        return redirect(route('user.index'))->with('success', 'Updated Succefully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Deleted Succefully');
    }
}
