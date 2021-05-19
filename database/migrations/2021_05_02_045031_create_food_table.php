<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->bigIncrements('food_id');
            $table->text('food_name');
            $table->text('food_cat');
            $table->text('food_item_cat');
            $table->integer('food_quantity');
            $table->integer('food_price');
            $table->longText('food_des');
            $table->text('food_img');
            $table->boolean('shown');
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
        Schema::dropIfExists('food');
    }
}
