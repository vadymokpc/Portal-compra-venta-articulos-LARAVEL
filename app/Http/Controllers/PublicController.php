<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
/*  -- --------------------------------Visualizacion ultimos 6 anuncios------------------------------ -- */
      $ads = Ad::orderBy('created_at','desc')->take(6)->get();

      return view('home',compact('ads'));
/*  -- --------------------------------Visualizacion ultimos 6 anuncios--------------------------------------------- */
    }
 /*  -- --------------------------------Visualizar anuncios agrupados por categorias------------------------------ -- */  
public function adsByCategory($name, $category_id){
    $category = Category::find($category_id);     
    $ads = $category->ads()->paginate(5);
   
    return view('ads', compact ('category', 'ads'));
}
/*  -- --------------------------------Visualizar anuncios agrupados por categorias------------------------------ -- */ 
/*--------------------------------------Pagina detalle de cada anuncio-----------------------------------------------------*/
public function details($id) 
    {
        $ad = Ad::findOrFail($id);
        return view("ad.details",["ad"=>$ad]);
    }
/*--------------------------------------Pagina detalle de cada anuncio-----------------------------------------------------*/
}
