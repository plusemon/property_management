<?php

namespace App\Http\Controllers;

use App\Loan;
use App\User;
use App\Borrow;
use App\Expense;
use App\Payment;
use App\Wellpart;
use App\LoanReturn;
use App\PaymentReturn;
use Illuminate\Database\Eloquent\Collection;

class DashboardController extends Controller
{
    public function index()
    {
        $data = new Collection();
        $expenses = Expense::all()->each(function ($data) {
            $data->type = 'Expense';
        });

        $borrows = Borrow::all()->each(function ($data) {
            $data->type = 'Borrow';
        });

        $loans = Loan::all()->each(function ($data) {
            $data->type = 'Loan';
        });

        $loanReturns = LoanReturn::all()->each(function ($data) {
            $data->type = 'Loan Return';
            $data->state = true;
        });

        $wellparts = Wellpart::all()->each(function ($data) {
            $data->type = 'Well Part';
        });

        $payments = Payment::all()->each(function ($data) {
            $data->type = 'Payment';
            $data->state = true;
        });

        $paymentRefunds = PaymentReturn::all()->each(function ($data) {
            $data->type = 'Payment Return';
        });

        // if ($request->expense) {
            $data = $data->mergeRecursive($expenses);
        // }
        // if ($request->borrow) {
            $data = $data->mergeRecursive($borrows);
        // }
        // if ($request->loan) {
            $data = $data->mergeRecursive($loans);
        // }
        // if ($request->return) {
            $data = $data->mergeRecursive($loanReturns);
        // }
        // if ($request->wellpart) {
            $data = $data->mergeRecursive($wellparts);
        // }
        // if ($request->payment) {
            $data = $data->mergeRecursive($payments);
        // }/
        // if ($request->refund) {
            $data = $data->mergeRecursive($paymentRefunds);
        // }

        $reports = $data->sortBy('updated_at');

        return view('dashboard', compact('reports'));
    }
}
