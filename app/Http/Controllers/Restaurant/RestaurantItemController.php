<?php

namespace App\Http\Controllers\Restaurant;

use App\Http\Controllers\Controller;
use App\Models\main_category;
use App\Models\measurement;
use App\Models\Restaurant;
use App\Models\restaurant_item;
use App\Models\sub_category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class RestaurantItemController extends Controller
{
    public function items()
    {
        return view('restaurant.items.itemList');
    }

    public function items_get_all(Request $request)
    {
        $all_items = restaurant_item::select('id', 'restaurant_id', 'main_category_id', 'sub_category_id', 'item_name', 'item_price', 'item_image', 'created_at')
            ->where('restaurant_id', Auth::user()->id)
            ->get();
        return DataTables::of($all_items)
            ->addColumn('action', function ($all_items) {
                return ' <a href="' . route('restaurant.store.items.edit', $all_items->id) . '"> <button class="btn btn-success btn-info btn-sm"><i class="fas fa-edit"></i> </button></a>
                        <button id="' . $all_items->id . '" onclick="storedeletestoreitem(this.id)" class="btn btn-danger btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#deletstoreitem"><i class="far fa-trash-alt"></i> </button>';
            })
            ->editColumn('created_at', function ($all_items) {
                return Carbon::parse($all_items->created_at)->format('d-F-Y');
            })
            ->editColumn('main_category_id', function ($all_items) {
                $mcat = main_category::select('main_category_name')->where('id', $all_items->main_category_id)->first();
                if ($mcat) {
                    return $mcat->main_category_name;
                } else {
                    return "Not Set";
                }
            })
            ->editColumn('sub_category_id', function ($all_items) {
                $mcat = sub_category::select('sub_category_name')->where('id', $all_items->sub_category_id)->first();
                if ($mcat) {
                    return $mcat->sub_category_name;
                } else {
                    return "Not Set";
                }
            })
            ->make(true);
    }

    public function items_create()
    {
        $main_cats = main_category::select('id', 'main_category_name')->where('main_category_store_type', Auth::user()->restaurant_store_type)->get();
        $sub_cats = sub_category::select('id', 'sub_category_name')->where('sub_category_store_type', Auth::user()->restaurant_store_type)->get();
        $meas = measurement::where('measurement_store_type', Auth::user()->restaurant_store_type)->get();
        return view('restaurant.items.itemCreate', compact('main_cats', 'sub_cats', 'meas'));
    }


    public function items_save(Request $request)
    {
        $new_item = new restaurant_item();
        if ($request->hasFile('item_image')) {
            $image = $request->file('item_image');
            $imageName = uniqid() . time() . '.' . 'png';
            $directory = 'assets/dashboard/images/items/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $new_item->item_image = $imgUrl;
        } else {
            $new_item->item_image = "assets/dashboard/images/default.jpg";
        }


        $new_item->restaurant_id = Auth::user()->id;
        $new_item->main_category_id = $request->main_category_id;
        $new_item->sub_category_id = $request->sub_category_id;
        $new_item->item_name = $request->item_name;
        $new_item->measurement_id = $request->measurement_id;
        $new_item->item_price = $request->item_price;
        $new_item->item_description = $request->item_description;
        $new_item->is_veg = $request->is_veg;
        $new_item->is_available = $request->is_available;
        $new_item->save();

        return back()->with('success', 'Store Item Successfully Created');
    }

    public function items_edit($id)
    {
        $item_edit = restaurant_item::where('id', $id)->where('restaurant_id', Auth::user()->id)->first();
        $main_cats = main_category::select('id', 'main_category_name')->where('main_category_store_type', Auth::user()->restaurant_store_type)->get();
        $sub_cats = sub_category::select('id', 'sub_category_name')->where('sub_category_store_type', Auth::user()->restaurant_store_type)->get();
        $meas = measurement::where('measurement_store_type', Auth::user()->restaurant_store_type)->get();
        return view('restaurant.items.itemEdit', compact('item_edit', 'main_cats', 'sub_cats', 'meas'));
    }


    public function items_update(Request $request)
    {
        $update_item = restaurant_item::where('id', $request->item_edit_id)->first();
        if ($request->hasFile('item_image')) {
            $image = $request->file('item_image');
            $imageName = uniqid() . time() . '.' . 'png';
            $directory = 'assets/dashboard/images/items/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $update_item->item_image = $imgUrl;
        }


        $update_item->main_category_id = $request->main_category_id;
        $update_item->sub_category_id = $request->sub_category_id;
        $update_item->item_name = $request->item_name;
        $update_item->measurement_id = $request->measurement_id;
        $update_item->item_price = $request->item_price;
        $update_item->item_description = $request->item_description;
        $update_item->is_veg = $request->is_veg;
        $update_item->is_available = $request->is_available;
        $update_item->save();

        return back()->with('success', 'Store Item Successfully Updated');
    }

    public function items_delete(Request $request)
    {
        $delete_store_item = restaurant_item::where('id', $request->store_item_delete)->first();
        $delete_store_item->delete();
        return back()->with('success', 'Item Successfully Deleted');
    }

}
