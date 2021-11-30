<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\general_setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function general_settings()
    {
        $gen_setting = general_setting::first();
        return view('admin.pages.generalSettings',compact('gen_setting'));
    }

    public function general_settings_save(Request $request)
    {
        $gen_setting = general_setting::first();
        if($request->hasFile('logo')){
//            @unlink($gen_setting->logo);
            $image = $request->file('logo');
            $imageName = uniqid().time().'.'.'png';
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen_setting->logo = $imgUrl;
        }
        if($request->hasFile('icon')){
//            @unlink($gen_setting->icon);
            $image = $request->file('icon');
            $imageName = uniqid().time().'.'.'png';
            $directory = 'assets/admin/images/logo/';
            $imgUrl1  = $directory.$imageName;
            Image::make($image)->save($imgUrl1);
            $gen_setting->icon = $imgUrl1;
        }

        $gen_setting->site_name = $request->site_name;
        $gen_setting->site_email = $request->site_email;
        $gen_setting->site_phone_number = $request->site_phone_number;
        $gen_setting->site_currency = $request->site_currency;
        $gen_setting->tax = $request->tax;
        $gen_setting->near_five_km_fees = $request->near_five_km_fees;
        $gen_setting->per_km_fees = $request->per_km_fees;
        $gen_setting->site_address = $request->site_address;
        $gen_setting->invoice_note = $request->invoice_note;
        $gen_setting->save();

        return back()->with('success','General Settings Successfully Updated');


    }
}
