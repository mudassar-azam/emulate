<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\SellerFrontController;
use App\Http\Controllers\Buyer\BuyerFrontController;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {

    require base_path('routes/admin.php');
});

// seller 

Route::get('/', [SellerFrontController::class, 'index'])->name('seller.front');

// buyer 

Route::get('/buyer', [BuyerFrontController::class, 'index'])->name('buyer.front');