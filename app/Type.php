<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use SoftDeletes;

    protected $fillable = ['name','description'];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
}
