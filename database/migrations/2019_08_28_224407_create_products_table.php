<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->bigInteger('order_id')->unsigned()->nullable();
            $table->bigInteger('retail_order_id')->unsigned()->nullable();
            $table->float('retail_price')->default(0);
            $table->float('wholesale_price')->default(0);
            $table->integer('quantity')->unsigned()->default(1);
            $table->timestamps();
        });
        Schema::table('products', function($table) {
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('retail_order_id')->references('id')->on('retail_orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
