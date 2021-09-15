<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
/*  -- --------------------------------Visualizacion ultimos 5 anuncios------------------------------ -- */
      $ads = Ad::orderBy('created_at','desc')->take(5)->get();

      return view('home',compact('ads'));
/*  -- --------------------------------Visualizacion ultimos 5 anuncios------------------------------ -- */
    }
   
}
