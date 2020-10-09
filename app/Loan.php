<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    } 
    
    protected $casts = [
            'return_date' => 'datetime',
        ];
}
