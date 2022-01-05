<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Abonnement;
use App\Models\Forfait;
use App\Models\User;
use Carbon\Carbon;


class DashboardController extends Controller
{
  

    public function index()
    {
        $abonnements = Abonnement::get();
        $forfaits = Forfait::get();
        $clients = User::get();

 

        $clients_array = User::get()->groupBy(function($val){
            return Carbon::parse($val->created_at)->format('M');
        }) -> toArray();

        $months = User:: select('created_at') ->get();

        return view('dashboard.index', compact('abonnements', 'forfaits', 'clients' ));

    }




    public function new_plaintes ()
    {
        return redirect()->route('plaintes.filter_statut', ['statut' => 'reçu']);
    }





    public function new_requetes ()
    {
        return redirect()->route('requetes.filter_statut', ['statut' => 'reçu']);
    }



}

