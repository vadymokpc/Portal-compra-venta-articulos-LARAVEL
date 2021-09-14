<?php namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider {

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
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
                return Limit::perMinute(5)->by($request->email.$request->ip());
            }

        );

        RateLimiter::for('two-factor', function (Request $request) {
                return Limit::perMinute(5)->by($request->session()->get('login.id'));
            }

        );

/* -------------------------------------sólo los usuarios registrados pueden añadir un nuevo anuncio.---------------------------------------------------------*/ 

      Fortify::registerView(function () {
                return view('auth.register');   /* Nos da la vista para registrar usuario condicionado por -auth- de la funcion construct */
            }

        );

        Fortify::loginView(function () {
                return view('auth.login');      /* Nos da la vista para loguear usuario condicionado por -auth- de la funcion construct */
            }

        );


        Fortify::requestPasswordResetLinkView(function () {
                return view('auth.forgot-password');              /* (Aun no estamos usandola) condicionado por -auth- de la funcion construct */
            }

        );


        Fortify::resetPasswordView(function ($request) {
                return view('auth.reset-password', ['request'=> $request]);   /* (Aun no estamos usandola) condicionado por -auth- de la funcion construct */
            }
         );
    }
}
/* ---------------------------------------------sólo los usuarios registrados pueden añadir un nuevo anuncio.-------------------------------------------------*/ 