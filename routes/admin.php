<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Route::middleware('LoginCheck')->match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('admin.login');

Route::middleware('authAdmin')->group(function (){
    Route::get('/logout', function() {
        Auth::logout();
        return redirect()->back();
    });
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    

    Route::group(['prefix' => '/flowertype'], function () {
        Route::get('/show-flowertype', [DashboardController::class, 'showFlowerType']);
        Route::post('/delete-flowertype',[DashboardController::class, 'deleteFlowertype'])->name('flowertype.delete');
    });
    Route::group(['prefix' => '/occasion'], function () {
        Route::get('/show-occasion', [DashboardController::class, 'showOccasion']);
        Route::match(['get', 'post'], '/add-occasion', [DashboardController::class, 'addOccasion'])->name('occasion.add');
        Route::post('/delete-occasion',[DashboardController::class, 'deleteOccasion'])->name('occasion.delete');
    });
    Route::group(['prefix' => '/customer'], function () {
        Route::get('/show-customer', [DashboardController::class, 'showCustomer']);
    });
});