<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiController
{
    public function login(Request $request)
    {
     //   return $request;
        // $login = $request->validate([
        //     'eamil' => 'required|eamil',
        //     'password' => 'required|string',
        // ]);
       
        // (Auth::guard('admin')->attempt($credentials)
        if (!Auth::guard('patients')->attempt($request->only(['email','password']))) {
            return $this->sendError('not Authrized', 'Invalid login Data', 200);
        }
        $token = Auth::guard('patients')->user()->createToken('AuthToken')->accessToken;
        return $this->sendResponse("Login Succefull", ['accessToken' => $token]);
    }

    // public function register(Request $request)
    // {
    //     $login = $request->validate([
    //         'phone' => 'required|numeric',
    //         'password' => 'required|string',
    //     ]);
    //     // (Auth::guard('admin')->attempt($credentials)
    //     if (!Auth::guard('patients')->attempt($login)) {
    //         return $this->sendError('not Authrized', 'Invalid login Data', 200);
    //     }
    //     $token = Auth::guard('patients')->user()->createToken('AuthToken')->accessToken;
    //     return $this->sendResponse("Login Succefull", ['accessToken' => $token]);
    // }
}
