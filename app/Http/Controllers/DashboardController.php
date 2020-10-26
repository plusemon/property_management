<?php

namespace App\Http\Controllers;

use App\Loan;
use App\User;
use App\Borrow;
use App\Expense;
use App\Payment;
use App\LoanReturn;
use App\PaymentReturn;
use App\Wellpart;

class DashboardController extends Controller
{
    public function index()
    {
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
            $data->state = 'add';
        });

        $wellparts = Wellpart::all()->each(function ($data) {
            $data->type = 'Well Part';
        });

        $payments = Payment::all()->each(function ($data) {
            $data->type = 'Payment';
        });

        $paymentRefunds = PaymentReturn::all()->each(function ($data) {
            $data->type = 'Payment Return';
            $data->state = 'add';
        });

        $data = $expenses
            ->mergeRecursive($borrows)
            ->mergeRecursive($loans)
            ->mergeRecursive($loanReturns)
            ->mergeRecursive($wellparts)
            ->mergeRecursive($payments)
            ->mergeRecursive($paymentRefunds);

        $reports = $data->sortBy('updated_at');

        return view('dashboard', compact('reports'));
    }
}
