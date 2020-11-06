<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Accountant;
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
            'amount' => 'required|integer|lte:paid',
            'method' => 'required',
        ]);

        if (!Payment::find($request->payment_id)) {
            return redirect()->back()->with('info', 'Payment not found');
        }

        $refund = new PaymentReturn();
        $refund->payment_id = $request->payment_id;
        $refund->accountant_id = Accountant::get()->user->id;
        $refund->entry_id = Auth::id();
        $refund->amount = $request->amount;
        $refund->description = $request->description;
        $refund->method = $request->method;

        if ($request->method == 'bank') {
            $request->validate([
                'bank' => 'required|string',
                'account' => 'required|integer',
                'branch' => 'required|string',
                'cheque' => 'required|string',
            ]);

            $refund->bank = $request->bank;
            $refund->account = $request->account;
            $refund->branch = $request->branch;
            $refund->cheque = $request->cheque;
            $refund->attachment = $request->attachment;
        }
        elseif ($request->method == 'wallet') {

            $agreement = Payment::findOrFail($request->payment_id)->agreement;

            if ($agreement->wallet >= $request->amount) {
                $agreement->wallet -= $request->amount;
            }
            else{
                return redirect()->back()->with('info', 'Amount should not be greater then the wallet balace');
            }

            $agreement->save();
        }

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
