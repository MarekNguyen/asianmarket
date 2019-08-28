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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/customer', 'PitayaOrderController@createNewCustomer')->name('pitaya.customercreate');
    Route::get('/report', 'PitayaOrderController@report')->name('pitaya.report');
    Route::post('/report', 'PitayaOrderController@reportPost')->name('pitaya.reportpost');
    Route::post('/customer', 'PitayaOrderController@storeCustomer')->name('pitaya.customerstore');
    Route::post('/prepare', 'PitayaOrderController@prepareList')->name('pitaya.prepare');
    Route::post('/confirm', 'PitayaOrderController@confirmList')->name('pitaya.confirm');
    Route::resource('/pitaya', 'PitayaOrderController');
});

