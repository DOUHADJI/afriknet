<?php

namespace App\Http\Controllers;

use App\Models\abonnements;
use App\Models\clients;
use App\Models\forfaits;
use App\Models\requetes_plaintes;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
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
        $abonnements = abonnements::get();
        $forfaits = forfaits::get();
        $clients = User::get();

 

        $clients_array = User::get()->groupBy(function($val){
            return Carbon::parse($val->created_at)->format('M');
        }) -> toArray();

        $months = DB::table('users') -> select('created_at') ->get();

      /*   dd($clients_array, $months); */
        
        return view('dashboard.index', compact(

            'abonnements', 
            'forfaits',  
            'clients'     
        ));
    }


    public function new_plaintes (Request $request)
    {
 
          return redirect()->route('plaintes.filter_statut', ['statut' => 'reçu']);
    }

    public function new_requetes (Request $request)
    {
 
          return redirect()->route('requetes.filter_statut', ['statut' => 'reçu']);
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
        //
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
