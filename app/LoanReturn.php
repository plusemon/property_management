<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoanReturn extends Model
{
    use SoftDeletes;

    public static function nextId(int $increment = 1 )
    {
        if (parent::withTrashed()->count()) {
            return parent::withTrashed()->get()->last()->id + $increment;
        }

    }

    public function loan()
    {
        return $this->hasOne(Loan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
