<?php namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
/* ---------------------------------------------------Excepcion para evitar error al clonar "user 3.1"------------------------------------------------------------------- */
        /* if(Schema::hasTable('categories'))  
        View::share('categories', Category::all()); */
/* ---------------------------------------------------Excepcion para evitar error al clonar "user 3.1"------------------------------------------------------------------- */        
/* ---------------------------------------------------Desplegabe de categorias en formulario "crear anuncio" ------------------------------------------------------------------- */

        try {
            $categories=Category::all(); 
            
            View::share('categories', $categories);   
         

        }
/* ----------------------------------------------------Desplegabe de categorias en formulario "crear anuncio" ------------------------------------------------------------------ */
/* -----------------------------------------------Visualizar anuncios agrupados por categorias----------------------------------------------------------------------- */
        catch (\Throwable $th) {
            dump("ALERT: Recuerda lanzar las migrations cuando acabes el clone");
        }

        Paginator::useBootstrap();
/* ------------------------------------------------Visualizar anuncios agrupados por categorias---------------------------------------------------------------------- */

    }
}
