<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function agreement()
    {
        return $this->belongsTo(Agreement::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
