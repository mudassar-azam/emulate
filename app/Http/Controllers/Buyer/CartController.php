<?php

namespace App\Http\Controllers\Buyer;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buyer\Cart;

class CartController extends Controller
{

    public function getCartItems()
    {
        $user_id = Auth::user()->id;
        $cartItems = Cart::with('product.itemImages')->where('user_id', $user_id)->get();
        return response()->json($cartItems);
    }


    public function store(Request $request)
    {
        $product_id = $request->product_id;
        $user_id = Auth::user()->id;
    
        $cart = Cart::where('user_id', $user_id)->where('product_id', $product_id)->first();
    
        if ($cart) {
            return response()->json(['status' => 'exists', 'message' => 'Product is already in your cart!']);
        } else {
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id
            ]);
            $cartItems = Cart::with(['product.itemImages' => function($query) {
                $query->orderBy('id')->limit(1);
            }])->where('user_id', $user_id)->get();
    
            return response()->json(['status' => 'added', 'message' => 'Product added to cart successfully!', 'cart_items' => $cartItems]);
        }
    }    

    public function remove($id)
    {
        $user_id = Auth::user()->id;
        $cartItem = Cart::where('id', $id)->where('user_id', $user_id)->first();

        if ($cartItem) {
            $cartItem->delete();
            return response()->json(['status' => 'removed', 'message' => 'Product removed from cart!']);
        }

        return response()->json(['status' => 'error', 'message' => 'Item not found in cart!']);
    }

}
