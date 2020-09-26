<?php

namespace App;

use App\Type;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['name','type_id','distric','street','city','country'];


    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
