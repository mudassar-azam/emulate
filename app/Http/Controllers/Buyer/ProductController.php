<?php

namespace App\Http\Controllers\Buyer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller\Item;

class ProductController extends Controller
{
    public function index(){
        $products = Item::all();
        return view('buyer.product.index',compact('products'));
    }

    public function details($id){
        $product = Item::with('itemImages')->findOrFail($id);
        $products = Item::all();
        return view('buyer.product.product-details',compact('product','products'));
    }
}
