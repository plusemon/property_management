<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expence extends Model
{
    public static function nextId(int $increment = 1 )
    {
        if (parent::withTrashed()->count()) {
            return parent::withTrashed()->get()->last()->id + $increment;
        }else{
            return Setting::firstOrCreate([])->serial;
        }

    }
}
