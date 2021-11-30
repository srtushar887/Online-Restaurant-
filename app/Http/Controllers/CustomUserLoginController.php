<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomUserLoginController extends Controller
{
    public function user_register(Request $request)
    {
        $check_user = User::where('email', $request->email)->first();
        if ($check_user) {
            return back()->with('alert', 'Email already exists');
        } else {

            $new_user = new User();
            $new_user->first_name = $request->first_name;
            $new_user->last_name = $request->last_name;
            $new_user->email = $request->email;
            $new_user->password = Hash::make($request->password);
            $new_user->save();

            return redirect(route('front'))->with('success', 'Account Successfully Created');
        }
    }


    public function user_login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect(route('front'));
        }

        return redirect()->back();
    }


}
