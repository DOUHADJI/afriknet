<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Forfait;
use App\Models\forfaits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ForfaitsController extends Controller
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
        $forfaits = Forfait::get();

        return view("forfaits.index", compact('forfaits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ("forfaits.create");
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
                "price" => ["required"]
        ]);

        /* dd($request); */

        Forfait::create([

                "nom" => $request->name,
                "volume" => $request->volume,
                "validite" => $request ->validite,
                "price" => $request->price
 
        ]);

        return redirect() -> route('forfaits.index') -> with('success', 'forfaits created successfully');
    }

      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showForDelete()
    {
        $forfaits = Forfait::get();
        
        return view("forfaits.delete", compact("forfaits"));
    }
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forfait $forfait)
    {
        

        $forfait -> delete();

        return redirect() -> route('forfaits.showForDelete') -> with('success', 'forfaits deleted successfully');

    }
}


