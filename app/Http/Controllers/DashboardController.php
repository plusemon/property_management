<?php

namespace App\Http\Controllers;

use App\Loan;
use App\User;
use App\Borrow;
use App\Expense;
use App\Payment;
use App\LoanReturn;


class DashboardController extends Controller
{
    public function index()
    {

        $expences = Expense::all();
        $loans = Loan::all();
        $payments = Payment::all();

        $report = $expences->mergeRecursive($loans)->mergeRecursive($payments);

        $total = (object) [];
        $value = (object) [];

        $total->borrow = Borrow::count();
        $value->borrow = Borrow::pluck('amount')->sum();

        $total->employee = User::count();
        $value->employee = 0;

        $total->wellpart = 0;
        $value->wellpart = 0;

        $total->loan = Loan::count();
        $value->loan = Loan::pluck('amount')->sum();

        $total->return = Loan::count();
        $value->return = Loan::pluck('amount')->sum();

        $total->payment = Payment::count();
        $value->payment = Payment::pluck('amount')->sum();

        $total->refund = Loan::count();
        $value->refund = Loan::pluck('amount')->sum();

        $value->cash = 10000;

        // expense
        $loans = Loan::all();
        $returns = LoanReturn::all();
        $loans = $loans->mergeRecursive($returns);
        $loans = $loans->sortByDesc('updated_at');

        return view('dashboard', compact('total','value','report', 'loans'));
    }

}
