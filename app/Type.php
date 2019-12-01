<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $table = 'types';
    protected $guarded = [];
    protected $fillable = ['nama', 'id_supplier', 'stock', 'description'];

    public function supplier()
    {
        return $this->hasOne('App\Supplier', 'id', 'id_supplier');
    }
}


