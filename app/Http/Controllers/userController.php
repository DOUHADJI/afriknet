<?php

namespace App\Http\Controllers;

use App\Models\abonnements;
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

class userController extends Controller
{
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

      $plainte_courante = requetes_plaintes::where("user_id", "=", auth()->user()->id)->orderBy("created_at", "desc") -> first();

/* dd($last_souscription); */


        return view ('user.index', compact('client', 'souscriptions', 'last_souscription', 'last_forfait' , 'plainte_courante'));
    }


    public function writte_us(){
        
    
        return view('user.writte_us');
    }


    public function faq(){

        return view ('user.faq');
    }




    public function modifier_infos(User $user){

        $client = DB::table("users") -> where ("email", "=", auth()->user()->email)->first();
        
        return view('user.modifier_infos', compact('client','user'));
    }






    public function scrire_forfait (){

        $forfait = forfaits::inRandomOrder()->first();

        liste_des_forfaits::create([

                    "souscri_le" => now(),
                    "fini_le" => now() ->addDays($forfait->validite),
                    "forfait_id"=> $forfait->id,
                    "user_id" => Auth::user()->id,

        ]);

        return redirect() -> back() -> with("success", "Votre souscription au forfait  $forfait->nom   a bien effectuée");
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmPasswordBeforeUpddate($id)
    {
       
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
            "email" => ["required"],
            "password" => ["required"],
            "type" => ["required"],
        ]);




        $user->update([

            "name" => $request -> firstname,
            "prenom" => $request -> prenom,
            "pays" => $request -> pays,
            "ville" => $request -> ville,
            "contact" => $request -> contact,
            "email" => $request -> email,
            "password" => $request -> password,
            "type" => $request -> type,
            "email_verified_at" => now(),

        ]);


       

        

        return redirect() -> route('user.index')->with("success", "Informations updated successfully");
        
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
