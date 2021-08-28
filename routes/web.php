<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\clientsController;
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
    Route::get("/create", [clientsController::class, "create"])->name("clients.create");
    Route::post("/", [clientsController::class, "store"])->name("clients.store");
    Route::delete("/{client}", [clientsController::class, "destroy"])->name("clients.destroy");

    Route::get("/{client}", [clientsController::class, "edit"])->name("clients.edit");

    Route::get("/{client}", [clientsController::class, "show"])->name("clients.show");



});
