<?php

namespace App\Http\Controllers\Admin;

use App\Agreement;
use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();
        $agreements = Agreement::all();
        return view('admin.rent.payment.index', compact('payments', 'agreements'));
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
            "agreement_id" => "required",
            "method" => "required",
            "amount" => "required",
        ]);

        $payment = new Payment();
        $payment->agreement_id = $request->agreement_id;
        $payment->user_id = auth()->id();
        $payment->method = $request->method;
        $payment->amount = $request->amount;
        $payment->account = $request->account;
        $payment->remarks = $request->remarks;
        $payment->created_at = $request->created_at;
        $payment->save();

        return redirect()->back()->with('success', 'Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return view('admin.rent.payment.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            "method" => "required",
            "amount" => "required",
        ]);

        $payment->method = $request->method;
        $payment->amount = $request->amount;
        $payment->account = $request->account;
        $payment->remarks = $request->remarks;
        $payment->created_at = $request->created_at;
        $payment->save();

        return redirect('admin/payment')->with('success', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect('admin/payment')->with('success', 'Deleted Successfully');
    }
}
