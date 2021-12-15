<?php

namespace App\Http\Controllers;

use App\Events\PlainteStatutUpdatedEvent;
use App\Mail\registerMail;
use App\Models\abonnements;
use App\Models\activation_requests;
use App\Models\clients;
use App\Models\forfaits;
use App\Models\liste_des_abonnements;
use App\Models\liste_des_forfaits;
use App\Models\requetes_plaintes;
use App\Models\User;
use Database\Factories\abonnementsFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;



class userController extends Controller
{


  /*   public function __construct()
    {

        PlainteStatutUpdatedEvent::dispatch();
      
    } */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = DB::table("users") -> where ("email", "=", auth()->user()->email)->first();



        $souscriptions = DB::table('users')
            -> where ("user_id", "=", $client->id)
            ->join('liste_des_abonnements', 'users.id', '=', 'liste_des_abonnements.user_id')
          /*   ->join('liste_des_forfaits', 'users.id', '=', 'liste_des_forfaits.user_id') */
            ->join('abonnements', 'abonnements.id', '=', 'liste_des_abonnements.abonnement_id')
           /*  ->join('forfaits', 'forfaits.id', '=', 'liste_des_forfaits.forfait_id') */
            ->select('users.*', 'liste_des_abonnements.*','abonnements.*',/*  'liste_des_forfaits.*', 'forfaits.*' */ )
            ->get();

         $last_souscription = DB::table('liste_des_abonnements')
                                                ->where("fini_le", ">", now())
                                                -> where ("user_id", "=", auth()->user()->id)
                                                ->join('abonnements', 'abonnements.id', '=', 'liste_des_abonnements.abonnement_id')
                                               ->select('liste_des_abonnements.*','abonnements.*')
                                                /* -> orderBy("updated_at", "asc") */ ->first();
                                                
   $last_forfait = DB::table('liste_des_forfaits')
                                                ->where("fini_le", ">", now())
                                                -> where ("user_id", "=", auth()->user()->id)
                                                ->join('forfaits', 'forfaits.id', '=', 'liste_des_forfaits.forfait_id')
                                               ->select('liste_des_forfaits.*','forfaits.*')
                                                /* -> orderBy("updated_at", "asc") */ ->first();


      $request_existance = activation_requests::where('user_id', '=', Auth::user()->id)->where("request_statut", "=", 0)->orderBy("created_at", "desc") ->first();

      $plainte_courante = requetes_plaintes::where("user_id", "=", auth()->user()->id)->where("type", "=", "plainte")->orderBy("created_at", "desc") -> first();




        return view ('user.index', compact('client', 'souscriptions', 'last_souscription', 'last_forfait' , 'plainte_courante', 'request_existance'));
    }



    public function activation_request() {

        $request_existance = activation_requests::where('user_id', '=', Auth::user()->id)->where("request_statut", "=", 0)->orderBy("created_at", "desc") ->first();
       
        /* dd($request_existance); */

        if ( $request_existance !=null )

        {
            $request_existance->delete();

            return redirect()->route('user.index') -> with("success", "Votre demande d'activation de compte a été annulée");
        }
        else
        {
            activation_requests::create([

                "user_id" => Auth::user()->id,
                "request_statut" => 0,
            ]);

        return redirect()->route('user.index') -> with("success", "Votre demande a été prise en compte. Votre compte sera bientôt activé");

            
        }       

    }


    public function writte_us(){
        
    
        return view('user.writte_us');
    }


    public function faq(){

        return view ('user.faq');
    }




    public function modifier_infos(){

        $user = Auth::user();
        
        return view('user.modifier_infos', compact('user'));
    }






    public function scrire_forfait (){

        $forfait = forfaits::inRandomOrder()->first();

        liste_des_forfaits::create([

                    "souscri_le" => now(),
                    "fini_le" => now() ->addDays($forfait->validite),
                    "forfait_id"=> $forfait->id,
                    "user_id" => Auth::user()->id,

        ]);

        return redirect() -> back() -> with("success", "Votre souscription au forfait  $forfait->nom a été bien effectuée");
    }


    public function scrire_abonnement (){

        $abonnement = abonnements::inRandomOrder()->first();

        liste_des_abonnements::create([

                    "souscri_le" => now(),
                    "fini_le" => now() ->addDays($abonnement->validite),
                    "abonnement_id"=> $abonnement->id,
                    "user_id" => Auth::user()->id,

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

        requetes_plaintes::create([

            "type" => $request -> type,
            "motif" => $request->motif,
            "message"=> $request -> message,
             "statut" => "reçu",
             "user_id" => Auth::user()-> id

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

        requetes_plaintes::create([

            "type" => $request -> type,
            "motif" => $request->motif,
            "message"=> $request -> message,
             "statut" => "reçu",
             "user_id" => Auth::user()-> id

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

        

        if(Auth::attempt($credentials)) {
           
            if(auth()->user()->id === $user->id && !is_null(auth()->user()->token)){
                
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

        $user = Auth::user();
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



        if(Auth::attempt($credentials)){
            
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
