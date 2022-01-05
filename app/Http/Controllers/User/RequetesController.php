<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\RequetesPlainte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequetesController extends Controller
{
   


    public function index()
    {
        $requetes = RequetesPlainte::where("type", "=", "requete") ->orderBy('id', 'asc') ->get();

        return view ("requetes.index", compact("requetes"));
    }




    public function filter_requetes_statut(Request $request)
    {
        $statut_requete = request()->input('statut');
        $requetes = RequetesPlainte:: where("type", "requete")->where("statut" , $statut_requete)->orderBy('id', 'asc')->get();

        return view ("requetes.add_filter", compact("requetes", "statut_requete"));
    }


   
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

