<?php

namespace App;

use App\Tent;
use App\User;
use App\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Agreement extends Model
{
    use SoftDeletes, LogsActivity;

    protected static $logName = 'agreement';
    protected static $recordEvents = ['updated'];
    protected static $logAttributes = ['*', 'user.name', 'property.name', 'tent.fname'];
    protected static $logAttributesToIgnore = ['updated_at', 'created_at'];
    protected static $logOnlyDirty = true;
    protected static $submitEmptyLogs = false;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function tent()
    {
        return $this->belongsTo(Tent::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }


    public static function isExpired($id)
    {
        $agreement = self::find($id);
        $start = $agreement->created_at;
        $end = $start->addMonths($agreement->duration-1);
        return now()->diffInDays($end,false) < 1 ? true:false;
    }

    public static function getValid()
    {
        return self::whereNull('incr_at')->get();
    }
    public static function getExpired()
    {
        return self::whereNotNull('incr_at')->get();
    }

}
