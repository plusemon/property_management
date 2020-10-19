<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use SoftDeletes;

    // public static function nextId(int $increment = 1 )
    // {
    //     if (parent::withTrashed()->count()) {
    //         return parent::withTrashed()->get()->last()->id + $increment;
    //     }else{
    //         return Setting::firstOrCreate([])->serial;
    //     }

    // }

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

}
