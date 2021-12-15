<?php

use App\Http\Controllers\User\AbonnementsController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminLogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\LogOutController;
use App\Http\Controllers\User\SigninController;
use App\Http\Controllers\User\ClientsController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ForfaitsController;
use App\Http\Controllers\User\PlaintesController;
use App\Http\Controllers\User\RequetesController;
use App\Http\Controllers\User\UserController;
use App\Models\abonnements;
use App\Models\forfaits;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $abonnements = abonnements::get();
    $forfaits = forfaits::get();
    return view('welcome', compact('abonnements', 'forfaits'));
})->middleware('guest', 'guest:admin')->name('welcome');



Route::group(["prefix" => "auth"], function () {
    
    Route::group(["middleware" => ["guest"]], function () {

        Route::get("/signin", [SigninController::class, "create"])->name("register");
        Route::post("/signin", [SigninController::class, "register"]);

        Route::get("/login", [LoginController::class, "create"])->name("login");
        Route::post("/login", [LoginController::class, "authenticate"]);

        
    });

    Route::get("/confirm_account/{user}/{token}", [SigninController::class, "confirm_account"]) -> name('confirmation_notice');

    Route::post("/logout",[ LogOutController::class, 'logout'])->name("auth.logout")->middleware("auth");


});


 
/* 
CHECK IF THE USER IS CURRENTLY CONNECTED

DEBUT
*/

Route::group(["middleware" => ["auth_admin" /*  "auth"  */ ]], function(){

    /* Routes user */
/* Routes user */
/* Routes user */

/* DEBUT*/

Route::group(['prefix' =>'user_space'], function(){

    Route::get('/', [UserController::class, 'index'])->name('user.index');

    Route::get('/messages', [UserController::class, 'writte_us'])->name('user.writte')
    ;
    Route::get('/help', [UserController::class, 'faq'])->name('user.faq');

    Route::get('/modifier_mes_informations/', [UserController::class, 'modifier_infos'])->name('user.modifier_infos');
    Route::patch('/modifier_mes_informations/{user}', [UserController::class, 'update'])->name('user.update');

    Route::get('/modifier_mes_identifiants/', [UserController::class, 'modifier_identifiants'])->name('user.modifier_identifiants');
    Route::patch('/modifier_mes_identifiants/{user}', [UserController::class, 'update_identifiants'])->name('user.update_identifiants');



    Route::get('/souscrire_à_un_forfait', [UserController::class, 'scrire_forfait'])->name('user.scrire_forfait');
    Route::get('/souscrire_à_un_abonnement', [UserController::class, 'scrire_abonnement'])->name('user.scrire_abonnement');

    Route::get('/formuler_requete', [UserController::class, 'formuler_requete_Show'])->name('user.formuler_requete');
    Route::post('/formuler_requete', [UserController::class, 'formuler_requete'])->name('user.formuler_requete');

    Route::get('/formuler_plainte', [UserController::class, 'formuler_plainte_Show'])->name('user.formuler_plainte');
    Route::post('/formuler_plainte', [UserController::class, 'formuler_plainte'])->name('user.formuler_plainte');

    Route::get('/account_activation_request', [UserController::class, 'activation_request']) -> name('user.activation_request');


    
});

/* Routes user */
/* Routes user */
/* Routes user */

/* FIN*/



});

/* 

CHECK IF THE USER IS CURRENTLY CONNECTED *

FIN

*/








/* Admin part routes */
/* Admin part routes */
/* Admin part routes */

