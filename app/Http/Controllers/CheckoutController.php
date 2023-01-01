<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\FlowerType;
use App\Models\Occasion;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class CheckoutController extends Controller
{
    public function index()
    {
        $occasions = Occasion::All();
        $flowertypes = FlowerType::All();
        $carts = Cart::where('user_id', Auth::id())->get();
        return view('home.checkout', compact('occasions', 'flowertypes', 'carts'));
    }

    public function PlaceOn(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'fullname' => 'required',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'address' => 'required',
            'placeon' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'msg' => $validator->errors()->toArray()
            ]);
        } else {
            if ($req->payments == 1) {
                $order = new Order();
                $order->user_id = Auth::id();
                $order->Reci_name = $req->fullname;
                $order->Reci_phone = $req->phone;
                $order->Reci_email = $req->email;
                $order->Reci_address = $req->address;
                $order->place_on = date('Y-m-d', strtotime($req->placeon));
                $order->total_products = $req->total_qty;
                $order->total_price = $req->total;
                $order->save();

                if ($order) {
                    $cartitems = Cart::where('user_id', Auth::id())->get();
                    foreach ($cartitems as $item) {
                        $orderItems = new  OrderItems([
                            'product_id' => $item->product_id,
                            'total_qty' => $item->cart_qty,
                            'total_price' => $item->products->product_price
                        ]);
                        $order->items()->save($orderItems);
                    }
                    Cart::where('user_id', Auth::id())->delete();
                    $occasions = Occasion::All();
                    $flowertypes = FlowerType::All();
                    return view('home.success',compact('occasions','flowertypes'));
                }
            }
            if ($req->payments == 2) {
                $amount = $req->total;
                $name = $req->fullname;
                $phone = $req->phone;
                $email = $req->email;
                $address = $req->address;

                $order = new Order();
                $order->user_id = Auth::id();
                $order->Reci_name = $req->fullname;
                $order->Reci_phone = $req->phone;
                $order->Reci_email = $req->email;
                $order->Reci_address = $req->address;
                $order->place_on = date('Y-m-d', strtotime($req->placeon));
                $order->total_products = $req->total_qty;
                $order->total_price = $req->total;
                $order->save();

                if ($order) {
                    $cartitems = Cart::where('user_id', Auth::id())->get();
                    foreach ($cartitems as $item) {
                        $orderItems = new  OrderItems([
                            'product_id' => $item->product_id,
                            'total_qty' => $item->cart_qty,
                            'total_price' => $item->products->product_price
                        ]);
                        $order->items()->save($orderItems);
                    }
                    Cart::where('user_id', Auth::id())->delete();
                    $orderId = Order::where('user_id', Auth::id())->first();
                    return view('vnpay.index', compact('amount', 'name', 'email', 'address', 'orderId', 'phone'));
                }
            }
        }
    }

    public function CreatePayment(Request $req)
    {
        function rand_string( $length ) {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $str = '';
            $size = strlen( $chars );
            for( $i = 0; $i < $length; $i++ ) {
                $str .= $chars[ rand( 0, $size - 1 ) ];
                }
                return $str;
            
        }
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
        $vnp_TmnCode = "7NTR0CSE"; //Mã website tại VNPAY 
        $vnp_HashSecret = "CMIFNLAKLZRRFNIHRCEZADRALKMBEWJI"; //Chuỗi bí mật
        
        $vnp_TxnRef = rand_string(15); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $req->order_desc;
        $vnp_Amount = $req->amount * 100;
        $vnp_BankCode = $req->bank_code;
        // //Billing
        // $vnp_Bill_Mobile = $req->txt_ship_mobile;
        // $vnp_Bill_Email = $req->txt_ship_email;
        // $fullName = $req->txt_ship_fullname;
        // $vnp_Bill_Address = $req->txt_ship_addr1;
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_ReturnUrl" => route('vnpay_return'),
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_IpAddr" => '192.168.1.102',
            "vnp_Locale" => 'vn',

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
       

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        if (isset($req->redirect)) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        return redirect($vnp_Url);
    }
    public function vnpayReturn(Request $req)
    {
        if($req->vnp_ResponseCode == '00'){
            $vnpData = $req->all();
            $trans = new Payments();
            $trans->p_transaction_id = $vnpData['vnp_TransactionNo'];
            $trans->user_id = Auth::id();
            $trans->amount = $vnpData['vnp_Amount'];
            $trans->p_vnp_response_code = $vnpData['vnp_ResponseCode'];
            $trans->code_bank = $vnpData['vnp_BankCode'];
            $trans->save();
            
            return view('vnpay.vnpay_return',compact('vnpData'));
        }
    }
    
}
