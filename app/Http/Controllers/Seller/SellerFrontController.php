<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Seller\Item;
use App\Models\Seller\Post;
use App\Models\Buyer\Order;
use App\Models\User;
use App\Models\Category;

class SellerFrontController extends Controller
{
    public function index(){

        $user = Auth::check() ? User::find(Auth::user()->id) : null;
        $items = Item::all();
        $posts = Post::all();
        $categories = Category::all();
        return view('seller.index',compact('user','items','categories','posts'));

    }


    public function dashboard(){
        return view('seller.dashboard');
    }

    public function order()
    {
        $orders = Order::where('product_owner_id' , Auth::user()->id)->get();
        return view('seller.orders',compact('orders'));
    }

    public function showSignupForm(Request $request)
    {
        $email = $request->query('email');
        $showModal = $request->query('modal') === 'true'; 
        return view('seller.signup', compact('email', 'showModal'));
    }
}
