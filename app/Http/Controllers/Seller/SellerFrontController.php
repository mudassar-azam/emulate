<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller\Item;
use App\Models\Seller\Post;
use App\Models\User;
use App\Models\Category;

class SellerFrontController extends Controller
{
    public function index(){
        // later we will use auth id of logged in user
        $user = User::where('id' , 3)->first();
        $items = Item::all();
        $posts = Post::all();
        $categories = Category::all();
        return view('seller.index',compact('user','items','categories','posts'));
    }


    public function dashboard(){
        return view('seller.dashboard');
    }

    public function showSignupForm(Request $request)
    {
        $email = $request->query('email');
        $showModal = $request->query('modal') === 'true'; // Check if the modal should be shown
        return view('seller.signup', compact('email', 'showModal'));
    }
}
