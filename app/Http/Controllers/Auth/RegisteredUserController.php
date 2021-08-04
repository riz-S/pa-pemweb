<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'=> 'required|alpha_num|unique:users,userId',
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|string|confirmed|min:8',
            'noTelp' => 'required|numeric',
            'domisili' => 'required|string|max:255',
            'agree' =>'accepted'
        ]);

        DB::table('users')->insert([
            'userId' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        DB::table('datadiri')->insert(
            ['nama'=>$request->nama,'fakultas'=>$request->fakultas,'email'=>$request->email,'noTelp'=>$request->noTelp,'jenisKelamin'=>$request->kelamin,'domisili'=>$request->domisili,'userId'=>$request->username]
        );
        //return view('auth.login');
        return redirect()->route('login');
        

        //event(new Registered($user));

        //Auth::login($user);

        //return redirect(RouteServiceProvider::HOME);
        //return view('auth.biodata',['email'=>$request->email]);
    

        //return response()->json($user);
    }

    /**public function regisbiodata(Request $request){
        
        //untuk ngisi biodata diri
        $request->validate([
            'fakultas' => 'required|string|max:255',
            'noTelp' => 'required|string|max:15',
            'jeniskelamin' => 'required|string|max:2',
            'kotaAsal' => 'required|string|max:255',
            //'email' => 'required|string|email|max:255|unique:users'
            
        ]);


        $fakultas = $request->fakultas;
        $noTelp = $request->noTelp;
        $jeniskelamin = $request->jeniskelamin;
        $kotaAsal = $request->kotaAsal;
        $email = $request->email;
        $id_user = User::where('email',$email)->firstOrFail();
        //dd($id_user); 
        DB::table('datadiri')->insert(
            ['fakultas'=>$fakultas,'noTelp'=>$noTelp,'jeniskelamin'=>$jeniskelamin,'kotaAsal'=>$kotaAsal,'user_id'=>$id_user->id]
        );
        return view('auth.login');
        
    }**/
}
