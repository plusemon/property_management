<?php

namespace App\Http\Controllers;

use App\Accountant;
use Illuminate\Http\Request;

class AccountantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountants = Accountant::all();
        $actived = $accountants->where('status',1)->first();
        return view('accountant.index',compact('accountants','actived'));
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

    //     // check if alredy assigned the requested user
    //    if ($request->user_id == Accountant::get()->user_id) {

    //    }

       $actived = Accountant::where('status',1)->first();
        if ($actived) {
            $actived->status = 0;
            $actived->end = today();
            $actived->ebalance = $actived->balance;
            $actived->balance = 0;
            $actived->save();
        }

        $accountant = new Accountant();
        $accountant->user_id = $request->user_id;

        if ($request->filled('start')) {
            $accountant->start = $request->start;
        }else{
            $accountant->start = today();
        }
        if ($actived) {
            $accountant->sbalance = $actived->ebalance;
        }else{
            $accountant->sbalance = $request->sbalance;
        }

        if ($actived) {
            $accountant->balance = $actived->ebalance;
        }else{
            $accountant->balance = $request->sbalance;
        }

        $accountant->status = 1;
        $accountant->save();

        return redirect()->back()->with('success','Assigned Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function show(Accountant $accountant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function edit(Accountant $accountant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accountant $accountant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accountant  $accountant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accountant $accountant)
    {
        //
    }
}
