<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\registerUserRequest;
use App\Models\clients;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;

class signInController extends Controller
{
    public function create () {

        return view('register');
    }

    public function register (registerUserRequest $request) {

        function generateBarcodeNumber() {
            $number = mt_rand(10000000, 9999999999); // better than rand()
        
            // call the same function if the barcode exists already
            if (barcodeNumberExists($number)) {
                return generateBarcodeNumber();
            }
        
            // otherwise, it's valid and can be used
            return $number;
        }
        
        function barcodeNumberExists($number) {
            // query the database and return a boolean
            // for instance, it might look like this in Laravel
            return User::whereBarcodeNumber($number)->exists();
        }
        $code = generateBarcodeNumber();
         
   /*  dd($request); */

      $user =  User::create([

            "name" =>$request->name,
            "prenom" => $request->prenoms,
            "contact" =>$request->contact,
            "pays" => $request->pays,
            "ville" => $request->ville,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "email_verified_at" => now(),
            "type" => $request->type,
            "statut_activite" =>$request->statut,
            'barcode_number' =>$code,
        

        ]);

     /*    event(new Registered($user)); */

        return redirect()->route("login");

    }
}
