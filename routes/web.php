<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {

    require base_path('routes/admin.php');
});

Route::get('/', function () {
    return view('front.index');
});
Route::get('/product', function () {
    return view('product');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
