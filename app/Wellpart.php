<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Wellpart extends Model
{
    use SoftDeletes, LogsActivity;


    protected static $logAttributes = ['*'];
    protected static $logAttributesToIgnore = ['email_verified_at','created_at','updated_at','deleted_at'];
    protected static $logOnlyDirty = true;
    protected static $recordEvents = ['created','updated','deleted'];

    public static function nextId(int $increment = 1 )
    {
        if (parent::withTrashed()->count()) {
            return parent::withTrashed()->get()->last()->id + $increment;
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accountant()
    {
        return $this->belongsTo(User::class,'accountant_id');
    }
    public function entry()
    {
        return $this->belongsTo(User::class,'entry_id');
    }

}