Route::group(['prefix'=>"admin"], function () {

  /*   Authenticate the admins */
  /*   DEBUT */

    Route::group(['middleware' =>["guest:admin" , "guest"]] ,function(){
 
        Route::get('/login',[AdminLoginController::class, "index"])->name('admin.login');
        Route::post('/login',[AdminLoginController::class, "login"])->name("admin.authenticate");

     /*    Route::view('/post','data-post')->name('post')->middleware('can:role,"admin","editor"');
        Route::view('/admin','data-admin')->name('admin')->middleware('can:role,"admin"'); */

   
    });

    /*   Authenticate the admins */
  /*   FIN */

    Route::post('logout',[AdminLogoutController::class, "logout"])->middleware("auth:admin")->name('admin.logout');



/* Authenticated admins routes */

/* DEBUT */

    Route::group(["middleware" => [ /*  "auth:admin" */  'auth_admin:admin']], function(){


                    Route::group(["prefix"=>"dashboard"], function() {

                        Route::get("/", [DashboardController::class, "index"])->name('dashboard');
                
                        Route::get('/new_plaintes', [DashboardController::class, 'new_plaintes']) ->name('new_plaintes');
                        Route::get('/new_requetes', [DashboardController::class, 'new_requetes']) ->name('new_requetes');


                           /* 
            Routes des clients
            Routes des clients
            Routes des clients
            DEBUT */

            Route::group(['prefix'=>'clients'], function(){

                Route::get("/", [ClientsController::class, "index"])->name("clients.index");

                Route::get("/client's_statuts", [ClientsController::class, "statuts_index"])->name("clients.statuts");
                
                Route::get("/create", [ClientsController::class, "create"])->name("clients.create");
                
                Route::post("/", [ClientsController::class, "store"])->name("clients.store");

                Route::get("/show/{client}", [ClientsController::class, "show"])->name("clients.show");

                Route::get("/delete/{client}", [ClientsController::class, "showForDeletion"])->name("clients.showForDeletion");

                Route::get("/edit/{client}", [ClientsController::class, "edit"])->name("clients.edit");
                
                Route::get("/show_statut/{client}", [ClientsController::class, "showForchangeStatut"])->name("clients.showForchangeStatut");

                Route::patch("/change_statut/{client}", [ClientsController::class, "changeStatut"])->name("clients.changeStatut");

                Route::get("/activate_clients_accounts", [ClientsController::class, "activate_account_show"])->name("clients.activate_account_show");

                Route::patch("/activate_clients_accounts", [ClientsController::class, "activate_account"])->name("clients.activate_account");



                Route::patch("/update/{client}", [ClientsController::class, "update"])->name("clients.update");


                Route::delete("/{client}", [ClientsController::class, "destroy"])->name("clients.destroy");




            });

            /* 
            Routes des clients
            Routes des clients
            Routes des clients
            FIN */



            /* Route des abonnements
            Route des abonnements
            Route des abonnements
            DEBUT */

            Route::group(['prefix'=>'abonnements'], function(){

                Route::get("/", [AbonnementsController::class, "index"])->name("abonnements.index");

                Route::get("/create", [AbonnementsController::class, "create"])->name("abonnements.create");

                Route::post("/", [AbonnementsController::class, "store"])->name("abonnements.store");

                Route::get("/delete_abonnement", [AbonnementsController::class, "showForDelete"])->name("abonnements.showForDelete");

                Route::delete("/{abonnement}", [AbonnementsController::class, "destroy"])->name("abonnements.destroy");


            });


            /* Route des abonnements
            Route des abonnements
            Route des abonnements
            FIN */




            /* Routes des forfaits
            Routes des forfaits
            Routes des forfaits
            DEBUT */

            Route::group(['prefix'=>'forfaits'], function(){

                Route::get("/", [ForfaitsController::class, "index"])->name("forfaits.index");

                Route::get("/create", [ForfaitsController::class, "create"])->name("forfaits.create");

                Route::post("/", [ForfaitsController::class, "store"])->name("forfaits.store");

                Route::get("/delete_a_forfait", [ForfaitsController::class, "showForDelete"])->name("forfaits.showForDelete");

                Route::delete("/{forfait}", [ForfaitsController::class, "destroy"])->name("forfaits.destroy");

            });

            /* Routes des forfaits
            Routes des forfaits
            Routes des forfaits
            FIN */




            /* Routes des plaintes */
            /* Routes des plaintes */
            /* Routes des plaintes */

            /* DEBUT */

            Route::group(['prefix'=>'plaintes'], function(){

                Route::get("/", [PlaintesController::class, "index"])->name("plaintes.index");

                Route::get("/add filter/", [PlaintesController::class, "filter_plaintes_statut"])->name("plaintes.filter_statut");

                Route::patch("/update/{id}", [PlaintesController::class, "update"])->name("plaintes.update");

            });

            /* Routes des plaintes */
            /* Routes des plaintes */
            /* Routes des plaintes */

            /* FIN*/



            /* Routes des requetes */
            /* Routes des requetes */
            /* Routes des requetes */

            /* DEBUT */

                    Route::group(['prefix'=>'requetes'], function(){

                        Route::get("/", [RequetesController::class, "index"])->name("requetes.index");

                        Route::get("/add filter/", [RequetesController::class, "filter_requetes_statut"])->name("requetes.filter_statut");

                        Route::patch("/update/{id}", [RequetesController::class, "update"])->name("requetes.update");

                    });

            /* Routes des requetes */
            /* Routes des requetes */
            /* Routes des requetes */

            /* FIN*/

                
                
                    });


            

                /* Authenticated admins routes */

            /* FIN */

            

            /* Admin part routes */
            /* Admin part routes */
            /* Admin part routes */


     });


         

});