<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accountant extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'start' => 'date',
        'end' => 'date',
    ];
}
