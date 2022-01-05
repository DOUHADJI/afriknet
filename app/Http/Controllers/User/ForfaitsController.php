<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Forfait;
use App\Models\forfaits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ForfaitsController extends Controller
{
  

    public function index()
    {
        $forfaits = Forfait::get();

        return view("forfaits.index", compact('forfaits'));
    }





    public function create()
    {
        return view ("forfaits.create");
    }

    



    public function store(Request $request)
    {
        $request -> validate([

                "name" => ["required"],
                "volume"=> ["required"],
                "validite"=> ["required"],
                "price" => ["required"]
        ]);

        Forfait::create([

                "nom" => $request->name,
                "volume" => $request->volume,
                "validite" => $request ->validite,
                "price" => $request->price
 
        ]);

        return redirect() -> route('forfaits.index') -> with('success', 'forfaits created successfully');
    }






    public function showForDelete()
    {
        $forfaits = Forfait::get();
        
        return view("forfaits.delete", compact("forfaits"));
    }
 





    public function destroy(Forfait $forfait)
    {
        $forfait -> delete();

        return redirect() -> route('forfaits.showForDelete') -> with('success', 'forfaits deleted successfully');

    }
}


