<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->getMethod() == 'GET') {
            return view('admin.login');
        }

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:100',
            'password' => 'required|min:6|max:18',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'msg' => $validator->errors()->toArray()
            ]);
        } 

        if (Auth::attempt($request->only(['email', 'password']))) {
            return response()->json(['status' => 200, 'msg' => 'Login Successfully!!']);
        }
        return response()->json(['status' => 401, 'msg' => 'Email or password incorrect!!']);
    }
}