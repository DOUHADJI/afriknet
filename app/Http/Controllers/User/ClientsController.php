<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\activation_requests;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClientsController extends Controller
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
        $abonnements = DB::table('liste_des_abonnements')
                                                    ->where('user_id', $client->id)
                                                    ->join('abonnements', 'liste_des_abonnements.abonnement_id',  'abonnements.id')
                                                    ->select('liste_des_abonnements.*', 'abonnements.*')
                                                    ->get();

        $forfaits = DB::table('liste_des_forfaits')
                                                    ->where('user_id', $client->id)
                                                    ->join('forfaits', 'liste_des_forfaits.forfait_id',  'forfaits.id')
                                                    ->select('liste_des_forfaits.*', 'forfaits.*')
                                                    ->get();

      /*   dd($abonnements); */

        return view("clients.show", compact('client', 'abonnements', 'forfaits'));
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

       return redirect() -> route("clients.statuts") -> with('success', 'statut updated successfully');

    }


    public function activate_account_show()
    {
        $clients = DB::table('users')
                         ->where("statut_activite", "=", 0)
                         ->join("activation_requests", "users.id", "=",  "activation_requests.user_id")
                         -> where("request_statut", "=", 0)
                         ->select('users.*')
                         ->get();
                         


        return view ('clients.activate_account', compact('clients'));
    }

    public function activate_account( Request $request)
    {
       
    

    $client = User::where("id", "=", $request->user_id) ->first();

    $activation_request = activation_requests::where("user_id", "=", $request->user_id)->where("request_statut", "=", 0)->first();

   /*  dd($client); */

    $client->update([
        
        "statut_activite" => $request->statut,
    ]);

    $activation_request->update([
        "request_statut" => $request->statut,
    ]);

    return redirect() -> route('clients.activate_account_show') -> with('success', "Client  $client->barcode_number activated ");

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

