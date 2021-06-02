<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->banned) {
            $message = 'Your account has been banned permanently.';
            Auth::logout();
           
            return redirect()->route('login')->withErrors([$message]);
        }

        return $next($request);
    }
}
