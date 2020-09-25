<?php

namespace App;

use App\Type;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['name','type_id','address','country'];


    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
