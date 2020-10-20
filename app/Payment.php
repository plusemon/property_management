<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{

    use SoftDeletes;

    public static function nextId(int $increment = 1 )
    {
        if (parent::withTrashed()->count()) {
            return parent::withTrashed()->get()->last()->id + $increment;
        }

    }

    public function agreement()
    {
        return $this->belongsTo(Agreement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }




    protected $casts = [
        'month' => 'json',
    ];
}
