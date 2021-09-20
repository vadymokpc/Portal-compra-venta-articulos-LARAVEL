<?php namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller {
    
    public function index() {
        /*--------------------------------------Flitrado de anuncios aceptados por revisor-----------------------------------------------------*/
        $ads = Ad::where('is_accepted',true)
        ->orderBy('created_at', 'desc') 
        ->take(6)                         /* Visualizacion ultimos 6 anuncios en orden descendiente */
        ->get();
        return view('home', compact('ads'));
        /*---------------------------------------Flitrado de anuncios aceptados por revisor----------------------------------------------------*/
    }

    /*  -- --------------------------------?????????Visualizar anuncios agrupados por categorias------------------------------ -- */
    public function adsByCategory($name, $category_id) {

        $category=Category::find($category_id);
        $ads=$category->ads() ->where('is_accepted', true) ->orderBy('created_at', 'desc') ->paginate(5);
        return view('ads', compact('category', 'ads'));
    }

    /*  -- --------------------------------????????????Visualizar anuncios agrupados por categorias------------------------------ -- */
    /*--------------------------------------Pagina detalle de cada anuncio-----------------------------------------------------*/
    public function details($id) {
        $ad = Ad::findOrFail($id);
        return view("ad.details", ["ad"=>$ad]);
    }
    /*--------------------------------------Pagina detalle de cada anuncio-----------------------------------------------------*/
 
    /*-------------------------------------------------------------------------------------------*/
    public function locale($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }
    /*-------------------------------------------------------------------------------------------*/

}