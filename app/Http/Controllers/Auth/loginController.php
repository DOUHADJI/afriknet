<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class loginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:client')->except('logout');
    }


    public function create(){

        return view ('login');
    }

    public function authenticate (Request $request){


        $request -> validate([

            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $credentials = $request -> validate([

            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

     

        if(Auth::attempt($credentials)){
            $request -> session() -> regenerate();

            return redirect()-> intended('user_space') ->with('success', 'You are logged in successfully');
        }

        return redirect()->back()->with("error", "Mot de passe ou email incorrecte");

    }


  


}
