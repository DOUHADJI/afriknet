<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Abonnement;


class AbonnementsController extends Controller
{
    
    
    public function index()
    {
        $abonnements = Abonnement::get();
        
        return view("abonnements.index", compact('abonnements'));
    }


    


    public function create()
    {
        return view ("abonnements.create");
    }

   
    



    public function store(Request $request)
    {
        $request -> validate([

                "name" => ["required"],
                "debit"=> ["required"],
                "validite"=> ["required"],
                "price" => ["required"]

        ]);

        Abonnement::create([

                "nom" => $request->name,
                "debit" => $request->debit,
                "validite" => $request ->validite,
                "price" => $request->price

        ]);

        return redirect() -> route('abonnements.index') -> with('success', 'Abonnements created successfully');
    }

      
    


    public function showForDelete()
    {
        $abonnements = Abonnement::get();
        
        return view("abonnements.delete", compact("abonnements"));
    }

 
    



    public function destroy(Abonnement $abonnement)
    {
        $abonnement -> delete();

        return redirect() -> route('abonnements.showForDelete') -> with('success', 'Abonnements deleted successfully');
        
    }

}
