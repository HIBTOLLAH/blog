<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next ,$guard=null)
    {
     if (Auth::guard($guard)->check()){
        $user=Auth::user();
        if($user->role=='admin' or $user->role=='editor'){
            return $next($request);
        }
     }
     return redirect('/login');
    }

}
