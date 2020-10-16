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
