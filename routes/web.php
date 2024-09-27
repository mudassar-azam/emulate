<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {

    require base_path('routes/admin.php');
});

Route::get('/', function () {
    return view('seller.index');
});

Route::get('/buyer', function () {
    return view('buyer.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
