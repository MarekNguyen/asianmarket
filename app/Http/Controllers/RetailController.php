<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetailController extends Controller
{
    //
    public function index(){
        return view('retail.index');
    }
}
