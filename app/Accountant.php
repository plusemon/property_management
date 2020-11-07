<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accountant extends Model
{
    protected $casts = [
        'start' => 'date',
        'end' => 'date',
    ];

    public static function active()
    {
        return self::whereStatus(1)->first();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'accountant_id');
    }

    public function refunds()
    {
        return $this->hasMany(PaymentReturn::class, 'accountant_id');
    }

    public function borrows()
    {
        return $this->hasMany(Borrow::class, 'accountant_id');
    }
    public function wellparts()
    {
        return $this->hasMany(Wellpart::class, 'accountant_id');
    }
    public function expenses()
    {
        return $this->hasMany(Expense::class, 'accountant_id');
    }

    public function loans()
    {
        return $this->hasMany(Loan::class, 'accountant_id');
    }
    public function returns()
    {
        return $this->hasMany(LoanReturn::class, 'accountant_id');
    }

    public static function balance($id)
    {
        $accountant = Accountant::find($id);
        if ($accountant) {
            $payments = $accountant->payments->sum('amount');
            $refunds = $accountant->refunds->sum('amount');
            $borrows = $accountant->borrows->sum('amount');
            $expenses = $accountant->expenses->sum('amount');
            $loans = $accountant->loans->sum('amount');
            $returns = $accountant->returns->sum('amount');

            $balance['total'] = $payments + $refunds + $borrows + $expenses + $loans + $returns;
            $balance['send'] = $refunds + $returns;
            $balance['received'] = $balance['total'] - $balance['send'];
            $balance['now'] = ($balance['received'] - $balance['send']) + $accountant->sbalance;
            return $balance;
        }
    }


}
