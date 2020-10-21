<?php

namespace App\Http\Controllers;

use App\Payment;
use App\PaymentReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'payment_id' => 'required|integer',
            'amount' => 'required|integer|gt:0',
        ]);

        if (!Payment::find($request->payment_id)) {
            return redirect()->back()->with('info','Payment not found');
        }

        $refund = new PaymentReturn();
        $refund->payment_id = $request->payment_id;
        $refund->user_id = Auth::id();
        $refund->amount = $request->amount;
        $refund->description = $request->description;
        $refund->save();
        return redirect()->back()->with('success', 'Payment Refund Successfull');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentReturn  $paymentReturn
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentReturn $paymentReturn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentReturn  $paymentReturn
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentReturn $paymentReturn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentReturn  $paymentReturn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentReturn $paymentReturn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentReturn  $paymentReturn
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentReturn $paymentReturn)
    {
        //
    }
}
