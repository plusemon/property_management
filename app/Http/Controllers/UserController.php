<?php

namespace App\Http\Controllers;

use App\Loan;
use App\Type;
use App\User;
use App\Borrow;
use App\Expense;
use App\Payment;
use App\Wellpart;
use App\LoanReturn;
use App\PaymentReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Mail\AddUserByAdminNotify;
use App\Mail\RegUserAdminNotify;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Collection;

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

        if ($user) {
            Mail::to($user->email)->send(new RegUserAdminNotify());
        }

        return redirect()->back()->with('success', 'Added succefully and a mail has been sent to the user');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('user.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, User $user)
    {

        // ONLY FOR STATUS UPDATE AND RETURN
        if ($request->has('status')) {
            if ($user->email_verified_at) {
                $user->email_verified_at = null;
            } else {
                $user->email_verified_at = now();
                if ($user) {
                    Mail::to($user->email)->send(new AddUserByAdminNotify($user));
                }
            }
            $user->save();
            return redirect()->back()->with('success', 'User status updated and Notified the user');
        }

        // FOR UPDATE A USER INFORMATION
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


    public function report(Request $request)
    {
        $data = new Collection();
        $expenses = Expense::all()->each(function ($data) {
            $data->type = 'Expense';
        });

        $borrows = Borrow::all()->each(function ($data) {
            $data->type = 'Borrow';
        });

        $loans = Loan::all()->each(function ($data) {
            $data->type = 'Loan';
        });

        $loanReturns = LoanReturn::all()->each(function ($data) {
            $data->type = 'Loan Return';
            $data->state = true;
        });

        $wellparts = Wellpart::all()->each(function ($data) {
            $data->type = 'Well Part';
        });

        $payments = Payment::all()->each(function ($data) {
            $data->type = 'Payment';
            $data->state = true;
        });

        $paymentRefunds = PaymentReturn::all()->each(function ($data) {
            $data->type = 'Payment Return';
        });

        if ($request->expense) {
            $data = $data->mergeRecursive($expenses);
        }
        if ($request->borrow) {
            $data = $data->mergeRecursive($borrows);
        }
        if ($request->loan) {
            $data = $data->mergeRecursive($loans);
        }
        if ($request->return) {
            $data = $data->mergeRecursive($loanReturns);
        }
        if ($request->wellpart) {
            $data = $data->mergeRecursive($wellparts);
        }
        if ($request->payment) {
            $data = $data->mergeRecursive($payments);
        }
        if ($request->refund) {
            $data = $data->mergeRecursive($paymentRefunds);
        }

        if ($request->filled('user_id')) {
            $data = $data->where('user_id', $request->user_id);
        }

        if ($request->filled('from')) {
            $data = $data->where('created_at', '>=', $request->from);
        }
        if ($request->filled('to')) {
            $data = $data->where('created_at', '<=', Carbon::createFromFormat('Y-m-d', $request->to)->addDays(1));
        }

        $reports = $data->sortBy('updated_at');


        return view('report.index', compact('reports'));
    }
}
