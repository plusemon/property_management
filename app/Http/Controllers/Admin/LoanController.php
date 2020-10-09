<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Loan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loans = Loan::all();
        $users = User::all();

        return view('admin.loan.index', compact('loans','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'user_id' => 'required',
            'amount' => 'required',
            'return_amount' => 'required',
            'return_date' => 'required',
        ]);

        $loan = new Loan();

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
        
        return redirect()->back()->with('success','Oparation Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Loan $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Loan $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        $users = User::all();
        return view('admin.loan.edit', compact('loan','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Loan $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        // return $request;
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
        
        return redirect()->back()->with('success','Updated Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Loan $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        $loan->delete();
        return redirect('admin/loan')->with('success', 'Deleted Successfully');
    }
}
