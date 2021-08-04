<?php

namespace App\Http\Controllers\Auth;

use App\Models\DataDiri;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();
        
        $request->session()->regenerate();
        $value = DataDiri::where('userId',$request->userId)->get()[0];
        $request->session()->push('nama', $value->nama);
        $request->session()->push('foto', $value->foto);
        $request->session()->push('sessioninfo', $request->all());
        $curenttime = Carbon::now()->toDateTimeString();
        $request->session()->push('sessiontime', $curenttime);
        // ($request->session()->all());
        // return redirect()->intended(RouteServiceProvider::HOME);
        return redirect()->route('index.anggota');
        //return view('auth.dashboard');
        //return redirect()->intended(RouteServiceProvider::HOME);

    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        // dd($request);
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    /**public function login(Request $request){

        $input = $request->all
        $this->validate($request)
    }**/
}
