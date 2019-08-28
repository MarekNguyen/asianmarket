<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['name','total','price','customer_id'];

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'customer_id', 'id');
    }
    public function products()
    {
        return $this->hasMany('App\Product', 'order_id', 'id');
    }
}
