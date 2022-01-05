<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Events\PlainteStatutUpdatedEvent;
use App\Models\RequetesPlainte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaintesController extends Controller
{
  

    public function index()
    {
    

        $plaintes = RequetesPlainte::where("type", "=", "plainte") ->orderBy('id', 'asc') ->get();

        return view ("plaintes.index", compact("plaintes"));
    }




    public function filter_plaintes_statut(Request $request)
    {   

        $statut_plainte = $request ->statut;
        $plaintes = RequetesPlainte::where("type", "=", "plainte") ->where("statut" ,"=", $statut_plainte) ->orderBy('id', 'asc') ->get();

        return view ("plaintes.add_filter", compact("plaintes", "statut_plainte"));
    }





    public function update(Request $request, $id)
    {   
        $request->validate([
            "statut" =>"required",
        ]);

        $plainte = RequetesPlainte::where("id", '=', $id)->first();

        $plainte -> update([
            "statut" => $request->statut,
        ]);

        $event = new PlainteStatutUpdatedEvent($plainte);

        event($event);
 

        return redirect()->back();
    }


}
