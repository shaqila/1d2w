<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Peserta
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
        if ($request->user()->role == "admin") {
            return redirect('/dashboard');
        } else {
            return $next($request);
        }
    }
}
