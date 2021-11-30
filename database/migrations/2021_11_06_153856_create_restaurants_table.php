<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('restaurant_name')->nullable();
            $table->string('restaurant_email')->unique();
            $table->string('restaurant_phone')->nullable();
            $table->integer('restaurant_store_type')->nullable();
            $table->text('restaurant_google_address')->nullable();
            $table->string('restaurant_google_latitude')->nullable();
            $table->string('restaurant_google_longitude')->nullable();
            $table->text('restaurant_address')->nullable();
            $table->text('restaurant_description')->nullable();
            $table->text('restaurant_image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('restaurants');
    }
}
