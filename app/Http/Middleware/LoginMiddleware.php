<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class LoginMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('website.dologin');
        } else {
            $user = Auth::user();
            if ($user->roles != "admin") {
                return redirect()->route('site.home');
            }
        }
        return $next($request);
    }
}
