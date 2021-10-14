<nav id="nav" class="navbar navbar-expand-lg navbar-light bg-white bg-opacity-25 sticky-top">

    <div class="container">

        <a class="navbar-brand fs-5 text-decoration-none  borderLeftRight" href="{{ route('home') }}">Rapido.es</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav d-flex align-items-center justify-content-between w-100">

                <div class="left-nav-elements d-flex">
                    <li class="nav-item">

                        <a class="nuevoAnuncio nav-link fs-5 text-decoration-none  borderLeftRight "
                            href="{{ route('ad.new') }}">
                            <span>{{__('ui.New Ad')}}</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown borderLeftRight">
                        <a class="categorias nav-link fs-5 text-decoration-none  dropdown-toggle" href="#"
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>{{__('ui.categories')}}</span>
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
                <!-- ---------------------------------------Buscador----------------------------------------------------------------- -->
                <div class="center-nav-elements d-flex align-items-center">

                    <form action="{{ route('search') }}" method="GET" class="d-flex">

                        <input class="rounded-pill buscador w-100 p-2 me-3 left-nav-elements" type="text" name="q"
                            placeholder="Buscar en todas las categorias" aria-label="Search">

                        <button class="boton" type="submit">Buscar</button>
                    </form>
                </div>
                <!-- ---------------------------------------Buscador----------------------------------------------------------------- -->
                <div class="right-nav-elements d-flex align-items-center">

                    @guest

                    <li class="nav-item dropdown">
                        <a class="borderMarcador nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-decoration-none text-dark"
                            href="{{route('login')}}"><span>{{__('ui.login')}}</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="borderMarcador nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-decoration-none text-dark"
                            href="{{route('register')}}"><span>{{__('ui.register')}}</span></a>
                    </li>

                    @endguest

                    @auth
                    <form id="logoutForm" action="{{route('logout')}}" method="POST">
                        @csrf
                    </form>
                    <li class="nav-item dropdown">
                        <a id="logoutBtn"
                            class=" nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-decoration-none text-dark"
                            href="#">{{__('ui.logout')}}</a>
                    </li>
                    <!-- ---------------------------------------nombre de usuario autentificado----------------------------------------------------------------- -->
                    <li class="userAutentificado nav-item py-2 ">
                        {{ Auth::user()->name }}
                    </li>
                    <!-- ---------------------------------------nombre de usuario autentificado----------------------------------------------------------------- -->
                    <!-- ---------------------------------------Alert con el numero de anuncios por revisar----------------------------------------------------------------- -->
                    @if (Auth::user()->is_revisor)
                    <li class="nav-item dropdown">
                        <a class="nav-link text-dark" href="{{ route('revisor.home') }}">
                            Por revisar
                            <span class="badge rounded-pill bg-danger">
                                {{\App\Models\Ad::ToBeRevisionedCount() }}
                            </span>
                        </a>
                    </li>
                    @endif
                    <!-- ---------------------------------------Alert con el numero de anuncios por revisar----------------------------------------------------------------- -->

                    @endauth
                    <div class="lang-flags">
                        <!------------------------------------------------------------Banderitas de idiomas desde _locale.blade---------------------------------------------------------------------------------->
                        @include('layouts._locale',["lang"=>'es','nation'=>'es'])
                        @include('layouts._locale',["lang"=>'gb','nation'=>'gb'])
                        @include('layouts._locale',["lang"=>'it','nation'=>'it'])
                        <!------------------------------------------------------------Banderitas de idiomas desde _locale.blade---------------------------------------------------------------------------------->
                    </div>

                </div>


            </ul>
        </div>
    </div>
</nav>