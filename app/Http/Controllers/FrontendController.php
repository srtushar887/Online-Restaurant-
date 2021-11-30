<?php

namespace App\Http\Controllers;

use App\Models\main_category;
use App\Models\restaurant_item;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $popular_cats = main_category::inRandomOrder()->limit(10)->get();
        return view('frontend.index', compact('popular_cats'));
    }


    public function all_restaurants()
    {
        return view('frontend.allRestaurants');
    }


    public function restaurant_details($id)
    {
        $restaurant_item_cats = restaurant_item::distinct()->select('restaurant_id', 'main_category_id')->where('restaurant_id', $id)->get();
        return view('frontend.restaurantDetails', compact('restaurant_item_cats'));
    }
}
