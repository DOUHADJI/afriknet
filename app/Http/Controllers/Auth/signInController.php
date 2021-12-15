<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\registerUserRequest;
use App\Mail\registerMail;
use App\Models\clients;
use App\Models\User;
use App\Notifications\userRegisteredNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class SignInController extends Controller
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
        

        $token = Str::random(50);

      $user =  User::create([

            "name" =>$request->name,
            "prenom" => $request->prenoms,
            "contact" =>$request->contact,
            "pays" => $request->pays,
            "ville" => $request->ville,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "email_verified_at" =>null,
            "type" => $request->type,
            "statut_activite" =>$request->statut,
            'barcode_number' =>$code,
            'token' => $token,
         

        ]);

    /*     dd($user); */

      Mail::to($user)->send(new registerMail($user));

        return view("verify_email", compact('user'));

    }

    public function confirm_account (User $user , $token) {

        $user -> update([
            "email_verified_at" =>now(),
            "token" => Hash::make($user->barcode_number)
        ]);

        $user->notify(new userRegisteredNotification($user));

            return view('confirmed_email');
    }
}
