<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\FlowerType;
use App\Models\Occasion;
use App\Models\Products;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class CartController extends Controller
{
    public function index()
    {
        $occasions = Occasion::All();
        $flowertypes = FlowerType::All();
        $cartitem = Cart::where('user_id',Auth::id())->get();
        return view('home.cart',compact('occasions','flowertypes','cartitem'));
    }

    public function AddCart(Request $req)
    {
        if($req->isMethod('post')){
            if(Auth::check()){
                Cart::firstOrCreate( [
                    'user_id' => Auth::id(),
                    'product_id' => $req->proId,
                    'cart_qty' => $req->amount,
                ]);
                return response()->json([
                        'status'=>200,
                        'msg'=>'Add Successfully'
                    ]);
            }
            else{
                return response()->json(['status'=>403, 'msg'=>'Login to Continue']);
        
            }
        }
    }

    public function DeleteCart(Request $req)
    {
        Cart::where('product_id',$req->proId)->where('user_id',Auth::id())->delete();
        return response()->json(['status'=>200,'msg'=>'Delete Successfully']);
    }

    public function UpdateCart(Request $req)
    {
        if($req->ajax()){
            $data = $req->all();
            Cart::where('user_id', Auth::id())->where('product_id', $data['proId'])->update(['cart_qty' => $data['qtyInput']]);
            $cartitem = Cart::where('user_id',Auth::id())->get();
            return response()->json([
                'status'=>200,
                'msg'=>'Update Successfully',
                'view' => (String)View::make('home.cart_items')->with(compact('cartitem'))
            ]);
        }
        
    }
    
    public function cartcount()
    {
        $cartcount = Cart::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$cartcount]);
    }
}
