<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productable extends Model
{
    //
    protected $fillable = ['product_id','productable_id','productable_type'];
}
