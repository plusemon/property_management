<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $permissions = Permission::all();
        return view('admin.user.index', compact('users','permissions'));
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

       $user->givePermissionTo($request->permissions);

        return redirect()->back()->with('success', 'Added Succefully');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $permissions = Permission::all();
        return view('admin.user.edit', compact('user','permissions'));
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

        $user->givePermissionTo($request->permissions);

        $user->save();

        return redirect('admin/user')->with('success', 'Updated Succefully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Deleted Succefully');
    }
}
