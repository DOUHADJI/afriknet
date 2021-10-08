<?php

namespace App\Http\Controllers;

use App\Models\clients;
use App\Models\requetes_plaintes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class requetesController extends Controller
{
        
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
    public function edit($id)
    {
        //
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

        $requete = requetes_plaintes::where("id", '=', $id)->first();

        $requete -> update([
            "statut" => $request->statut,
        ]);

 

        return redirect()->back();
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
