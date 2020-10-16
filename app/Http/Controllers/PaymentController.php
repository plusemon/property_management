<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Agreement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::all();
        $agreements = Agreement::all();
        return view('rent.payment.index', compact('payments', 'agreements'));
    }

    public function store(Request $request)
    {

        // Payment
        if ($request->for == 'payment') {

            // Monthly Rent payment
            if ($request->type == 'rent') {
                $request->validate([
                    "agreement_id" => "required",
                    "type" => "required",
                    "month" => "required",
                    "method" => "required",
                    "amount" => "required",
                ]);

                // calculate payment status by agreement
                $agreement = Agreement::findOrFail($request->agreement_id);
                $payments = $agreement->payments->where('month', $request->month)->pluck('amount')->sum();
                $rent = $agreement->property->rate;
                $due = 0;

                if ($payments >= $rent) {
                    // full payment completed
                    return redirect()->back()->with('info', 'Payment Already Completed');
                } else {
                    // some due
                    $due = ($rent - $payments);
                }

                $payment = new Payment();

                if (!Payment::count()) {
                    $payment->id = \App\Setting::first()->serial;
                }

                $payment->agreement_id = $request->agreement_id;
                $payment->user_id = auth()->id();
                $payment->type = $request->type;
                $payment->method = $request->method;

                if ($request->method == 'wallet' and $request->amount <= Auth::user()->wallet) {
                    $user = Auth::user();
                    $user->wallet -= $request->amount;
                    $user->save();
                }

                $payment->month = $request->month;

                if ($request->amount <= $due) {
                    $payment->amount = $request->amount;
                } else {
                    $payment->amount = $due;

                    //rest will save in wallet
                    $user = Auth::user();
                    $user->wallet += ($request->amount - $due);
                    $user->save();
                }

                $payment->tnxid = uniqid();
                if ($request->gst) {
                    $payment->gst = $request->gst;
                }
                if ($request->method == 'bank') {
                    $payment->bank = $request->bank;
                    $payment->account = $request->account;
                    $payment->branch = $request->branch;
                    $payment->cheque = $request->cheque;
                    if ($request->has('attachment')) {
                        $payment->attachment = $request->attachment->store('/cheque');
                    }
                }
            }

            // other payment

            $payment->save();
        }


        // refund
        if ($request->for == 'refund') {
            $payment = new Payment();
            $payment->agreement_id = $request->agreement_id;
            $payment->user_id = auth()->id();
            $payment->method = 'Refund';
            $payment->type = $request->type;
            $payment->amount = $request->amount;
            $payment->tnxid = uniqid();
            $payment->save();
        }

        return redirect()->back()->with('success', 'Added Successfully');
    }


    public function edit(Payment $payment)
    {
        return view('rent.payment.edit', compact('payment'));
    }


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

        return redirect(route('payment.index'))->with('success', 'Updated Successfully');
    }

    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
