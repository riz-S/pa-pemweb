<?php

namespace App\Http\Controllers\Auth;



use Illuminate\Http\Request;



class LoginController extends Controller
{
    public function masuk(Request $request){
        dd($request->all());
    }
}
