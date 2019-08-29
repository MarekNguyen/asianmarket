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

    public static function initialize($customer_id, $price, $total, $name) {
        $order = new Order(['customer_id'=>$customer_id,'price'=>$price,'total'=>$total,'name'=>$name]);
        $order->save();
        for ($i=0; $i < $total; $i++) { 
            $newproduct = new Product(['order_id' => $order->id]);
            $newproduct->save();
        }  
        return $order;
    }

    public function exempt() {
        return $this->products()->delete();
    }
}
