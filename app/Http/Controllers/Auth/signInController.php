<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\registerUserRequest;
use App\Models\clients;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class signInController extends Controller
{
    public function create () {

        return view('register');
    }

    public function register (registerUserRequest $request) {

        
        
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "email_verified_at" => now(),
        ]);

        clients::create([
            "name" =>$request->name,
            "prenom" => $request->prenoms,
            "contact" =>$request->contact,
            "pays" => $request->pays,
            "ville" => $request->ville,
            "email" => $request->email,
            "password" => $request->password,
            "type" => $request->type,
            "statut_activite" =>$request->statut,
        ]);

        return redirect()->route("login");

    }
}
