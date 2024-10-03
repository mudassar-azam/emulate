<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'seller' || $user->role === 'admin') {
            return redirect()->route('seller.front');
        } elseif ($user->role === 'buyer') {
            return redirect()->route('buyer.front');
        }
    }
}

