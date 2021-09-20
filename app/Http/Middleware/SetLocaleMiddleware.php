<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocaleMiddleware {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {

/* -----------------------------------------Middleware para configurar el idioma en session-------------------------------------------------- */
        $locale=session('locale', 'es'); /* Si no sabe nada se pone en castellano */
        App::setLocale($locale);
        return $next($request);
/* -----------------------------------------Middleware para configurar el idioma en session-------------------------------------------------- */
    }
}