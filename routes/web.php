<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\RatingController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::post('/update-profile', [UserController::class, 'profileUpdate'])->name('profile.update');
Route::get('/forgetpass', [UserController::class, 'forget'])->name('auth.forgetpass');
Route::post('/forgot', [UserController::class, 'forgotPass'])->name('auth.forgot');
Route::get('/reset/{email}/{token}', [UserController::class, 'reset'])->name('reset');
Route::post('/reset-password', [UserController::class, 'resetPassword'])->name('auth.reset');


Route::group(['middleware' => ['LoginCheck']], function () {
    Route::post('/register', [UserController::class, 'createuser'])->name('auth.register');
    Route::get('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'loginuser'])->name('auth.login');
    Route::get('/login', [UserController::class, 'login'])->name('login');
});

Route::group(['middleware' => ['authAdmin']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::post('/login', [LoginController::class, 'login']);
        Route::get('/login', [LoginController::class, 'login']);
        Route::get('/dashboard', [DashboardController::class, 'dashboard']);
        Route::get('/add-flowertype', [DashboardController::class, 'addFlowertype']);
        Route::post('/add-flowertype', [DashboardController::class, 'addFlowertype'])->name('flowertype.add');
        Route::get('/delete-flowertype/{id}', [DashboardController::class, 'deleteFlowertype']);
        Route::get('/show-flowertype', [DashboardController::class, 'showFlowerType']);

    });
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/profile', [UserController::class, 'profile']);
    Route::get('/logout', function () {
        Auth::logout();
        return redirect()->back();
    });
    
});
Route::post('/add-rating', [RatingController::class, 'AddRating'])->name('addRating');
//Cart
Route::get('/cart', [CartController::class, 'index']);
Route::post('/add-cart', [CartController::class, 'AddCart'])->name('addCart');
Route::post('/delete-cart', [CartController::class, 'DeleteCart'])->name('deleteCart');
Route::post('/update-cart', [CartController::class, 'UpdateCart'])->name('updateCart');
Route::get('/loadCartCount', [CartController::class, 'cartcount'])->name('loadCartCount');

//Checkout
Route::get('/checkout', [CheckoutController::class, 'index']);
Route::post('/checkout', [CheckoutController::class, 'PlaceOn'])->name('placeOn');
Route::get('/vnpay',[CheckoutController::class, 'vnpay']);
Route::post('/vnpay_php/vnpay_create_payment.php', [CheckoutController::class, 'CreatePayment']);
Route::get('/vnpay_return',[CheckoutController::class, 'vnpayReturn'])->name('vnpay_return');


//SP
Route::group(['prefix' => 'search'], function () {
    Route::get('/home', [SearchController::class, 'index']);
    Route::get('/', [SearchController::class, 'search'])->name('search');
});
Route::get('/filter', [SearchController::class, 'filter'])->name('filter');
Route::get('/', [UserController::class, 'index']);
Route::get('/filterby/{id}/{type}', [SearchController::class, 'FilterBy'])->name('filterby');
Route::get('/detail/{id}', [UserController::class, 'showDetail'])->name('detail');


//Order
Route::get('/show-order', [UserController::class, 'showOrder']);

