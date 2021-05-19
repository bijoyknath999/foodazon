<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text('orders_name');
            $table->integer('orders_quantity');
            $table->integer('orders_price');
            $table->text('orders_username');
            $table->integer('orders_food_id');
            $table->text('orders_id');
            $table->boolean('orders_type');
            $table->boolean('orders_status');
            $table->text('orders_location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
