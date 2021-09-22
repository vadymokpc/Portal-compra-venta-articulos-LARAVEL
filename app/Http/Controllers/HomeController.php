<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\AdImage;
use Illuminate\Http\Request;
use App\Http\Requests\AdRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class HomeController extends Controller
{
/*--------------------------------------------------------------------------------------------------------------*/

public function __construct()
{
    $this->middleware('auth');    /* sólo los usuarios registrados tienen acceso a todas las funciones. */ 

    
}
/*--------------------------------------------------------------------------------------------------------------*/

public function newAd() 
    {
        /*--------------------------------------Ruta creacion anuncio nuevo---------------------------------------------*/

        /* return view('ad.new'); */ //Ruta para insertar nuevo anuncio
        /*--------------------------------------Ruta creacion anuncio nuevo---------------------------------------------*/

/*----------------------------------Generar identificadores únicos (codigo secreto)-------------------------------------------------*/

$uniqueSecret = base_convert(sha1(uniqid(mt_rand())), 16, 36);
return view('ad.new', compact('uniqueSecret')); 
/*----------------------------------Generar identificadores únicos (codigo secreto)-------------------------------------------------*/
    }

public function createAd(AdRequest $request) 

    {
    $a = new Ad();
    $a->title = $request->input('title');
    $a->body = $request->input('body');
    $a->category_id = $request->input('category'); 
    $a->price = $request->input('price');        /* Precio */  
    $a->user_id = Auth::id();                    /* Visualizar el nombre del user creador del anuncio  */  
    $a->save();
/*----------------------------------Generar identificadores únicos (codigo secreto)-------------------------------------------------*/
$uniqueSecret = $request->input('uniqueSecret');
/*----------------------------------Generar identificadores únicos (codigo secreto)-------------------------------------------------*/
/*--------------------------------------------------------------------metodo guardar anuncio menos lasimagenes que se hayan suido y luego borrado-----*/
$images = session()->get("images.{$uniqueSecret}");

$removedImages = session()->get("removedImages.{$uniqueSecret}");

$images = array_diff($images, $removedImages);
/*--------------------------------------------------------------------metodo guardar anuncio menos lasimagenes que se hayan suido y luego borrado-----*/
foreach($images as $image){
    $i = new AdImage;
    $fileName = basename($image);
    $newFilePath = "public/ads/{$a->id}/{$fileName}";
    Storage::move($image,$newFilePath);
    $i->file = $newFilePath;
    $i->ad_id = $a->id;
    $i->save();
}
File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));
 /*-----------------------------------------------------------------------------------*/
   
return redirect()->route('home')->with('ad.create.success','Anuncio creado con exito');
    }
/*--------------------------------------Ruta creacion anuncio nuevo---------------------------------------------*/
/*--------------------------------------Ruta comportamiento Drop zone imagenes---------------------------------------------*/
public function uploadImages(Request $request)
{
    
$uniqueSecret = $request->input('uniqueSecret');
$filePath = $request->file('file')->store("public/temp/{$uniqueSecret}");
session()->push("images.{$uniqueSecret}", $filePath);

return response()->json(
[
                 'id'=> $filePath
             ]
    
);
}

public function removeImages(Request $request)
    {       
        $uniqueSecret = $request->input('uniqueSecret');
        $fileName = $request->input('id');
        session()->push("removedImages.{$uniqueSecret}", $fileName);
        Storage::delete($fileName);
        return response()->json('ok');
    }
/*--------------------------------------Ruta comportamiento Drop zone imagenes---------------------------------------------*/    
}