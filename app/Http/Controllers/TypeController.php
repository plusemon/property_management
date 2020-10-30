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
