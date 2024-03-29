<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\registerMail;
use App\Models\Abonnement;
use App\Models\ActivationRequest;
use App\Models\Forfait;
use App\Models\ListeDesAbonnement;
use App\Models\ListeDesForfait;
use App\Models\RequetesPlainte;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{


    public function index()
    {
        $client =User::where ("email", Auth::user()->email)->first();


        $souscriptions =User::where ("user_id", $client->id)
                                            ->join('liste_des_abonnements', 'users.id', '=', 'liste_des_abonnements.user_id')
                                            ->join('abonnements', 'abonnements.id', '=', 'liste_des_abonnements.abonnement_id')
                                            ->select('users.*', 'liste_des_abonnements.*','abonnements.*' )
                                            ->get();

           

        $last_souscription = ListeDesAbonnement::where("fini_le", ">", now())
                                                -> where ("user_id", "=", Auth::user()->id)
                                                ->join('abonnements', 'abonnements.id', '=', 'liste_des_abonnements.abonnement_id')
                                                ->select('liste_des_abonnements.*','abonnements.*')
                                                ->first();
                                                
        $last_forfait = ListeDesForfait::where("fini_le", ">", now())
                                                -> where ("user_id", "=", Auth::user()->id)
                                                ->join('forfaits', 'forfaits.id', '=', 'liste_des_forfaits.forfait_id')
                                                ->select('liste_des_forfaits.*','forfaits.*')
                                                ->first();


      $request_existance = ActivationRequest::where('user_id', Auth::user()->id)->where("request_statut", "=", 0)->orderBy("created_at", "desc") ->first();

      $plainte_courante = RequetesPlainte::where("user_id", Auth::user()->id)->where("type", "=", "plainte")->orderBy("created_at", "desc") -> first();




        return view ('user.index', compact('client', 'souscriptions', 'last_souscription', 'last_forfait' , 'plainte_courante', 'request_existance'));
    }



    public function activation_request() {

        $request_existance = ActivationRequest::where('user_id', '=',  Auth::user()->id)->where("request_statut", "=", 0)->orderBy("created_at", "desc") ->first();
       

        if ( $request_existance !=null )

        {
            $request_existance->delete();

            return redirect()->route('user.index') -> with("success", "Votre demande d'activation de compte a été annulée");
        }
        else
        {
            ActivationRequest::create([

                "user_id" =>  Auth::user()->id,
                "request_statut" => 0,
            ]);

        return redirect()->route('user.index') -> with("success", "Votre demande a été prise en compte. Votre compte sera bientôt activé");

            
        }       

    }


    public function faq(){

        return view ('user.faq');
    }




    public function modifier_infos(){

        $user =  Auth::user();
        
        return view('user.modifier_infos', compact('user'));
    }






    public function scrire_forfait (){

        $forfait = Forfait::inRandomOrder()->first();

        ListeDesForfait::create([

                    "souscri_le" => now(),
                    "fini_le" => now() ->addDays($forfait->validite),
                    "forfait_id"=> $forfait->id,
                    "user_id" =>  Auth::user()->id,

        ]);

        return redirect() -> back() -> with("success", "Votre souscription au forfait  $forfait->nom a été bien effectuée");
    }


    public function scrire_abonnement (){

        $abonnement = Abonnement::inRandomOrder()->first();

        ListeDesAbonnement::create([

                    "souscri_le" => now(),
                    "fini_le" => now() ->addDays($abonnement->validite),
                    "abonnement_id"=> $abonnement->id,
                    "user_id" =>  Auth::user()->id,

        ]);

        return redirect() -> back() -> with("success", "Votre souscription à l'abonnement  $abonnement->nom   a bien effectuée");
    }



    public function formuler_requete_Show () {

        return view ("user.frml_requete");
    }

    public function formuler_requete (Request $request) {

        $request -> validate([

            "motif" => ["required", "string"],
            "message" => ["required" , "string"],

        ]);

        RequetesPlainte::create([

            "type" => $request -> type,
            "motif" => $request->motif,
            "message"=> $request -> message,
             "statut" => "reçu",
             "user_id" =>  Auth::user()-> id

        ]);

        return redirect() -> route ("user.index") -> with ("success", "Nous avons bien reçu votre requête");


    }


    public function formuler_plainte_Show () {

        return view ("user.frml_plainte");
    }

    public function formuler_plainte (Request $request) {

        $request -> validate([

            "motif" => ["required", "string"],
            "message" => ["required" , "string"],

        ]);

        RequetesPlainte::create([

            "type" => $request -> type,
            "motif" => $request->motif,
            "message"=> $request -> message,
             "statut" => "reçu",
             "user_id" =>  Auth::user()-> id

        ]);

        return redirect() -> route ("user.index") -> with ("success", "Nous avons bien reçu votre plainte. Nos équipe se chargeront de vous satisfaire dans les plus bref délai");


    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $request -> validate([

            "firstname" =>["required"],
            "prenom" => ["required"],
            "contact" => ["required"],
            "pays" => ["required"],
            "ville" => ["required"],
            "password" => ["required"],
            "type" => ["required"],
        ]);

        $credentials = [
            'email' => $user -> email,
            'password' =>$request -> password

        ];

        

        if( Auth::attempt($credentials)) {
           
            if( auth()->user()->id === $user->id && !is_null( auth()->user()->token)){
                
                $user->update([

                    "name" => $request -> firstname,
                    "prenom" => $request -> prenom,
                    "pays" => $request -> pays,
                    "ville" => $request -> ville,
                    "contact" => $request -> contact,
                    "type" => $request -> type,
                ]);
    
                return redirect() -> route('user.index')->with("success", "Informations updated successfully");
            }
           
            return redirect() -> back()->with("error", "Oups!!! Il semblerait que nous ayons rencontré un souci");

            
        } else {

            return redirect() -> back()->with("error", "Mot de passe incorrect. Impossible de modifier vos informations");

        }

        
    }

    public function modifier_identifiants(){

        $user =  Auth::user();
        return view("user.modifier_identifiants" , compact('user') );
    }



    public function update_identifiants (Request $request, User $user) {

     

        $credentials = [
            'email' => $user-> email,
            'password' => $request-> password,
        ];

        $user->update([
            'token' => null,
        ]);



        if( Auth::attempt($credentials)){
            
            if(is_null($request->new_email)){

                if(is_null($request->new_password)){

                    return redirect() -> back()->with('error', "Oups ! Nous avons rencontré un problême. Merci de réessayer !!!");
                }
                else {

                    $request -> validate([

                        'new_password' => ["confirmed", "min:8"],
                        'new_password_confirmation' => ["min:8"],
    
                    ]);

                    if($request->new_password === $request-> new_password_confirmation) {
                        
                        $user->update([
                                "password"=> Hash::make($request->new_password),
                                "token" => Str::random(50),
                                
                        ]);

                         Auth::logout();

                        $request->session()->invalidate();
                
                        $request->session()->regenerateToken();
                        
                        return redirect()->route("login")->with('success', "  Votre mot de passe a été mis à jour avec success");
                            
                    } else{

                        return redirect() -> back()->with('error', "Oups ! Les mots de passe ne correspondent pas. Merci de réessayer !!!");

                    }
                }

               
            } else{

                if(is_null($request->new_password)){

                    $request -> validate([

                        'new_email' => ["email:rfc,dns"],
            
                    ]);

                    $user->update([
                        "email" => $request-> new_email,
                        "token" => Str::random(50),
                    ]);

                     Auth::logout();

                    $request->session()->invalidate();
            
                    $request->session()->regenerateToken();

                    Mail::to($user)->send(new registerMail($user));

                    return view("verify_email", compact('user'));
                }
                else {

                    $request -> validate([

                        'new_email' => ["email:rfc,dns"],
                        'new_password' => ["confirmed", "min:8"],
                        'new_password_confirmation' => ["min:8"],
            
                    ]);

                    if($request->new_password === $request->new_password_confirmation) {
                        
                        $user->update([
                                "email" => $request-> new_email,
                                "password"=> Hash::make($request->new_password),
                                "token" => Str::random(50),
                                

                        ]);

                         Auth::logout();

                        $request->session()->invalidate();
                
                        $request->session()->regenerateToken();

                        Mail::to($user)->send(new registerMail($user));

                        return view("verify_email", compact('user'));
                            
                    } else{

                        return redirect() -> back()->with('error', "Oups ! Les mots de passe ne correspondent pas. Merci de réessayer !!!");

                    }
                }
            }
        }

        return redirect() -> back()->with('error', "Oups ! Mot de passe incorrect. Merci de réessayer !!!");


    }
  

}

