<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RetailOrder extends Model
{
    //
    protected $fillable = ['price'];
    
    public function products()
    {
        return $this->morphToMany('App\Product', 'productable')->withPivot('quantity');
    }
}
