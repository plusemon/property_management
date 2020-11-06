<?php

namespace App\Http\Controllers;

use App\Accountant;
use App\Payment;
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
        $active = $accountants->where('status',1)->first();
        $balance = $active ? Accountant::balance($active->id):0;

        return view('accountant.index', compact('accountants','active','balance'));
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

       $active = Accountant::active();
        if ($active) {
            $active->status = 0;
            $active->balance = 0;
            $active->end = now();
            $active->ebalance = Accountant::balance($active->id)['now'];
            $active->save();
        }

        $accountant = new Accountant();
        $accountant->user_id = $request->user_id;

        if ($request->filled('start')) {
            $accountant->start = $request->start;
        }else{
            $accountant->start = now();
        }
        if ($active) {
            $accountant->sbalance = $active->ebalance;
        }else{
            $accountant->sbalance = $request->sbalance;
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
