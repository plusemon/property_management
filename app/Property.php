<?php

namespace App;

use App\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{

    use SoftDeletes;

    protected $fillable = ['name','type_id','distric','street','city','country'];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function agreements()
    {
        return $this->hasMany(Agreement::class);
    }

}
