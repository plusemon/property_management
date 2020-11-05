<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Payment extends Model
{

    use SoftDeletes, LogsActivity;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'month' => 'json',
    ];

    protected static $logAttributes = ['*'];
    protected static $logAttributesToIgnore = ['email_verified_at','created_at','updated_at','deleted_at'];
    protected static $logOnlyDirty = true;
    protected static $recordEvents = ['created','updated','deleted'];

}
