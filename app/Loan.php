<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
            'return_date' => 'datetime',
        ];
}
