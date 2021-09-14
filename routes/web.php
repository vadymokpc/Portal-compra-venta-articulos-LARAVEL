<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class,'index'])->name('home'); 
Route::get('/ad/new', [HomeController::class,'newAd'])->name('ad.new');//Ruta oara insertar nuevo anuncio
Route::post('/ad/create', [HomeController::class,'createAd'])->name('ad.create');//Ruta creacion anuncio nuevo