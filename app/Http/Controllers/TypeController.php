<?php

namespace App\Http\Controllers;

use App\Loan;
use App\Type;
use App\Borrow;
use App\Expense;
use App\Payment;
use App\Wellpart;
use App\LoanReturn;
use App\PaymentReturn;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;


class TypeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->filled('filter')) {
            $types = Type::where('type', $request->filter)->get();
        } else {
            return redirect(route('dashboard.index'))->with('warning', 'Not a valid request');
        }
        return view('type.index', compact('types'));
    }

    public function report(Request $request)
    {
        if ($request->filled('user_id')) {
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
                $data->state = 'add';
            });

            $wellparts = Wellpart::all()->each(function ($data) {
                $data->type = 'Well Part';
            });

            $payments = Payment::all()->each(function ($data) {
                $data->type = 'Payment';
            });

            $paymentRefunds = PaymentReturn::all()->each(function ($data) {
                $data->type = 'Payment Return';
                $data->state = 'add';
            });

            $data = $expenses
                ->mergeRecursive($borrows)
                ->mergeRecursive($loans)
                ->mergeRecursive($loanReturns)
                ->mergeRecursive($wellparts)
                ->mergeRecursive($payments)
                ->mergeRecursive($paymentRefunds);


            $data = $data->where('user_id', $request->user_id);

            if ($request->filled('from')) {
                $data = $data->where('created_at', '>=', $request->from);
            }
            if ($request->filled('to')) {
                $data = $data->where('created_at', '<=', $request->to);
            }
            $reports = $data->sortBy('updated_at');
        }else{
            $reports = [];
        }

        return view('report.index', compact('reports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);

        $type = new Type();
        $type->name = $request->name;
        $type->type = $request->type;
        if ($request->created_at) {
            $type->created_at = $request->created_at;
        }
        $type->save();

        return redirect()->back()->with('success', 'Added Succefully');
    }


    public function edit(Type $type)
    {
        return view('type.edit', compact('type'));
    }

    public function update(Request $request, Type $type)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $type->name = $request->name;
        if ($request->created_at) {
            $type->created_at = $request->created_at;
        }
        $type->save();

        return redirect(route('type.index', 'filter=' . $type->type))->with('success', 'Updated Succefully');
    }

    public function destroy(Type $type)
    {
        $type->Delete();
        return redirect()->back()->with('success', 'Deleted Succefully');
    }
}
