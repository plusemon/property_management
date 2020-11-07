<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use SoftDeletes, LogsActivity;

    protected static $logName = 'type';
    protected static $recordEvents = ['updated'];
    protected static $logAttributes = ['name'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public static function getProperties()
    {
       return self::where('type', 'property')->get();
    }


}
