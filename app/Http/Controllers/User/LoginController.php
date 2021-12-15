<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    
    public function create(){

        return view ('login');
    }

    public function authenticate (Request $request){


        $request -> validate([

            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $request['token'] = Hash::make($request->password);

        $credentials = $request -> validate([

            'email' => ['required', 'email'],
            'password' => ['required'],
           
        ]);

  
    

        if(Auth::attempt($credentials, $request->remember_me)){

                $request -> session() -> regenerate();

                if(Hash::check( auth()->user()->barcode_number, auth()->user()->token))
                {
                    return redirect()-> intended('user_space') ->with('success', 'Vous êtes connecté ');

                }

                Auth::logout();

                $request->session()->invalidate();
        
                $request->session()->regenerateToken();
                
                return redirect()->back() -> with("error", "Compte non validé");

           
        }

        return redirect()->back()->with("error", "Mot de passe ou email incorrecte");

    }

}
