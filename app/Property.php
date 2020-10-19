<?php

namespace App;

use App\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
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


    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function agreements()
    {
        return $this->hasMany(Agreement::class);
    }

}
