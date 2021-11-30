<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_galleries', function (Blueprint $table) {
            $table->id();
            $table->integer('restaurant_id')->nullable();
            $table->text('description')->nullable();
            $table->text('main_image')->nullable();
            $table->text('optional_image_one')->nullable();
            $table->text('optional_image_two')->nullable();
            $table->text('optional_image_three')->nullable();
            $table->text('optional_image_four')->nullable();
            $table->text('optional_image_five')->nullable();
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
        Schema::dropIfExists('restaurant_galleries');
    }
}
