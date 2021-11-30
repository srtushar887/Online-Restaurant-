<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RestaurantLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:restaurant', ['except' => ['logout']]);
    }


    public function showLoginform()
    {
        return view('auth.restaurant.restaurantLogin');
    }


    //this is login function for admin which is given email and password to get data form database
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        if (Auth::guard('restaurant')->attempt(['restaurant_email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect(route('restaurant.dashboard'));
        }

        return redirect()->back()->with('alert', "The email or password that you've entered doesn't match any account.");

    }


    //this funsion for admin logout which i customized to cpy form loginController
    public function logout()
    {
        Auth::guard('restaurant')->logout();
        return redirect(route('front'));
    }
}
