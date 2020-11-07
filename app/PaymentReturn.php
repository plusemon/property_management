<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class PaymentReturn extends Model
{
    use SoftDeletes;

    public static function nextId(int $increment = 1 )
    {
        if (parent::withTrashed()->count()) {
            return parent::withTrashed()->get()->last()->id + $increment;
        }

    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }


    public function entry()
    {
        return $this->belongsTo(User::class,'entry_id');
    }



}
