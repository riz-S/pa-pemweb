<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use \Illuminate\Http\Request;
use Closure;
use App\Models\DataDiri;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return string|null
     */
    public function handle(Request $request, Closure $next){
        if (! $request->session()->has('sessioninfo')) {
            return redirect()->route('dilarang');
        }
        $infoUser = DataDiri::where('userId',session()->get('sessioninfo')[0]['userId'])->get()[0];
        if(!in_array($infoUser->nama,session()->get('nama')))session()->push('nama',$infoUser->nama);
        if(!in_array($infoUser->foto,session()->get('foto')))session()->push('foto',$infoUser->foto);
        return $next($request);
        
    }
    protected function redirectTo(Request $request)
    {
        if (! $request->session()->has('sessioninfo')) {
            return route('login');
        }
    }
}
