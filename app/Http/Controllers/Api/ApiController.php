<?php

namespace App\Http\Controllers\Api;

use App\Loan;
use App\User;
use App\Payment;
use App\Property;
use App\Agreement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    // get properties by type
    public function properties(Request $request)
    {
        if($request){
            $properties = Property::where('type_id', $request->type)->get();
            if($properties){
                return response()->json($properties);
            }
        }
    }

    // get agreement information
    public function agreementInfo(Request $request)
    {
        if($request->has('agreement')){
            $agreement = Agreement::find($request->agreement);
            // $paid = [];
            // foreach ($agreement->payments as $payment) {
            //    $paid[] += $payment->month;
            // }
            // return $paid;
            $data = [];
            $data['type'] = $agreement->property->type->name ?? 'Deleted';
            $data['property'] = $agreement->property->name;
            $data['tent'] = $agreement->tent->fname.' '.$agreement->tent->lname;
            $data['rent'] = $agreement->property->rate;
            // $data['paid'] = $paid;
            if($data){
                return response()->json($data);
            }
        }
    }

// PAYMENT MONTH STATUS
    public function paymentMonthStatus(Request $request)
    {
        $agreement = Agreement::findOrFail($request->agreement);
        $payments = $agreement->payments->where('month',$request->month)->pluck('amount')->sum();
        $rent = $agreement->property->rate;

        if ($payments == $rent) {
           $data = 'Paid';
        }
        elseif($payments == 0){
            $data = 'Unpaid';
        }
        else{
          $data = -($rent - $payments);
        }

        if($data){
            return response()->json($data);
        }
    }

    // GET WALLET BALANCE
    public function walletBalance(Request $request)
    {
       return $data = Agreement::find($request->agreement)->wallet;
        if($data){
            return response()->json($data);
        }
    }

    // GET LOAN BALANCE
    public function loanInfo(Request $request)
    {
        $data = [];
        $loan = Loan::findOrFail($request->loan);
        $data['loan'] = $loan->return_amount;
        $data['return'] = $loan->returns->sum('amount');
        $data['due'] = ($data['loan']-$data['return']);
        if($data){
            return response()->json($data);
        }
    }

    // GET LOAN BALANCE
    public function paymentInfo(Request $request)
    {
        $data = [];
        $payment = Payment::findOrFail($request->payment);
        $data['paid'] = $payment->amount;
        $data['for'] = $payment->type;
        $data['method'] = $payment->method;
        if($data){
            return response()->json($data);
        }
    }
}
