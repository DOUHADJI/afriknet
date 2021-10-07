<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    
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

            return redirect()-> route('user.index');
        }

        return redirect()->back()->with("error", "Mot de passe ou email incorrecte");

    }
}
