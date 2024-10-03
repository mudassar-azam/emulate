<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            $redirectRoute = ($user->role === 'seller' || $user->role === 'admin') ? route('seller.front') : route('buyer.front');

            return response()->json(['redirect' => $redirectRoute]);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }
}
