<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\restaurant_gallery;
use App\Models\store_type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class AdminRestaurantController extends Controller
{
    public function store_type()
    {
        $store_types = store_type::all();
        return view('admin.restaurant.storeType', compact('store_types'));
    }

    public function store_type_update(Request $request)
    {
        $update_store = store_type::where('id', $request->store_type_edit)->first();
        if ($request->hasFile('store_type_image')) {
            @unlink($update_store->store_type_image);
            $image = $request->file('store_type_image');
            $imageName = uniqid() . time() . '.' . 'png';
            $directory = 'assets/dashboard/images/storetype/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $update_store->store_type_image = $imgUrl;
        }

        $update_store->store_type_status = $request->store_type_status;
        $update_store->save();

        return back()->with('success', 'Store Type Successfully Updated');
    }


    public function create_store()
    {
        $store_types = store_type::all();
        return view('admin.restaurant.createStore', compact('store_types'));
    }


    public function create_store_save(Request $request)
    {
        $check_exist_res = Restaurant::where('restaurant_email', $request->restaurant_email)->first();
        if ($check_exist_res) {
            return back()->with('alert', 'Email Already Exists');
        } else {
            $new_res = new Restaurant();
            if ($request->hasFile('restaurant_image')) {
                $image = $request->file('restaurant_image');
                $imageName = uniqid() . time() . '.' . 'png';
                $directory = 'assets/dashboard/images/restaurant/';
                $imgUrl = $directory . $imageName;
                Image::make($image)->save($imgUrl);
                $new_res->restaurant_image = $imgUrl;
            } else {
                $new_res->restaurant_image = "assets/dashboard/images/default.png";
            }


            $new_res->restaurant_name = $request->restaurant_name;
            $new_res->restaurant_email = $request->restaurant_email;
            $new_res->restaurant_phone = $request->restaurant_phone;
            $new_res->password = Hash::make($request->password);
            $new_res->restaurant_store_type = $request->restaurant_store_type;
            $new_res->restaurant_google_address = $request->restaurant_google_address;
            $new_res->restaurant_google_latitude = $request->restaurant_google_latitude;
            $new_res->restaurant_google_longitude = $request->restaurant_google_longitude;
            $new_res->restaurant_address = $request->restaurant_address;
            $new_res->restaurant_description = $request->restaurant_description;
            $new_res->save();
            return back()->with('success', 'Store Successfully Created');

        }
    }


    public function store_list()
    {
        return view('admin.restaurant.storeList');
    }

    public function store_list_get()
    {
        $all_store = Restaurant::select('id', 'restaurant_id', 'restaurant_name', 'restaurant_email', 'restaurant_phone', 'restaurant_store_type')->get();
        return DataTables::of($all_store)
            ->addColumn('action', function ($all_store) {
                return ' <a href="' . route('admin.store.edit', $all_store->id) . '"> <button class="btn btn-success btn-info btn-sm"><i class="fas fa-edit"></i> </button></a>
                        <button id="' . $all_store->id . '" onclick="deletestore(this.id)" class="btn btn-danger btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#deletstore"><i class="far fa-trash-alt"></i> </button>';
            })
            ->editColumn('created_at', function ($all_store) {
                return Carbon::parse($all_store->created_at)->format('d-F-Y');
            })
            ->editColumn('restaurant_store_type', function ($all_store) {
                $type = store_type::select('store_type_name')->where('id', $all_store->restaurant_store_type)->first();
                if ($type) {
                    return $type->store_type_name;
                } else {
                    return "Not Set";
                }
            })
            ->make(true);
    }


    public function store_edit($id)
    {
        $store_types = store_type::all();
        $store_edit = Restaurant::where('id', $id)->first();
        return view('admin.restaurant.storeEdit', compact('store_types', 'store_edit'));
    }


    public function store_update(Request $request)
    {
        $update_res = Restaurant::where('id', $request->restaurant_edit)->first();
        if ($request->hasFile('restaurant_image')) {
            $image = $request->file('restaurant_image');
            $imageName = uniqid() . time() . '.' . 'png';
            $directory = 'assets/dashboard/images/restaurant/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $update_res->restaurant_image = $imgUrl;
        }

        $update_res->restaurant_name = $request->restaurant_name;
        $update_res->restaurant_email = $request->restaurant_email;
        $update_res->restaurant_phone = $request->restaurant_phone;
        if ($request->password != null || $request->password != "") {
            $update_res->password = Hash::make($request->password);
        }
        $update_res->restaurant_store_type = $request->restaurant_store_type;
        $update_res->restaurant_google_address = $request->restaurant_google_address;
        $update_res->restaurant_google_latitude = $request->restaurant_google_latitude;
        $update_res->restaurant_google_longitude = $request->restaurant_google_longitude;
        $update_res->restaurant_address = $request->restaurant_address;
        $update_res->restaurant_description = $request->restaurant_description;
        $update_res->save();
        return back()->with('success', 'Store Successfully Updated');
    }

    public function store_delete(Request $request)
    {
        $store = Restaurant::where('id', $request->delete_store)->first();
        $store->delete();
        return back()->with('success', 'Store Successfully Deleted');
    }

    public function store_gallery()
    {
        return view('admin.gallery.storeGallery');
    }

    public function store_gallery_create()
    {
        $all_res = Restaurant::select('id', 'restaurant_name')->get();
        return view('admin.gallery.storeGalleryCreate', compact('all_res'));
    }

    public function store_gallery_save(Request $request)
    {
        $new_gallery = new restaurant_gallery();
        if ($request->hasFile('main_image')) {
            $image = $request->file('main_image');
            $imageName = uniqid() . time() . '.' . 'png';
            $directory = 'assets/dashboard/images/gallery/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $new_gallery->main_image = $imgUrl;
        } else {
            $new_gallery->main_image = "assets/dashboard/images/default.png";
        }

        if ($request->hasFile('optional_image_one')) {
            $image = $request->file('optional_image_one');
            $imageName = uniqid() . time() . '.' . 'png';
            $directory = 'assets/dashboard/images/gallery/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $new_gallery->optional_image_one = $imgUrl;
        } else {
            $new_gallery->optional_image_one = "assets/dashboard/images/default.png";
        }

        if ($request->hasFile('optional_image_two')) {
            $image = $request->file('optional_image_two');
            $imageName = uniqid() . time() . '.' . 'png';
            $directory = 'assets/dashboard/images/gallery/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $new_gallery->optional_image_two = $imgUrl;
        } else {
            $new_gallery->optional_image_two = "assets/dashboard/images/default.png";
        }

        if ($request->hasFile('optional_image_three')) {
            $image = $request->file('optional_image_three');
            $imageName = uniqid() . time() . '.' . 'png';
            $directory = 'assets/dashboard/images/gallery/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $new_gallery->optional_image_three = $imgUrl;
        } else {
            $new_gallery->optional_image_three = "assets/dashboard/images/default.png";
        }

        if ($request->hasFile('optional_image_four')) {
            $image = $request->file('optional_image_four');
            $imageName = uniqid() . time() . '.' . 'png';
            $directory = 'assets/dashboard/images/gallery/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $new_gallery->optional_image_four = $imgUrl;
        } else {
            $new_gallery->optional_image_four = "assets/dashboard/images/default.png";
        }

        if ($request->hasFile('optional_image_five')) {
            $image = $request->file('optional_image_five');
            $imageName = uniqid() . time() . '.' . 'png';
            $directory = 'assets/admin/images/gallery/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $new_gallery->optional_image_five = $imgUrl;
        } else {
            $new_gallery->optional_image_five = "assets/dashboard/images/default.png";
        }

        $new_gallery->restaurant_id = $request->restaurant_id;
        $new_gallery->description = $request->description;
        $new_gallery->save();

        return back()->with('success', 'Store Gallery Successfully Created');
    }


    public function store_gallery_get(Request $request)
    {
        $store_gallery = restaurant_gallery::select('id', 'restaurant_id', 'main_image')->get();
        return DataTables::of($store_gallery)
            ->addColumn('action', function ($store_gallery) {
                return ' <a href="' . route('admin.store.gallery.edit', $store_gallery->id) . '"> <button class="btn btn-success btn-info btn-sm"><i class="fas fa-edit"></i> </button></a>
                        <button id="' . $store_gallery->id . '" onclick="deletestoregal(this.id)" class="btn btn-danger btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#deletestoregallery"><i class="far fa-trash-alt"></i> </button>';
            })
            ->editColumn('created_at', function ($store_gallery) {
                return Carbon::parse($store_gallery->created_at)->format('d-F-Y');
            })
            ->editColumn('restaurant_id', function ($store_gallery) {
                $res = Restaurant::select('restaurant_name')->where('id', $store_gallery->restaurant_id)->first();
                if ($res) {
                    return $res->restaurant_name;
                } else {
                    return "Not Set";
                }
            })
            ->make(true);
    }


    public function store_gallery_edit($id)
    {
        $all_res = Restaurant::select('id', 'restaurant_name')->get();
        $gallery = restaurant_gallery::where('id', $id)->first();
        return view('admin.gallery.storeGalleryEdit', compact('all_res', 'gallery'));
    }


    public function store_gallery_update(Request $request)
    {
        $update_gallery = restaurant_gallery::where('id', $request->gallery_edit)->first();

        if ($request->hasFile('main_image')) {
            $image = $request->file('main_image');
            $imageName = uniqid() . time() . '.' . 'png';
            $directory = 'assets/dashboard/images/gallery/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $update_gallery->main_image = $imgUrl;
        }

        if ($request->hasFile('optional_image_one')) {
            $image = $request->file('optional_image_one');
            $imageName = uniqid() . time() . '.' . 'png';
            $directory = 'assets/dashboard/images/gallery/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $update_gallery->optional_image_one = $imgUrl;
        }

        if ($request->hasFile('optional_image_two')) {
            $image = $request->file('optional_image_two');
            $imageName = uniqid() . time() . '.' . 'png';
            $directory = 'assets/dashboard/images/gallery/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $update_gallery->optional_image_two = $imgUrl;
        }

        if ($request->hasFile('optional_image_three')) {
            $image = $request->file('optional_image_three');
            $imageName = uniqid() . time() . '.' . 'png';
            $directory = 'assets/dashboard/images/gallery/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $update_gallery->optional_image_three = $imgUrl;
        }

        if ($request->hasFile('optional_image_four')) {
            $image = $request->file('optional_image_four');
            $imageName = uniqid() . time() . '.' . 'png';
            $directory = 'assets/dashboard/images/gallery/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $update_gallery->optional_image_four = $imgUrl;
        }

        if ($request->hasFile('optional_image_five')) {
            $image = $request->file('optional_image_five');
            $imageName = uniqid() . time() . '.' . 'png';
            $directory = 'assets/dashboard/images/gallery/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $update_gallery->optional_image_five = $imgUrl;
        }

        $update_gallery->restaurant_id = $request->restaurant_id;
        $update_gallery->description = $request->description;
        $update_gallery->save();

        return back()->with('success', 'Store Gallery Successfully Updated');

    }

    public function store_gallery_delete(Request $request)
    {
        $store_gallery_delete = restaurant_gallery::where('id', $request->delete_store_gallery)->first();
        $store_gallery_delete->delete();
        return back()->with('success', 'Store Gallery Successfully Deleted');
    }

}
