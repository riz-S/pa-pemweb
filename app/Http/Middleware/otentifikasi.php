<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class otentifikasi
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
        $input = $request->session()->all();
        dd($input);
        
        if (auth()->attempt(['username'=])){
            return $next($request);
        }
        return redirect('dashboard')->with('error',"Anda tidak dapat mengakses halaman");
    }
}
