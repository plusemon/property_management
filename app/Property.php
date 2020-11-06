<?php

namespace App;

use App\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Property extends Model
{

    use SoftDeletes, LogsActivity;

    protected static $logName = 'property';
    protected static $recordEvents = ['updated'];
    protected static $logAttributes = ['*','type.name'];
    protected static $logAttributesToIgnore = ['updated_at','created_at','type_id'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;


    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function agreements()
    {
        return $this->hasMany(Agreement::class);
    }
}
