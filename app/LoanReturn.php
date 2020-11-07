<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class LoanReturn extends Model
{
    use SoftDeletes, LogsActivity;

    protected static $logName = 'return';
    protected static $recordEvents = ['updated'];
    protected static $logAttributes = ['*'];
    protected static $logAttributesToIgnore = ['updated_at','created_at'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;


    public static function nextId(int $increment = 1 )
    {
        if (parent::withTrashed()->count()) {
            return parent::withTrashed()->get()->last()->id + $increment;
        }

    }

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

    public function entry()
    {
        return $this->belongsTo(User::class,'entry_id');
    }

    public function accountant()
    {
        return $this->belongsTo(User::class,'accountant_id');
    }




}
