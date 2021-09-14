<?php

namespace App\Providers;

use App\Models\Category;                 /* Desplegabe de categorias */
use Illuminate\Support\Facades\View;    /* View::share('categories', $categories); Desplegabe de categorias  */
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $categories = Category::all();          /* Desplegabe de categorias */
        View::share('categories', $categories); /* Desplegabe de categorias */ 
    }
}
