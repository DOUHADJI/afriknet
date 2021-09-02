<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\clientsController;
use App\Http\Controllers\abonnementsController;
use App\Http\Controllers\forfaitsController;
use Illuminate\Support\Facades\Route;

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
    return view('login');
});



Route::get('dashboard', [dashboardController::class, 'index']) ->name('dashboard');

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

Route::group(['prefix'=>'abonnements'], function(){

    Route::get("/", [abonnementsController::class, "index"])->name("abonnements.index");

    Route::get("/create", [abonnementsController::class, "create"])->name("abonnements.create");

    Route::post("/", [abonnementsController::class, "store"])->name("abonnements.store");

    Route::get("/delete_abonnement", [abonnementsController::class, "showForDelete"])->name("abonnements.showForDelete");

    Route::delete("/{abonnement}", [abonnementsController::class, "destroy"])->name("abonnements.destroy");


});


Route::group(['prefix'=>'forfaits'], function(){

    Route::get("/", [forfaitsController::class, "index"])->name("forfaits.index");

    Route::get("/create", [forfaitsController::class, "create"])->name("forfaits.create");

    Route::post("/", [forfaitsController::class, "store"])->name("forfaits.store");

    Route::get("/delete_a_forfait", [forfaitsController::class, "showForDelete"])->name("forfaits.showForDelete");

    Route::delete("/{forfait}", [forfaitsController::class, "destroy"])->name("forfaits.destroy");

});
