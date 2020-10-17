<?php

namespace App;

use App\Tent;
use App\User;
use App\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agreement extends Model
{
    use SoftDeletes;
    
    public static function nextId(int $increment = 1 )
    {
        if (parent::withTrashed()->count()) {
            return parent::withTrashed()->get()->last()->id + $increment;
        }else{
            return Setting::firstOrCreate([])->serial;
        }

    }

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
}
