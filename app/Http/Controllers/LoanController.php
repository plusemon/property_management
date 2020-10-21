<?php

namespace App\Http\Controllers;

use App\Loan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{

    public function index()
    {
        $loans = Loan::all();
        $users = User::all();
        return view('loan.index', compact('loans', 'users'));
    }

    public function store(Request $request)
    {
        if ($request->type == 'loan') {
            $request->validate([
                'user_id' => 'required',
                'amount' => 'required|integer|gt:0',
                'return_amount' => 'required|integer|gt:amount',
                'return_date' => 'required|date',
            ]);

            $loan = new Loan();
            $loan->id = $request->serial;
            $loan->type = $request->type;
            $loan->user_id = $request->user_id;
            $loan->description = $request->description;
            $loan->amount = $request->amount;
            $loan->return_amount = $request->return_amount;
            $loan->return_date = $request->return_date;
            $loan->created_at = $request->created_at;
            $loan->entry = Auth::id();
            $loan->save();
        }
        elseif($request->type == 'return')
        {
            $request->validate([
                'user_id' => 'required',
                'amount' => 'required|integer|gt:0',
            ]);

            $return = new Loan();
            $return->type = $request->type;
            $return->user_id = $request->user_id;
            $return->amount = $request->amount;
            $return->description = $request->description;
            $return->created_at = $request->created_at;
            $return->entry = Auth::id();
            $return->save();
        }
        else
        {
            return redirect()->back()->with('error', 'somthing went wrong');
        }
        return redirect()->back()->with('success', 'Oparation Successfull');
    }


    public function edit(Loan $loan)
    {
        $users = User::all();
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
