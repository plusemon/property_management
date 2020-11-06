<?php

namespace App\Http\Controllers;

use App\Accountant;
use App\Loan;
use App\LoanReturn;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{

    public function index()
    {
        $loans = Loan::all();
        $returns = LoanReturn::all();
        // $loans = $loans->mergeRecursive($returns);
        // $loans = $loans->sortByDesc('updated_at');

        return view('loan.index', compact('loans','returns'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'amount' => 'required|integer|gt:0',
            'return_amount' => 'required|integer|gte:amount',
            'return_date' => 'required|date',
        ]);

        $loan = new Loan();
        $loan->id = $request->serial;
        $loan->taker_id = $request->user_id;
        $loan->accountant_id = Accountant::get()->user->id;
        $loan->entry_id = Auth::id();
        $loan->description = $request->description;
        $loan->amount = $request->amount;
        $loan->return_amount = $request->return_amount;
        $loan->return_date = $request->return_date;
        $loan->created_at = $request->created_at;
        $loan->save();
        return redirect()->back()->with('success', 'Oparation Successfull');
    }


    public function edit(Loan $loan)
    {
        $users = User::role('user')->get();
        return view('loan.edit', compact('loan', 'users'));
    }


    public function update(Request $request, Loan $loan)
    {

        $request->validate([
            'user_id' => 'required',
            'amount' => 'required',
            'return_amount' => 'required',
            'return_date' => 'required',
        ]);

        if ($request->has('id')) {
            $loan->id = $request->id;
        }
        $loan->user_id = $request->user_id;

        if ($request->has('id')) {
            $loan->description = $request->description;
        }

        $loan->amount = $request->amount;
        $loan->return_amount = $request->return_amount;
        $loan->return_date = $request->return_date;
        $loan->created_at = $request->created_at;
        $loan->entry = Auth::id();
        $loan->save();

        return redirect()->back()->with('success', 'Updated Successfull');
    }


    public function destroy(Loan $loan)
    {
        $loan->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
