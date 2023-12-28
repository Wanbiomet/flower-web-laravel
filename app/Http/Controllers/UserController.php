<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Mail\ForgotPassword;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Occasion;
use App\Models\FlowerType;
use App\Models\Order;
use App\Models\Ratings;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public function index()
    {

        $occasions = Occasion::All();
        $products = Products::all();
        $flowertypes = FlowerType::All();
        $products = Products::orderBy('created_at', 'desc')->take(5)->get();
        return view('home.home', compact('occasions', 'flowertypes', 'products'));
    }
    //Register
    public function register()
    {
        return view('auth.register');
    }
    public function createuser(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'fullname' => 'required|max:50',
            'email' => 'required|email|unique:users|max:100',
            'password' => 'required|min:6|max:18',
            'cpassword' => 'required|min:6|same:password'
        ], [
            'cpassword.same' => 'Password did not matched!',
            'cpassword.required' => 'Comfirm password is required!'
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->toArray()
            ]);
        } else {
            $user = User::where('email', $req->email)->first();
            $user = new User();
            $user->name = $req->fullname;
            $user->email = $req->email;
            $user->password = Hash::make($req->password);
            $user->role = 0;
            $user->save();
            $req->session()->put('loginUser', $user->id);
            return response()->json([
                'status' => 200,
                'message' => 'Register Successfully!!'
            ]);
        }
    }
    //Login
    public function login()
    {
        return view('auth.login');
    }
    public function loginuser(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|email|max:100',
            'password' => 'required|min:6|max:18',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->toArray()
            ]);
        }

        if (Auth::attempt($req->only(['email', 'password']))) {
            return response()->json(['status' => 200, 'message' => 'Login Successfully!!']);
        }
        return response()->json(['status' => 401, 'message' => 'Email or password incorrect!!']);
    }
    //Profile
    public function profile()
    {
        $data = ['userInfo' => DB::table('users')->where('id', Auth::id())->first()];
        return view('profile', $data);
    }
    public function profileUpdate(Request $req)
    {
        User::where('id', $req->id)->update([
            'name' => $req->fullname,
            'email' => $req->email,
            'phone' => $req->phone,
            'address' => $req->address
        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Update Successfully!!'
        ]);
    }
    //Forgot password
    public function forget()
    {
        return view('auth.forgetpass');
    }
    public function forgotPass(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|email|max:100',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->erros()->toArray(),
            ]);
        } else {
            $token = Str::uuid();
            $user = DB::table('users')->where('email', $req->email)->first();
            $details = [
                'body' => route('reset', ['email' => $req->email, 'token' => $token])
            ];

            if ($user) {
                User::where('email', $req->email)->update([
                    'token' => $token,
                    'token_expire' => Carbon::now()->addMinutes(10)->toDateTimeString()
                ]);

                Mail::to($req->email)->send(new ForgotPassword($details));
                return response()->json([
                    'status' => 200,
                    'message' => 'Reset password link has been sent to your email!'
                ]);
            } else {
                return response()->json([
                    'status' => 401,
                    'message' => 'This e-mail is not registered with us!'
                ]);
            }
        }
    }
    //Reset password
    public function reset(Request $req)
    {
        $email = $req->email;
        $token = $req->token;
        return view('auth.reset', ['email' => $email, 'token' => $token]);
    }
    public function resetPassword(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'npassword' => 'required|min:6|max:100',
            'cpassword' => 'required|min:6|max:100|same:npassword',
        ], [
            'cpassword' => 'Password is not matched!'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validator->errors()->toArray()
            ]);
        } else {
            $user = DB::table('users')->where('email', $req->email)->whereNotNull('token')->where('token', $req->token)
                ->where('token_expire', '>', Carbon::now())->exists();
            if ($user) {
                User::where('email', $req->email)->update([
                    'password' => Hash::make($req->npassword),
                    'token' => null,
                    'token_expire' => null
                ]);
                return response()->json([
                    'status' => 200,
                    'message' => 'Reset Password Successfully!!'
                ]);
            } else {
                return response()->json([
                    'status' => 401,
                    'message' => 'Reset link expired! Request for a new link'
                ]);
            }
        }
    }
    // Products Detail
    public function showDetail($id)
    {
        $data = Products::where('product_id', $id)->first();
        //API gợi ý sản phẩm
        // $client = new Client();
        // $response = $client->post('http://localhost:5000/recommendation', [
        //     'json' => ['product-name' => $data->product_name]
        // ]);
        // $product_id_recommend = json_decode($response->getBody())->product_recommend;
        $product_id_recommend = [];
        // Hiện thị chi tiết sản phẩm
        if ($product_id_recommend) {
            $products_recommend = Products::whereIn('product_name', $product_id_recommend)->get();
            $occasions = Occasion::All();
            $flowertypes = FlowerType::All();
            $ratings = Ratings::where('product_id', $id)->where('user_id', Auth::id())->latest('updated_at')->first();
            return view('home.details', compact('data', 'occasions', 'flowertypes', 'ratings', 'products_recommend'));
        } else {
            $occasions = Occasion::All();
            $flowertypes = FlowerType::All();
            $ratings = Ratings::where('product_id', $id)->where('user_id', Auth::id())->latest('updated_at')->first();
            return view('home.details', compact('data', 'occasions', 'flowertypes', 'ratings'));
        }
    }
    //ShowOrder
    public function showOrder()
    {
        $order = Order::where('user_id', Auth::id())->get();
        $occasions = Occasion::All();
        $flowertypes = FlowerType::All();
        return view('home.showOrder', compact('order', 'occasions', 'flowertypes'));
    }
}
