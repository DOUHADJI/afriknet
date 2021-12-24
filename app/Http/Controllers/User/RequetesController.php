<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RequetesPlainte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequetesController extends Controller
{
   /*  public function __construct()
    {
        $this->middleware('auth:admin');
    } */

        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    

        $requetes = DB::table("requetes_plaintes")
        ->where("type", "=", "requete")
        ->orderBy('id', 'asc')
        ->get();

        return view ("requetes.index", compact("requetes"));
    }


      /**
     * Display a listing of the resource.
     * 
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function filter_requetes_statut(Request $request)
    {
       

        $statut_requete = request()->input('statut');

      /*   dd($statut_requete); */

        $requetes = DB::table("requetes_plaintes")
        ->where("type", "=", "requete")
        ->where("statut" ,"=", $statut_requete)
        ->orderBy('id', 'asc')
        ->get();

      /*   $requetes = requetes_requetes::when($statut_requete, function($query) use ($statut_requete) {
                $query->where("statut", $statut_requete);
        } )->get(); */


          return view ("requetes.add_filter", compact("requetes", "statut_requete"));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      
        
        $request->validate([
            "statut" =>"required",
        ]);

        $requete = RequetesPlainte::where("id", '=', $id)->first();

        $requete -> update([
            "statut" => $request->statut,
        ]);

 

        return redirect()->back();
    }


}

