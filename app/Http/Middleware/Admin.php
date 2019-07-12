<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == 2 && Auth::user()->is_delete == 0) {
                return $next($request);
            }

            Auth::logout();
        }

        return redirect('/admin/login');
    }
}
