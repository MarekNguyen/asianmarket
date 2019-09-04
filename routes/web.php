<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/customer', 'OrderController@createNewCustomer')->name('customercreate');
    Route::get('/report', 'OrderController@report')->name('report');
    Route::post('/report', 'OrderController@reportPost')->name('reportpost');
    Route::post('/customer', 'OrderController@storeCustomer')->name('customerstore');
    Route::post('/prepare', 'OrderController@prepareList')->name('prepare');
    Route::post('/confirm', 'OrderController@confirmList')->name('confirm');
    Route::resource('/order', 'OrderController');

    // Retail App
    Route::get('/retail','RetailController@index')->name('retail.index');
});

