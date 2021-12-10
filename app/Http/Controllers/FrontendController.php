<?php

namespace App\Http\Controllers;

use App\Models\main_category;
use App\Models\Restaurant;
use App\Models\restaurant_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

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


    public function get_all_restaurants(Request $request)
    {
        $all_res = DB::table('restaurants')->paginate(12);

        return response()->json([
            'notices' => $all_res,
            'view' => View::make('frontend.include.restaurantInc', compact('all_res'))->render(),
            'pagination' => (string)$all_res->links()
        ]);
    }


    public function restaurant_details($id)
    {
        $restaurant = Restaurant::where('id', $id)->first();
        $restaurant_item_cats = restaurant_item::distinct()->select('restaurant_id', 'main_category_id')->where('restaurant_id', $id)->get();
        return view('frontend.restaurantDetails', compact('restaurant', 'restaurant_item_cats'));
    }
}
