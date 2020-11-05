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



    protected static $logAttributes = ['*'];
    protected static $logAttributesToIgnore = ['email_verified_at','created_at','updated_at','deleted_at'];
    protected static $logOnlyDirty = true;
    protected static $recordEvents = ['created','updated','deleted'];

}
