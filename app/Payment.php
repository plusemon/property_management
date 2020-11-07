<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Payment extends Model
{

    use SoftDeletes;

    public static function nextId(int $increment = 1 )
    {
        if (parent::withTrashed()->count()) {
            return parent::withTrashed()->get()->last()->id + $increment;
        }

    }

    public function agreement()
    {
        return $this->belongsTo(Agreement::class);
    }

    public function returns()
    {
        return $this->hasMany(PaymentReturn::class);
    }

    public function entry()
    {
        return $this->belongsTo(User::class,'entry_id');
    }

    public function accountant()
    {
        return $this->belongsTo(User::class,'accountant_id');
    }

    protected $casts = [
        'month' => 'json',
    ];

}
