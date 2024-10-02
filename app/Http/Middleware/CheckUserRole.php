<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && (Auth::user()->role === 'seller' || Auth::user()->role === 'admin')) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Unauthorized access.');
    }
}
