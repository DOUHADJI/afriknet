<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\abonnements;


class AbonnementsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abonnements = abonnements::get();
        
        return view("abonnements.index", compact('abonnements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ("abonnements.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([

                "name" => ["required"],
                "volume"=> ["required"],
                "validite"=> ["required"],
        ]);

        /* dd($request); */

        abonnements::create([

                "nom" => $request->name,
                "volume" => $request->volume,
                "validite" => $request ->validite

        ]);

        return redirect() -> route('abonnements.index') -> with('success', 'Abonnements created successfully');
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showForDelete()
    {
        $abonnements = abonnements::get();
        
        return view("abonnements.delete", compact("abonnements"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(abonnements $abonnement)
    {
       
       /*  dd($abonnement); */

        $abonnement -> delete();

        return redirect() -> route('abonnements.showForDelete') -> with('success', 'Abonnements deleted successfully');

    }

}
