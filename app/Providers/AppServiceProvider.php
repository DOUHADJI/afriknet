<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL as FacadesURL;
use Illuminate\Support\ServiceProvider;
use App\Models\RequetesPlainte;
  use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       if( env('APP_ENV') !== 'local' ) {

           FacadesURL::forceScheme('https') ;
       }
       
        $new_plaintes = RequetesPlainte::where('statut', 'reçu') ->where('type', 'plainte') ->orderBy('id', 'desc')->get() -> take(3);

        $new_requetes = RequetesPlainte::where('statut', 'reçu') ->where('type', 'requete') ->orderBy('id', 'desc')->get() -> take(3);

        $users= User::get();

        $inactive_users =  DB::table('users')
                         ->where("statut_activite", "=", 0)
                         ->join("activation_requests", "users.id", "=",  "activation_requests.user_id")
                         -> where("request_statut", "=", 0)
                         ->select('users.*')
                         ->get();
        
        View::share("new_plaintes", $new_plaintes);
        View::share("new_requetes", $new_requetes);
        View::share("users", $users);
        View::share("inactive_users", $inactive_users);
        

    }
}
 