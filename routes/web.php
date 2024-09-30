<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Seller\SellerFrontController;
use App\Http\Controllers\Seller\SellerSettingsController;
use App\Http\Controllers\Seller\ItemController;
use App\Http\Controllers\Seller\PostController;
use App\Http\Controllers\Buyer\BuyerFrontController;


Auth::routes();



// seller





Route::get('/seller', [SellerFrontController::class, 'index'])->name('seller.front');
Route::get('/seller-dashboard', [SellerFrontController::class, 'dashboard'])->name('seller.dashboard');
Route::post('/store-item', [ItemController::class, 'store'])->name('item.store');
Route::post('/store-post', [PostController::class, 'store'])->name('post.store');
Route::post('/update-seller-settings', [SellerSettingsController::class, 'update'])->name('update.seller.settings');



// buyer
Route::get('/', [BuyerFrontController::class, 'index'])->name('buyer.front');




// admin
Route::post('admin/sendEmail', [\App\Http\Controllers\Admin\AdminController::class, 'sendEmail'])->name('admin.sendEmail');
