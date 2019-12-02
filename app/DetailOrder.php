<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $table = 'detail_order';
    protected $guarded = [];
    protected $fillable = ['id_order', 'id_menu', 'jumlah'];

    public function menu()
    {
        return $this->hasMany('App\Menu', 'id_menu', 'id');
    }



}
