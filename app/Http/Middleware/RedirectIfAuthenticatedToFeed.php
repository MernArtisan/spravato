<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedToFeed
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            return redirect()->route('feed'); 
        }
        return $next($request); 
    }
}
