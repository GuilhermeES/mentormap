<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(auth()->user()->admin){
            return $next($request);
        }

        return redirect()->back()->with('unauthorised', 'You are unauthorised to access this page');
    }
}
