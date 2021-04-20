<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
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
        
        if ($request->user()->level == "peserta") {
            return redirect('/peserta/dashboard');
        } else {
            return $next($request);
        }
    }
    // public function handle(Request $request, Closure $next)
    // {
    //     if(Auth::user()->role != "user"){
    //         /* 
    //         silahkan modifikasi pada bagian ini
    //         apa yang ingin kamu lakukan jika rolenya tidak sesuai
    //         */
    //         return redirect()->to('logout');
    //     }
    //     return $next($request);
    // }
}
