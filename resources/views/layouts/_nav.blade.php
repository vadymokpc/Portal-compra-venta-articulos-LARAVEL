<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Pronto.es</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav d-flex align-items-center justify-content-between w-100">

                <div class="left-nav-elements d-flex">
                    <li class="nav-item">
                        <a class="nav-link text-decoration-none text-reset" href="{{ route('ad.new') }}">
                            <span>Nuevo Anuncio</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{route('category.ads',['name'=>$category->name,'id'=>$category->id])}}">{{$category->name}}</a>
                            </li>

                            @endforeach
                        </ul>
                    </li>
                </div>

                <div class="right-nav-elements d-flex align-items-center">

                    @guest

                    @if (Route::has('login'))
                    <li class="nav-item dropdown">
                        <a class="borderMarcador nav-link text-lowercase py-3 px-0 px-lg-3 rounded js-scroll-trigger text-decoration-none text-reset"
                            href="{{route('login')}}"><span>Login</span></a>
                    </li>
                    @endif
                    @if (Route::has('register'))
                    <li class="nav-item dropdown">
                        <a class="borderMarcador nav-link text-lowercase py-3 px-0 px-lg-3 rounded js-scroll-trigger text-decoration-none text-reset"
                            href="{{route('register')}}"><span>Register</span></a>
                    </li>
                    @endif
                    @else
                    <form id="logoutForm" action="{{route('logout')}}" method="POST">
                        @csrf
                    </form>
                    <li class="nav-item dropdown">
                        <a id="logoutBtn"
                            class=" nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-decoration-none text-reset"
                            href="#">Logout</a>
                    </li>
                    @auth

                    @if (Auth::user()->is_revisor)
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('revisor.home') }}">
                            Por revisar
                            <span class="badge rounded-pill bg-danger">
                                {{\App\Models\Ad::ToBeRevisionedCount() }}
                            </span>
                        </a>
                    </li>

                    @endif

                    @endauth
                    <div class="lang-flags">
                        <!------------------------------------------------------------para que nos aparezca un numero con cuantos anuncios por revisar----------------------------------------------->
                        <!------------------------------------------------------------Banderitas de idiomas desde _locale.blade---------------------------------------------------------------------------------->
                        @include('layouts._locale',["lang"=>'es','nation'=>'es'])
                        @include('layouts._locale',["lang"=>'gb','nation'=>'gb'])
                        @include('layouts._locale',["lang"=>'it','nation'=>'it'])
                        <!------------------------------------------------------------Banderitas de idiomas desde _locale.blade---------------------------------------------------------------------------------->
                        @endguest

                    </div>

                </div>


            </ul>
        </div>
    </div>
</nav>

<style>
.lang-flags {
    display: flex;
}

@media (max-width: 991px) {

    .navbar-nav .left-nav-elements,
    .right-nav-elements {
        flex-direction: column;
    }

    .lang-flags {
        display: flex;
    }

    .lang-flags>form:not(:last-child) {
        margin-right: 15px;
    }
}
</style>