<?php

namespace App\Http\Controllers;

use App\Accountant;
use App\Expense;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expense::all();
        $types = Type::whereType('expense')->get();
        return view('expense.index', compact('expenses', 'types'));
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
            "invoice" => "required|string",
            "type_id" => "required|integer",
            "amount" => "required|integer|gt:0",
        ]);

        $loan = new Expense();
        $loan->id = $request->serial;
        $loan->type_id = $request->type_id;
        $loan->taker_id = $request->taker_id;
        if (!($loan->accountant_id = Accountant::active()->id)) {
            return redirect(route('accountant.index'))->with('info','Set an accountant first');
        }
        $loan->entry_id = Auth::id();

        $loan->invoice = $request->invoice;
        $loan->amount = $request->amount;
        $loan->description = $request->description;
        $loan->created_at = $request->created_at;
        $loan->save();

        return redirect()->back()->with('success', 'Added Successfull');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
       return redirect()->back()->with('success','Deleted Succefully');
    }
}
