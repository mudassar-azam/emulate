<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Seller\SellerFrontController;
use App\Http\Controllers\Seller\SellerSettingsController;
use App\Http\Controllers\Seller\ItemController;
use App\Http\Controllers\Seller\PostController;
use App\Http\Controllers\Buyer\BuyerFrontController;
use App\Http\Controllers\Buyer\ProductController;
use App\Http\Controllers\Buyer\CheckoutController;
use App\Http\Controllers\Buyer\CartController;
use App\Http\Controllers\Buyer\OrderController;
use App\Http\Controllers\Buyer\WishlistController;
use App\Http\Controllers\Buyer\BuyerSettingsController;
use App\Http\Middleware\CheckUserRole;
use App\Http\Controllers\StripeController;



// auth 
    Auth::routes();
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::post('/login', [LoginController::class, 'login'])->name('login');

// seller
Route::group(['middleware' => CheckUserRole::class], function () {
    Route::get('/seller', [SellerFrontController::class, 'index'])->name('seller.front');
    Route::get('/seller-dashboard', [SellerFrontController::class, 'dashboard'])->name('seller.dashboard');
    Route::post('/store-item', [ItemController::class, 'store'])->name('item.store');
    Route::post('/store-post', [PostController::class, 'store'])->name('post.store');
    Route::post('/update-seller-settings', [SellerSettingsController::class, 'update'])->name('update.seller.settings');
    Route::get('/orders', [SellerFrontController::class, 'order'])->name('seller.orders');
});


// buyer
    Route::get('/', [BuyerFrontController::class, 'index'])->name('buyer.front');
    Route::get('/all-products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/product-details/{id}', [ProductController::class, 'details'])->name('product.details');
    Route::post('/store-cart', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart/items', [CartController::class, 'getCartItems']);
    Route::post('/cart/confirm/order', [CartController::class, 'confirmOrder'])->name('buyer.cart.confirm.order');
    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('buyer.checkout');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::post('/order-now', [OrderController::class, 'buyNow'])->name('buyer.order.now');
    Route::delete('/destroyOrder/{id}', [OrderController::class, 'destroyOrder'])->name('order.destroy');

//buyer/settings

    Route::get('/buyer-settings', [BuyerSettingsController::class, 'settings'])->name('buyer.settings');
    Route::post('/buyer-update-settings', [BuyerSettingsController::class, 'update'])->name('buyer.update.settings');
    Route::post('/deleteOrder/{id}', [BuyerSettingsController::class, 'destroy'])->name('buyer.order.destroy');


// admin
    Route::post('admin/sendEmail', [\App\Http\Controllers\Admin\AdminController::class, 'sendEmail'])->name('admin.sendEmail');

// stripe 
    Route::get('/success', [StripeController::class, 'success'])->name('stripe.success');
    Route::get('/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');
    Route::get('/new-card/{token}', [StripeController::class, 'handlePayment'])->name('stripe.newcard');
    Route::post('/new-card', [StripeController::class, 'store']);

// wishlist  
    Route::post('/add-to-wishlist', [WishlistController::class, 'store'])->name('add.wishlist');
    Route::get('/wishlist-items', [WishlistController::class, 'getWishlistItems'])->name('wishlist.all');
    Route::post('/remove-wishlist-item', [WishlistController::class, 'removeWishlistItem'])->name('wishlist.remove');

