<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
   
    public function Test(Request $request)
    {

        if($request->hasFile('photo')){
            $path = 'storage/' .auth()->user()->photo;

            $profile_img = $request->photo->store('frontend/images','public');

        }
        User::created([
            'name' => $request->name,
            'email' => $request->email,
            ''
        ]);


        return view('testimg')->with('Luu thanh cong');
    }
    protected function storeImage(Request $request)
    {
        $path = $request->file('photo')->store('');
        return substr($path, strlen('public/'));
    }
}
