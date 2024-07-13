<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommercialController;
use App\Http\Controllers\DetailCommandeController;
use App\Http\Controllers\ActionController;

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


Route::get('/', function() {
    return view('acceuil');
})->name('acceuil');






Route::get('/jetest', [ActionController::class, 'actionsParCommercial']);


/* Run la crontab et l'app */ 

Route::get('/run', [ActionController::class, 'run'])->name('run');



/* Commercial */ 

Route::post('/commercial', [CommercialController::class, 'acheteAction'])->name('commercialIndex');
Route::get('/commercial', [CommercialController::class, 'index'])->name('commercial.index');
Route::get('/commercial/{id}', [CommercialController::class, 'show'])->name('commercial.show');


/* Transaction */ 

Route::get('/detailcommande', [DetailCommandeController::class, 'index'])->name('detailCommandeIndex');
Route::get('/detailcommande/{id}', [DetailCommandeController::class, 'show'])->name('detailCommandeShow');


/* Actions */ 

Route::get('/action', [ActionController::class, 'index'])->name('actionIndex');
Route::get('/action/{id}', [ActionController::class, 'show'])->name('action.show');
Route::post('/action/acheter/{id}', [ActionController::class, 'acheterActionBouton'])->name('action.acheter');

Route::post('/resetTables', [ActionController::class, 'resetTables'])->name('resetTables');
Route::post('/runArtisanCommand', [ActionController::class, 'runArtisanCommand'])->name('runArtisanCommand');