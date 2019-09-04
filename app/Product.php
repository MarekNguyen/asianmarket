<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name','order_id','quantity','retail_order_id','retail_price','wholesale_price'];
    
    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id', 'id');
    }

    public function retailorder()
    {   
        return $this->belongsTo('App\RetailOrder', 'retail_order_id', 'id');
    }
}
