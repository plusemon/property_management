<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrow extends Model
{
    use SoftDeletes, LogsActivity;

    protected static $logName = 'borrow';
    protected static $recordEvents = ['updated'];
    protected static $logAttributes = ['*','user.name'];
    protected static $logAttributesToIgnore = ['updated_at','created_at','user_id'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;

    protected $guarded = [];

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
