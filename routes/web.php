<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\clientsController;
use App\Http\Controllers\abonnementsController;
use App\Http\Controllers\forfaitsController;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\logOutController;
use App\Http\Controllers\plaintesController;
use App\Http\Controllers\requetesController;
use App\Http\Controllers\Auth\signInController;
use App\Http\Controllers\userController;
use App\Models\abonnements;
use App\Models\forfaits;
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
})->name('welcome');



Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(["prefix" => "auth"], function () {
    Route::group(["middleware" => ["guest"]], function () {

        Route::get("/signin", [signInController::class, "create"])->name("register");
        Route::post("/signin", [signInController::class, "register"]);

        Route::get("/login", [loginController::class, "create"])->name("login");
        Route::post("/login", [loginController::class, "authenticate"]);
    });
    Route::post("/logout", logOutController::class)->name("auth.logout")->middleware("auth");
});



Route::get('dashboard', [dashboardController::class, 'index']) ->name('dashboard');

Route::get('/new_plaintes', [dashboardController::class, 'new_plaintes']) ->name('new_plaintes');

Route::get('/new_requetes', [dashboardController::class, 'new_requetes']) ->name('new_requetes');


/* 
Routes des clients
Routes des clients
Routes des clients
DEBUT */

Route::group(['prefix'=>'clients'], function(){

    Route::get("/", [clientsController::class, "index"])->name("clients.index");

    Route::get("/client's_statuts", [clientsController::class, "statuts_index"])->name("clients.statuts");
    
    Route::get("/create", [clientsController::class, "create"])->name("clients.create");
    
    Route::post("/", [clientsController::class, "store"])->name("clients.store");

    Route::get("/show/{client}", [clientsController::class, "show"])->name("clients.show");

    Route::get("/delete/{client}", [clientsController::class, "showForDeletion"])->name("clients.showForDeletion");

    Route::get("/edit/{client}", [clientsController::class, "edit"])->name("clients.edit");
    
    Route::get("/show_statut/{client}", [clientsController::class, "showForchangeStatut"])->name("clients.showForchangeStatut");

    Route::patch("/change_statut/{client}", [clientsController::class, "changeStatut"])->name("clients.changeStatut");

    Route::patch("/update/{client}", [clientsController::class, "update"])->name("clients.update");


    Route::delete("/{client}", [clientsController::class, "destroy"])->name("clients.destroy");




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

    Route::get("/", [abonnementsController::class, "index"])->name("abonnements.index");

    Route::get("/create", [abonnementsController::class, "create"])->name("abonnements.create");

    Route::post("/", [abonnementsController::class, "store"])->name("abonnements.store");

    Route::get("/delete_abonnement", [abonnementsController::class, "showForDelete"])->name("abonnements.showForDelete");

    Route::delete("/{abonnement}", [abonnementsController::class, "destroy"])->name("abonnements.destroy");


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

    Route::get("/", [forfaitsController::class, "index"])->name("forfaits.index");

    Route::get("/create", [forfaitsController::class, "create"])->name("forfaits.create");

    Route::post("/", [forfaitsController::class, "store"])->name("forfaits.store");

    Route::get("/delete_a_forfait", [forfaitsController::class, "showForDelete"])->name("forfaits.showForDelete");

    Route::delete("/{forfait}", [forfaitsController::class, "destroy"])->name("forfaits.destroy");

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

    Route::get("/", [plaintesController::class, "index"])->name("plaintes.index");

    Route::get("/add filter/", [plaintesController::class, "filter_plaintes_statut"])->name("plaintes.filter_statut");

    Route::patch("/update/{id}", [plaintesController::class, "update"])->name("plaintes.update");

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

    Route::get("/", [requetesController::class, "index"])->name("requetes.index");

    Route::get("/add filter/", [requetesController::class, "filter_requetes_statut"])->name("requetes.filter_statut");

    Route::patch("/update/{id}", [requetesController::class, "update"])->name("requetes.update");

});

/* Routes des requetes */
/* Routes des requetes */
/* Routes des requetes */

/* FIN*/


/* Routes user */
/* Routes user */
/* Routes user */

/* DEBUT*/

Route::group(['prefix' => 'user_space'], function(){

    Route::get('/', [userController::class, 'index'])->name('user.index');
    Route::get('/messages', [userController::class, 'writte_us'])->name('user.writte');
    Route::get('/help', [userController::class, 'faq'])->name('user.faq');
    Route::get('/modifier_mes_informations', [userController::class, 'modifier_infos'])->name('user.modifier_infos');
    Route::patch('/modifier_mes_informations', [userController::class, 'update'])->name('user.update');

    
});
/* Routes user */
/* Routes user */
/* Routes user */

/* FIN*/

