<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function construct(){
        $this->middleware('auth');
    }
    public function index(){
        return view('dashboard');
    }
    public function adminhome(){
        return view('index');
    }
}
