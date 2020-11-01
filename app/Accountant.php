<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accountant extends Model
{

    public static function get()
    {
        return self::where('status', 1 )->first() ?? redirect(route('accountant.index'))->with('info','Set an Accountant first');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'start' => 'date',
        'end' => 'date',
    ];


}
