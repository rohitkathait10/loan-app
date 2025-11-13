<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
     public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if(Auth::user()->role == 0)
            {
                return redirect()->route('user.dashboard');
            }elseif(Auth::user()->role == 2){
                return redirect()->route('agent.dashboard');
            }else{
                return redirect()->route('admin.dashboard');
            }
        }

        return $next($request);
    }
}
