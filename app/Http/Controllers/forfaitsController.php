<?php

namespace App\Http\Controllers;

use App\Models\forfaits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class forfaitsController extends Controller
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
        $forfaits = forfaits::get();

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
        ]);

        /* dd($request); */

        forfaits::create([

                "nom" => $request->name,
                "volume" => $request->volume,
                "validite" => $request ->validite

        ]);

        return redirect() -> route('forfaits.index') -> with('success', 'forfaits created successfully');
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showForDelete()
    {
        $forfaits = forfaits::get();
        
        return view("forfaits.delete", compact("forfaits"));
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
    public function destroy(forfaits $forfait)
    {
        

        $forfait -> delete();

        return redirect() -> route('forfaits.showForDelete') -> with('success', 'forfaits deleted successfully');

    }
}

