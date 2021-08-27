<?php

namespace App\Http\Controllers;

use App\Models\clients;
use App\Models\type_client;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class clientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = clients::get();

        return view ('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
      
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $request->validate ([
                "firstname" =>["required"],
                "prenom" => ["required"],
                "contact" => ["required"],
                "pays" => ["required"],
                "ville" => ["required"],
                "email" => ["required"],
                "password" => ["required"],
                "type" => ["required"],
                "statut"=> ["required"]
                
        ]);

        clients::create([
            "name" =>$request->firstname,
            "prenom" => $request->prenom,
            "contact" =>$request->contact,
            "pays" => $request->pays,
            "ville" => $request->ville,
            "email" => $request->email,
            "password" => $request->password,
            "type" => $request->type,
            "statut_activite" =>$request->statut,
        ]);
        
        return redirect() -> route('clients.index') -> with('success', 'client added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(clients $client)
    {
        return view("clients.show", compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(clients $client)
    {
        
        return view("clients.edit", compact("client"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, clients $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(clients $clients)
    {
        //
    }
}
