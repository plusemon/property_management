<?php

namespace App\Http\Controllers;

use App\Accountant;
use App\Borrow;
use Illuminate\Http\Request;
use App\User;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrows = Borrow::all();
        return view('borrow.index', compact('borrows'));
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

        $request->validate([
            'serial' => 'integer|unique:borrows,id',
            'user_id' => 'required|integer',
            'amount' => 'required|integer|gt:0',
            'description' => 'required',
        ]);

        $borrow = new Borrow();
        $borrow->id = $request->serial;
        $borrow->user_id = $request->user_id;
        $borrow->accountant_id = Accountant::get()->user->id;
        $borrow->entry_id = auth()->user()->id;
        $borrow->amount = $request->amount;
        $borrow->description = $request->description;
        $borrow->created_at = $request->created_at;
        $borrow->save();

        return redirect()->back()->with('success','Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function show(Borrow $borrow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Borrow $borrow)
    {
        $users = User::all();
        return view('borrow.edit', compact('borrow','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Borrow $borrow)
    {
        $borrow->update($request->all());
        return redirect(route('borrow.index'))->with('success','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Borrow  $borrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Borrow $borrow)
    {
        $borrow->delete();
        return redirect()->back()->with('success','Added Successfully');
    }
}
