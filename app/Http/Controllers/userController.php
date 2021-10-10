<?php

namespace App\Http\Controllers;

use App\Models\abonnements;
use App\Models\clients;
use App\Models\forfaits;
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
        $client = DB::table("clients") -> where ("email", "=", auth()->user()->email)->first();

        return view ('user.index', compact('client'));
    }


    public function writte_us(){
        
    
        return view('user.writte_us');
    }


    public function faq(){

        return view ('user.faq');
    }

    public function modifier_infos(){

        $client = DB::table("clients") -> where ("email", "=", auth()->user()->email)->first();
        
        return view('user.modifier_infos', compact('client'));
    }


    public function scrire_forfaitShow (){

        $forfaits = forfaits::get();
      

        return view("user.souscrire.scrire_forfait", compact('forfaits'));
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
    public function update(Request $request)
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

        $client = DB::table("clients") -> where ("email", "=", auth()->user()->email)->first();

        $user =  Auth::user();

       
        $user->name = $request->firstname;
        $user-> email = $request -> email;
        $user -> password = $request -> password;

       /*  $user->save(); */

     dd($user);


       /*  $client->update([

            "name" => $request -> firstname,
            "prenom" => $request -> prenom,
            "pays" => $request -> pays,
            "ville" => $request -> ville,
            "contact" => $request -> contact,
            "email" => $request -> email,
            "password" => $request -> password,
            "type" => $request -> type,

        ]); */


       

        

        return redirect() -> route('user.index');
        
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
