<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name','order_id','quantity'];
    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }
}
