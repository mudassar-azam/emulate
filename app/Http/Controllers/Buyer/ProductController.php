<?php

namespace App\Http\Controllers\Buyer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller\Item;
use App\Models\User;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(){
        $products = Item::all();
        $sellers = User::where('role', 'seller')->get();
        $categories = Category::all();
        return view('buyer.product.index',compact('products','sellers','categories'));
    }

    public function details($id){
        $item = Item::with('itemImages')->findOrFail($id);
        $products = Item::all();
        return view('buyer.product.product-details',compact('products','item'));
    }
}
