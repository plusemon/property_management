<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class PaymentReturn extends Model
{
    use SoftDeletes, LogsActivity;

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


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static $logAttributes = ['*'];
    protected static $logAttributesToIgnore = ['email_verified_at','created_at','updated_at','deleted_at'];
    protected static $logOnlyDirty = true;
    protected static $recordEvents = ['created','updated','deleted'];

}
