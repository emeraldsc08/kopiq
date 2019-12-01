<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $guarded = [];
    protected $fillable = ['name', 'id_type', 'price', 'jumlah_bahan'];

    public function type()
    {
        return $this->hasOne('App\Type', 'id', 'id_type');
    }
}
