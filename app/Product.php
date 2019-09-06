<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['name','order_id','quantity','retail_order_id','retail_price','wholesale_price'];
    
    public function orders()
    {
        return $this->morphedByMany('App\Order', 'productable');
    }

    public function retailOrders()
    {   
        return $this->morphedByMany('App\RetailOrder', 'productable');
    }
}
