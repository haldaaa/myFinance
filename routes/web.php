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



Route::post('/commercial', [CommercialController::class, 'acheteAction'])->name('commercialIndex');


Route::get('/jetest', [ActionController::class, 'actionsParCommercial']);






Route::get('/commercial', [CommercialController::class, 'index'])->name('commercial.index');
Route::get('/commercial/{id}', [CommercialController::class, 'show'])->name('commercial.show');


Route::get('/transaction', [DetailCommandeController::class, 'index'])->name('transaction.index');
Route::get('/transaction{id}', [DetailCommandeController::class, 'show'])->name('transaction.show');