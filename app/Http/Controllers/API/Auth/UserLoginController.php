<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserLoginController extends Controller
{
    public function user_register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'password' => 'required|min:8',
            'user_devise_token' => 'required',

        ], [
            'first_name.required' => 'Please Enter Your First Name',
            'last_name.required' => 'Please Enter Your Last Name',
            'email.required' => 'Please Enter Your Email',
            'phone_number.required' => 'Please Enter Phone Number',
            'password.required' => 'Please Enter Password',
            'user_devise_token.required' => 'Please Enter Device Token',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ]);
        } else {
            $exist_user = User::where('email', $request->email)->first();

            if ($exist_user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Email Already Exist',
                ]);
            } else {
                $new_user = new User();
                $new_user->first_name = $request->first_name;
                $new_user->last_name = $request->last_name;
                $new_user->email = $request->email;
                $new_user->phone_number = $request->phone_number;
                $new_user->password = Hash::make($request->password);
                $new_user->user_devise_token = $request->user_devise_token;
                $new_user->account_status = 0;
                $new_user->save();

                $success['token'] = $new_user->createToken('')->accessToken;

                $new_user_details = User::select('id', 'first_name', 'last_name', 'email', 'phone_number', 'user_devise_token', 'created_at', 'updated_at')->where('id', $new_user->id)->first();

                return response()->json([
                    'status' => 'success',
                    'message' => 'User Account Successfully Register',
                    'access_token' => 'Bearer' . ' ' . $success['token'],
                    'token_type' => 'Bearer',
                    'user' => $new_user_details
                ]);

            }

        }


    }


    public function user_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|min:8',
            'user_devise_token' => 'required',
        ], [
            'email.required' => 'Please Enter Your Email',
            'password.required' => 'Please Enter Password',
            'user_devise_token.required' => 'Device token is required',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ]);
        }

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status' => 'Unauthorised',
                'message' => 'These credentials do not match our records.'
            ], 200);
        } else {
            $user_status = User::where('email', $request->email)->first();
            if ($user_status->account_status == 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User not verified',
                ]);
            } else {
                if ($user_status->account_type == 1) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'account in-actice',
                    ]);
                } elseif ($user_status->account_type == 3) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'account blocked',
                    ]);
                } else {
                    $user = Auth::user();
                    $success['token'] = $user->createToken('')->accessToken;

                    $user_details = User::select('id', 'first_name', 'last_name', 'email', 'phone_number', 'user_devise_token', 'created_at', 'updated_at')->where('id', Auth::user()->id)->first();
                    $user_details->user_devise_token = $request->user_devise_token;
                    $user_details->save();

                    return response()->json([
                        'status' => 'success',
                        'message' => 'User Successfully Login',
                        'access_token' => 'Bearer' . ' ' . $success['token'],
                        'token_type' => 'Bearer',
                        'user_details' => $user_details
                    ]);
                }
            }
        }


    }


}
