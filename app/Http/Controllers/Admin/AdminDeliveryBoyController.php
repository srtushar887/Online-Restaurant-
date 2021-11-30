<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\assign_delivery_boy;
use App\Models\DeliveryBoy;
use App\Models\Restaurant;
use App\Models\store_type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;

class AdminDeliveryBoyController extends Controller
{
    public function delivery_boy_create()
    {
        return view('admin.deliveryBoy.deliveryBoyCreate');
    }


    public function delivery_boy_save(Request $request)
    {
        $new_deliveryboy = new DeliveryBoy();
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = uniqid() . time() . '.' . 'jpg';
            $directory = 'assets/dashboard/images/deliveryboy/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $new_deliveryboy->profile_image = $imgUrl;
        } else {
            $new_deliveryboy->profile_image = "assets/dashboard/images/default.jpg";
        }


        $new_deliveryboy->first_name = $request->first_name;
        $new_deliveryboy->last_name = $request->last_name;
        $new_deliveryboy->email = $request->email;
        $new_deliveryboy->phone = $request->phone;
        $new_deliveryboy->password = Hash::make($request->password);
        $new_deliveryboy->address = $request->address;
        $new_deliveryboy->save();
        return back()->with('success', 'Delivery Boy Successfully Created');

    }


    public function delivery_boy_list()
    {
        return view('admin.deliveryBoy.deliveryBoyList');
    }

    public function delivery_boy_list_get()
    {
        $all_del_boys = DeliveryBoy::select('id', 'first_name', 'last_name', 'email', 'phone', 'created_at')->get();
        return DataTables::of($all_del_boys)
            ->addColumn('action', function ($all_del_boys) {
                return ' <a href="' . route('admin.delete.boy.edit', $all_del_boys->id) . '"> <button class="btn btn-success btn-info btn-sm"><i class="fas fa-edit"></i> </button></a>
                        <button id="' . $all_del_boys->id . '" onclick="deletedelboy(this.id)" class="btn btn-danger btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#deletedelboymodal"><i class="far fa-trash-alt"></i> </button>';
            })
            ->editColumn('created_at', function ($all_del_boys) {
                return Carbon::parse($all_del_boys->created_at)->format('d-F-Y');
            })
            ->make(true);
    }


    public function delivery_boy_edit($id)
    {
        $del_boy = DeliveryBoy::where('id', $id)->first();
        return view('admin.deliveryBoy.deliveryBoyEdit', compact('del_boy'));
    }


    public function delivery_boy_update(Request $request)
    {
        $update_deliveryboy = DeliveryBoy::where('id', $request->edit_del_boy)->first();
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = uniqid() . time() . '.' . 'jpg';
            $directory = 'assets/dashboard/images/deliveryboy/';
            $imgUrl = $directory . $imageName;
            Image::make($image)->save($imgUrl);
            $update_deliveryboy->profile_image = $imgUrl;
        }


        $update_deliveryboy->first_name = $request->first_name;
        $update_deliveryboy->last_name = $request->last_name;
        $update_deliveryboy->email = $request->email;
        $update_deliveryboy->phone = $request->phone;
        if ($request->password != null || $request->password != "") {
            $update_deliveryboy->password = Hash::make($request->password);
        }
        $update_deliveryboy->address = $request->address;
        $update_deliveryboy->save();
        return back()->with('success', 'Delivery Boy Successfully Updated');
    }


    public function delivery_boy_delete(Request $request)
    {
        $del_del_boy = DeliveryBoy::where('id', $request->del_boy_delete)->first();
        $del_del_boy->delete();
        return back()->with('success', 'Delivery Boy Successfully Deleted');
    }


    public function delivery_boy_assign()
    {
        $all_rest = Restaurant::select('id', 'restaurant_name')->get();
        $all_del_boy = DeliveryBoy::select('id', 'first_name', 'last_name')->get();
        $ass_assign_del_boys = assign_delivery_boy::orderBy('id', 'desc')->paginate(15);
        return view('admin.deliveryBoy.deliveryBoyAssign', compact('all_rest', 'all_del_boy', 'ass_assign_del_boys'));
    }

    public function delivery_boy_assign_save(Request $request)
    {

        $exists_delivery = assign_delivery_boy::where('restaurant_id', $request->restaurant_id)->where('deliveryboy_id', $request->deliveryboy_id)->first();
        if ($exists_delivery) {
            return back()->with('alert', 'Deliveryboy already assign this Restaurant');
        } else {
            $assign_del_boy = new assign_delivery_boy();
            $assign_del_boy->restaurant_id = $request->restaurant_id;
            $assign_del_boy->deliveryboy_id = $request->deliveryboy_id;
            $assign_del_boy->save();
            return back()->with('success', 'Delivery Boy Successfully Assigned');
        }


    }


    public function delivery_boy_assign_update(Request $request)
    {
        $assign_del_boy = assign_delivery_boy::where('id', $request->edit_assign)->first();
        $assign_del_boy->restaurant_id = $request->restaurant_id;
        $assign_del_boy->deliveryboy_id = $request->deliveryboy_id;
        $assign_del_boy->save();
        return back()->with('success', 'Delivery Boy Assigned Updated');
    }


    public function delivery_boy_assign_delete(Request $request)
    {
        $delete_assign_del_boy = assign_delivery_boy::where('id', $request->delete_assign_delboy)->first();
        $delete_assign_del_boy->delete();
        return back()->with('success', 'Assign Delivery Boy Successfully Deleted');

    }

}
