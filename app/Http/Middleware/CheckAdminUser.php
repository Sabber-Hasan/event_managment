<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                //return redirect()->route('admin');
                  return $next($request);
            }
            if (Auth::user()->role === 'merchant') {
                return redirect()->route('merchant');
                 // return $next($request);
            }
        }
        return redirect()->route('dashboard')->with('error', 'You are not authorized to access this page.');
    }
}
