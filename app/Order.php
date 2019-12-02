<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = [];
    protected $fillable = [];

    public function detail_order()
    {
        return $this->hasMany('App\DetailOrder', 'id_order', 'id');
    }



}
