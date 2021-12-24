<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Abonnement;
use App\Models\Forfait;
use App\Models\RequetesPlainte;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
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
        $abonnements = Abonnement::get();
        $forfaits = Forfait::get();
        $clients = User::get();

 

        $clients_array = User::get()->groupBy(function($val){
            return Carbon::parse($val->created_at)->format('M');
        }) -> toArray();

        $months = DB::table('users') -> select('created_at') ->get();

        $new_plaintes = RequetesPlainte::where('statut', 'reçu') ->where('type', 'plainte') ->orderBy('id', 'desc')->get() -> take(3);

        $new_requetes = RequetesPlainte::where('statut', 'reçu') ->where('type', 'requete') ->orderBy('id', 'desc')->get() -> take(3);

        $users= User::get();

  $inactive_users =  DB::table('users')
                         ->where("statut_activite", "=", 0)
                         ->join("activation_requests", "users.id", "=",  "activation_requests.user_id")
                         -> where("request_statut", "=", 0)
                         ->select('users.*')
                         ->get();

      /*   dd($clients_array, $months); */
        
        return view('dashboard.index', compact(

            'abonnements', 
            'forfaits',  
            'clients' ,
            'new_plaintes' ,
            'new_requetes',
            'users',
            'inactive_users'

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

}

