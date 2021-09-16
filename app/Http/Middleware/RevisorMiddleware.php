<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevisorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
    /* --------------------------Protegemos con Middleware el controlador del revisor------------------------------------------------------------------------------ */
    
      if(Auth::user() && Auth::user()->is_revisor)
      return $next($request);
      return redirect()->route('home')->with('access.denied.revisor.only','Acceso denegado, no eres un revisor, pregunta al administrador');
    }
    /* --------------------------Protegemos con Middleware el controlador del revisor------------------------------------------------------------------------------ */

}
