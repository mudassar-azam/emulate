<?php

namespace App\Http\Controllers\Buyer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller\Item;


class CheckoutController extends Controller
{
    public function checkout(){
        return view('buyer.product.checkout');
    }
}
