<?php

namespace App\Http\Controllers;

use App\Models\clients;
use App\Models\type_client;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class clientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = User::get();

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
        function generateBarcodeNumber() {
            $number = mt_rand(10000000, 9999999999); // better than rand()
        
            // call the same function if the barcode exists already
            if (barcodeNumberExists($number)) {
                return generateBarcodeNumber();
            }
        
            // otherwise, it's valid and can be used
            return $number;
        }
        
        function barcodeNumberExists($number) {
            // query the database and return a boolean
            // for instance, it might look like this in Laravel
            return User::whereBarcodeNumber($number)->exists();
        }
        $code = generateBarcodeNumber();
        
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

        User::create([
            "name" =>$request->firstname,
            "prenom" => $request->prenom,
            "contact" =>$request->contact,
            "pays" => $request->pays,
            "ville" => $request->ville,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "email_verified_at" => now(),
            "type" => $request->type,
            "statut_activite" =>$request->statut,
            'barcode_number' =>$code,
        ]);
        
        return redirect() -> route('clients.index') -> with('success', 'client added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $client)
    {
        return view("clients.show", compact('client'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $client)
    {
        $statut = "";
        $statut_value = $client->statut_activite;
        return view("clients.edit", compact("client", "statut", "statut_value"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $client)
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
            
            
    ]);

    $client->update([
        
        "name" =>$request->firstname,
        "prenom" => $request->prenom,
        "email" => $request->email,
        "password" => $request->password,
        "pays" => $request->pays,
        "ville" => $request->ville,
        "contact" =>$request->contact,
        "type" => $request->type,
    ]);





    return redirect() -> route('clients.index') -> with('success', 'client updated successfully');

    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function statuts_index()
    {
        $clients = User::get();

    return view ('clients.statuts', compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showForchangeStatut (User $client)
    {

    return view ('clients.changeStatut', compact('client'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatut( Request $request, User $client)
    {
       

        $request->validate ([

            "statut" => ["required"],

    ]);


    $client->update([
        
        "statut_activite" => $request->statut,
    ]);

    return redirect() -> route('clients.statuts') -> with('success', 'statut updated successfully');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showForDeletion(User $client)
    {
        $statut_value = $client->statut_activite;

        return view ('clients.delete', compact('client', "statut_value"));
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $client)
    {
        $client->delete();

        return redirect()->route('clients.index')
            ->with('success', 'Client deleted successfully');
    }
}
