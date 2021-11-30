<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\main_category;
use App\Models\store_type;
use App\Models\sub_category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class AdminCategoryController extends Controller
{
    public function main_category()
    {
        $store_types = store_type::all();
        return view('admin.category.mainCategory', compact('store_types'));
    }

    public function main_category_get(Request $request)
    {
        $main_cats = DB::table('main_categories')->get();
        return DataTables::of($main_cats)
            ->addColumn('action', function ($main_cats) {
                return ' <button id="' . $main_cats->id . '" onclick="editmaincat(this.id)" class="btn btn-success btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editmaincategory"><i class="fas fa-edit"></i> </button>
                        <button id="' . $main_cats->id . '" onclick="deletemaincat(this.id)" class="btn btn-danger btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#deletemaincategory"><i class="far fa-trash-alt"></i> </button>';
            })
            ->editColumn('created_at', function ($main_cats) {
                return Carbon::parse($main_cats->created_at)->format('d-F-Y');
            })
            ->editColumn('main_category_store_type', function ($main_cats) {
                $type = store_type::select('store_type_name')->where('id', $main_cats->main_category_store_type)->first();
                if ($type) {
                    return $type->store_type_name;
                } else {
                    return "Not Set";
                }
            })
            ->make(true);
    }

    public function main_category_save(Request $request)
    {
        $new_main_cat = new main_category();
        if ($request->hasFile('main_category_image')) {
            $image = $request->file('main_category_image');
            $imageName = uniqid() . time() . '.' . 'jpg';
            $directory = 'assets/dashboard/images/category/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $new_main_cat->main_category_image = $imgUrl;
        } else {
            $new_main_cat->main_category_image = "assets/dashboard/images/default.jpg";
        }

        $new_main_cat->main_category_name = $request->main_category_name;
        $new_main_cat->main_category_store_type = $request->main_category_store_type;
        $new_main_cat->save();
        return back()->with('success', 'Main Category Successfully Created');

    }

    public function main_category_single(Request $request)
    {
        $singe_main_cat = main_category::where('id', $request->id)->first();
        $img = asset($singe_main_cat->main_category_image);
        return response()->json([
            'cat' => $singe_main_cat,
            'image' => $img
        ]);
    }


    public function main_category_update(Request $request)
    {
        $update_main_cat = main_category::where('id', $request->main_category_edit)->first();
        if ($request->hasFile('main_category_image_edit')) {
            $image = $request->file('main_category_image_edit');
            $imageName = uniqid() . time() . '.' . 'jpg';
            $directory = 'assets/dashboard/images/category/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $update_main_cat->main_category_image = $imgUrl;
        }

        $update_main_cat->main_category_name = $request->main_category_name_edit;
        $update_main_cat->main_category_store_type = $request->main_category_store_type_edit;
        $update_main_cat->save();
        return back()->with('success', 'Main Category Successfully Updated');
    }

    public function main_category_delete(Request $request)
    {
        $delete_main_cat = main_category::where('id', $request->main_category_delete)->first();
        $delete_main_cat->delete();
        return back()->with('success', 'Main Category Successfully Deleted');
    }


    public function sub_category()
    {
        $main_cats = main_category::all();
        $store_types = store_type::all();
        return view('admin.category.subCategory', compact('store_types', 'main_cats'));
    }

    public function sub_category_get(Request $request)
    {
        $sub_cats = DB::table('sub_categories')->get();
        return DataTables::of($sub_cats)
            ->addColumn('action', function ($sub_cats) {
                return ' <button id="' . $sub_cats->id . '" onclick="editsubcat(this.id)" class="btn btn-success btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editsubcategory"><i class="fas fa-edit"></i> </button>
                        <button id="' . $sub_cats->id . '" onclick="deletesubcat(this.id)" class="btn btn-danger btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#deletesubcategory"><i class="far fa-trash-alt"></i> </button>';
            })
            ->editColumn('main_category_id', function ($sub_cats) {
                $cat_name = main_category::select('main_category_name')->where('id', $sub_cats->main_category_id)->first();
                if ($cat_name) {
                    return $cat_name->main_category_name;
                } else {
                    return "";
                }
            })
            ->editColumn('created_at', function ($sub_cats) {
                return Carbon::parse($sub_cats->created_at)->format('d-F-Y');
            })
            ->editColumn('sub_category_store_type', function ($sub_cats) {
                $type = store_type::select('store_type_name')->where('id', $sub_cats->sub_category_store_type)->first();
                if ($type) {
                    return $type->store_type_name;
                } else {
                    return "Not Set";
                }
            })
            ->make(true);
    }


    public function sub_category_save(Request $request)
    {
        $new_sub_cat = new sub_category();
        if ($request->hasFile('sub_category_image')) {
            $image = $request->file('sub_category_image');
            $imageName = uniqid() . time() . '.' . 'jpg';
            $directory = 'assets/dashboard/images/category/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $new_sub_cat->sub_category_image = $imgUrl;
        } else {
            $new_sub_cat->sub_category_image = "assets/dashboard/images/default.jpg";
        }

        $new_sub_cat->main_category_id = $request->main_category_id;
        $new_sub_cat->sub_category_name = $request->sub_category_name;
        $new_sub_cat->sub_category_store_type = $request->sub_category_store_type;
        $new_sub_cat->save();
        return back()->with('success', 'Sub Category Successfully Created');
    }

    public function sub_category_single(Request $request)
    {
        $single_sub_cat = sub_category::where('id', $request->id)->first();
        return response()->json([
            'subcat' => $single_sub_cat,
            'img' => asset($single_sub_cat->sub_category_image)
        ]);
    }


    public function sub_category_update(Request $request)
    {
        $update_sub_cat = sub_category::where('id', $request->sub_category_edit)->first();
        if ($request->hasFile('edit_subcat_image')) {
            $image = $request->file('edit_subcat_image');
            $imageName = uniqid() . time() . '.' . 'jpg';
            $directory = 'assets/dashboard/images/category/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $update_sub_cat->sub_category_image = $imgUrl;
        }

        $update_sub_cat->main_category_id = $request->edit_main_category_id;
        $update_sub_cat->sub_category_name = $request->edit_sub_category_name;
        $update_sub_cat->sub_category_store_type = $request->edit_sub_category_store_type;
        $update_sub_cat->save();
        return back()->with('success', 'Sub Category Successfully Updated');
    }

    public function sub_category_delete(Request $request)
    {
        $delete_sub_cat = sub_category::where('id', $request->sub_category_delete)->first();
        $delete_sub_cat->delete();
        return back()->with('success', 'Sub Category Successfully Deleted');
    }

}
