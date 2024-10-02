<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Seller\Item;
use App\Models\Seller\Post;
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
        if (auth()->check()) {
            return view('seller.dashboard');
        }
        return response()->json(['error' => 'Authentication Required'], 401);
    }

    public function order()
    {
        if (auth()->check()) {
            return view('seller.orders');
        }
        return response()->json(['error' => 'Authentication Required'], 401);
    }

    public function showSignupForm(Request $request)
    {
        $email = $request->query('email');
        $showModal = $request->query('modal') === 'true'; 
        return view('seller.signup', compact('email', 'showModal'));
    }
}
