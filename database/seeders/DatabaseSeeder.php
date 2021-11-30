<?php

namespace Database\Seeders;

use App\Models\main_category;
use App\Models\Restaurant;
use App\Models\restaurant_item;
use App\Models\sub_category;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $faker = Faker::create();
        foreach (range(1, 500) as $index) {


//            $main_cat = new main_category();
//            $main_cat->main_category_name = "main Category " . $index;
//            $main_cat->main_category_image = "assets/dashboard/images/default.jpg";
//            $main_cat->main_category_store_type = rand(1, 4);
//            $main_cat->save();


//            $sub_cat = new sub_category();
//            $sub_cat->main_category_id = rand(7, 206);
//            $sub_cat->sub_category_name = "sub Category " . $index;
//            $sub_cat->sub_category_image = "assets/dashboard/images/default.jpg";
//            $sub_cat->sub_category_store_type = rand(1, 4);
//            $sub_cat->save();


//            $new_store = new Restaurant();
//            $new_store->restaurant_name = $faker->name;
//            $new_store->restaurant_email = $faker->email;
//            $new_store->restaurant_phone = $faker->phoneNumber;
//            $new_store->restaurant_store_type = rand(1, 4);
//            $new_store->restaurant_address = $faker->address;
//            $new_store->restaurant_image = "assets/dashboard/images/default.jpg";
//            $new_store->password = Hash::make('12345678');
//            $new_store->save();


            $item = new restaurant_item();
            $item->restaurant_id = rand(15, 538);
            $item->main_category_id = rand(7, 206);
            $item->sub_category_id = rand(4, 503);
            $item->item_name = 'Item ' . $index;
            $item->item_price = rand(100, 500);
            $item->item_description = $faker->paragraph;
            $item->item_image = "assets/dashboard/images/default.jpg";
            $item->is_veg = rand(1, 2);
            $item->is_available = rand(1, 2);
            $item->save();


        }

    }

}
