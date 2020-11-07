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

        $expense = new Expense();
        $expense->id = $request->serial;
        $expense->type_id = $request->type_id;
        $expense->taker_id = $request->taker_id;
        if (!($expense->accountant_id = Accountant::active()->id)) {
            return redirect(route('accountant.index'))->with('info','Set an accountant first');
        }
        $expense->entry_id = Auth::id();

        $expense->invoice = $request->invoice;
        $expense->amount = $request->amount;
        $expense->description = $request->description;
        $expense->created_at = $request->created_at;
        $expense->save();

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
        //return view('expense.show',compact('expense'))
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $types = Type::whereType('expense')->get();
        return view('expense.edit', compact('expense','types'));
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
        // return $request;
        $request->validate([
            "invoice" => "required|string",
            "type_id" => "required|integer",
            "amount" => "required|integer|gt:0",
        ]);

        $expense->type_id = $request->type_id;
        $expense->taker_id = $request->taker_id;

        $expense->invoice = $request->invoice;
        $expense->amount = $request->amount;
        $expense->description = $request->description;
        $expense->created_at = $request->created_at;
        $expense->save();

        return redirect(route('expense.index'))->with('success', 'Updated Successfull');
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
