<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublicController;

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

Route::get('/', [PublicController::class,'index'])->name('home');
//--------------------------------------Nuevo anuncio----------------------------------------------------------------------
Route::get('/ad/new', [HomeController::class,'newAd'])->name('ad.new');//Ruta para insertar nuevo anuncio
Route::post('/ad/create', [HomeController::class,'createAd'])->name('ad.create');//Ruta guardado anuncio nuevo en DataBase
//--------------------------------------Nuevo anuncio----------------------------------------------------------------------
