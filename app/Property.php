<?php

namespace App;

use App\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Property extends Model
{

    use SoftDeletes, LogsActivity;

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function agreements()
    {
        return $this->hasMany(Agreement::class);
    }


    protected static $logAttributes = ['*'];
    protected static $logAttributesToIgnore = ['email_verified_at','created_at','updated_at','deleted_at'];
    protected static $logOnlyDirty = true;
    protected static $recordEvents = ['created','updated','deleted'];
}
