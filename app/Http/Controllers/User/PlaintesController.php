<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Events\PlainteStatutUpdatedEvent;
use App\Models\RequetesPlainte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaintesController extends Controller
{
   /*  public function __construct()
    {
        $this->middleware('auth:admin');
    }
 */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    

        $plaintes = DB::table("requetes_plaintes")
        ->where("type", "=", "plainte")
        ->orderBy('id', 'asc')
        ->get();

      



        return view ("plaintes.index", compact("plaintes"));
    }


      /**
     * Display a listing of the resource.
     * 
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function filter_plaintes_statut(Request $request)
    {
       

        $statut_plainte = request()->input('statut');

      /*   dd($statut_plainte); */

        $plaintes = DB::table("requetes_plaintes")
        ->where("type", "=", "plainte")
        ->where("statut" ,"=", $statut_plainte)
        ->orderBy('id', 'asc')
        ->get();

      /*   $plaintes = requetes_plaintes::when($statut_plainte, function($query) use ($statut_plainte) {
                $query->where("statut", $statut_plainte);
        } )->get(); */


          return view ("plaintes.add_filter", compact("plaintes", "statut_plainte"));
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
