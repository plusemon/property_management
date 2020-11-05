<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes, LogsActivity;


    public static function nextId(int $increment = 1)
    {
        if (parent::withTrashed()->count()) {
            return parent::withTrashed()->get()->last()->id + $increment;
        }
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static $logAttributes = ['*'];
    protected static $logAttributesToIgnore = ['email_verified_at', 'created_at', 'updated_at', 'deleted_at'];
    protected static $logOnlyDirty = true;
    protected static $recordEvents = ['created', 'updated', 'deleted'];
}
