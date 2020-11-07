<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Loan extends Model
{

    use SoftDeletes, LogsActivity;

    protected static $logName = 'loan';
    protected static $recordEvents = ['updated'];
    protected static $logAttributes = ['*','taker.name'];
    protected static $logAttributesToIgnore = ['updated_at','created_at','taker_id'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;

    
    public static function nextId(int $increment = 1)
    {
        if (parent::withTrashed()->count()) {
            return parent::withTrashed()->get()->last()->id + $increment;
        }
    }

    public function returns()
    {
        return $this->hasMany(LoanReturn::class);
    }

    public function taker()
    {
        return $this->belongsTo(User::class,'taker_id');
    }

    public function accountant()
    {
        return $this->belongsTo(User::class,'accountant_id');
    }

    protected $casts = [
        'return_date' => 'datetime',
    ];

}
