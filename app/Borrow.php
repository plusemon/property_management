<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrow extends Model
{
    use SoftDeletes, LogsActivity;

    protected $guarded = [];

    protected static $logAttributes = ['*'];
    protected static $logAttributesToIgnore = ['created_at','updated_at'];
    protected static $logOnlyDirty = true;
    protected static $recordEvents = ['updated','deleted'];



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
