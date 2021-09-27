<?php namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\AdImage;
use App\Jobs\ResizeImage;
use Illuminate\Http\Request;
use App\Http\Requests\AdRequest;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeLabelImage;
use App\Jobs\GoogleVisionSafeSearchImage;



class HomeController extends Controller {
    /*--------------------------------------------------------------------------------------------------------------*/

    public function __construct() {
        $this->middleware('auth');
        /* sólo los usuarios registrados tienen acceso a todas las funciones. */


    }
    /*--------------------------------------------------------------------------------------------------------------*/

    public function newAd(Request $request) {
        /*----------------------------------Generar identificadores únicos (codigo secreto) en la creacion de formulario -------------------------------------------------*/

        $uniqueSecret=$request->old(    //recordar el código secreto en el caso 
            'uniqueSecret',             //de error de validación
            base_convert(sha1(uniqid(mt_rand())), 16, 36));//Generacion de numero secreto
            
            return view('ad.new', compact('uniqueSecret')); //Ruta para insertar nuevo anuncio con codigo secreto 
        /*----------------------------------Generar identificadores únicos (codigo secreto) en la creacion de formulario-------------------------------------------------*/
    }

    public function createAd(AdRequest $request) {
        $a=new Ad();
        $a->title=$request->input('title');
        $a->body=$request->input('body');
        $a->category_id=$request->input('category');
        $a->price=$request->input('price');
        /* Precio */
        $a->user_id=Auth::id();
        /* Visualizar el nombre del user creador del anuncio  */
        $a->save();
        /*----------------------------------Generar identificadores únicos (codigo secreto)-------------------------------------------------*/
        $uniqueSecret=$request->input('uniqueSecret');
        /*----------------------------------Generar identificadores únicos (codigo secreto)-------------------------------------------------*/
        /*---------------------------------metodo guardar anuncio menos lasimagenes que se hayan subido y luego borrado-----------------------*/
        $images=session()->get("images.{$uniqueSecret}", []);

        $removedImages=session()->get("removedImages.{$uniqueSecret}", []);

        $images=array_diff($images, $removedImages);

        /*---------------------------------metodo guardar anuncio menos lasimagenes que se hayan subido y luego borrado-----------------------*/
        foreach($images as $image) {
            $i=new AdImage;
            $fileName=basename($image);
            $newFilePath="public/ads/{$a->id}/{$fileName}";
            Storage::move($image, $newFilePath);
            $i->file = $newFilePath;
            $i->ad_id = $a->id;
            $i->save();
        /*--------------------------------------1 Recorte de las imagenes---------------------------------------------*/

  
                Bus::chain([
                    new GoogleVisionSafeSearchImage($i->id),
                    new GoogleVisionSafeLabelImage($i->id),
                    new GoogleVisionRemoveFaces($i->id),
                    new ResizeImage($i->file, 300,350),
                    new ResizeImage($i->file, 500,500)
                ])->dispatch();
            /*--------------------------------------7---------------------------------------------*/
        }

        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));
        /*-----------------------------------------------------------------------------------*/

        return redirect()->route('home')->with('ad.create.success', 'Anuncio creado con exito');
    }

    /*--------------------------------------Ruta creacion anuncio nuevo---------------------------------------------*/
    /*--------------------------------------Ruta comportamiento Drop zone imagenes---------------------------------------------*/
    public function uploadImages(Request $request) {

        $uniqueSecret = $request->input('uniqueSecret');

        $filePath = $request->file('file')->store("public/temp/{$uniqueSecret}");
        /*--------------------------------------22---------------------------------------------*/
        dispatch(new ResizeImage($filePath,120,120));
        /*--------------------------------------22---------------------------------------------*/
        session()->push("images.{$uniqueSecret}", $filePath);
        
        return response()->json(
            [ 
               'id'=> $filePath
            ]
        );
    }

    public function removeImages(Request $request) {
        $uniqueSecret=$request->input('uniqueSecret');
        $fileName=$request->input('id');
        session()->push("removedImages.{$uniqueSecret}", $fileName);
        Storage::delete($fileName);
        return response()->json('ok');
    }

    /*--------------------------------------Ruta comportamiento Drop zone imagenes---------------------------------------------*/
    /*--------------------------------------ruta para que nos devuelva la imagen en caso de error de validacion---------------------------------------------*/
    public function getImages(Request $request) {
        $uniqueSecret=$request->input('uniqueSecret');

        $images=session()->get("images.{$uniqueSecret}", []);
        $removedImages=session()->get("removedImages.{$uniqueSecret}", []);
        $images=array_diff($images, $removedImages);
        $data=[];

        foreach($images as $image) {
            $data[]=[ 
            'id'=>$image,
            'name'=>basename($image),//Muestra nombre imagen subida en dropzone
 /*--------------------------------------22---------------------------------------------*/           
            'src' => AdImage::getUrlByFilePath($image, 120, 120),
 /*--------------------------------------22---------------------------------------------*/           
            'size'=> Storage::size($image)]; //Muestra tamaño imagen subida en dropzone

        }

        return response()->json($data);
    }
    /*--------------------------------------ruta para que nos devuelva la imagen en caso de error de validacion---------------------------------------------*/
}