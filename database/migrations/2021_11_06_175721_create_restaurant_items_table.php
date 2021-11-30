<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_items', function (Blueprint $table) {
            $table->id();
            $table->integer('restaurant_id')->nullable();
            $table->integer('main_category_id')->nullable();
            $table->integer('sub_category_id')->nullable();
            $table->string('item_name')->nullable();
            $table->integer('measurement_id')->nullable();
            $table->float('item_price')->nullable();
            $table->text('item_description')->nullable();
            $table->text('item_image')->nullable();
            $table->integer('is_veg')->nullable();
            $table->integer('is_available')->nullable();
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
        Schema::dropIfExists('restaurant_items');
    }
}
