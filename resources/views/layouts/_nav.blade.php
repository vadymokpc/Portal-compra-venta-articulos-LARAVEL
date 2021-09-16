<!-- Navigation-->
<nav class="navbar navbar-expand-lg text-uppercase py-0 border-bottom" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger text-decoration-none text-reset prontologo"
            href="{{ route('home') }}">Pronto.es</a>
        <button
            class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded"
            type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
            aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <!----------------------------------------------------------------------------------------------------------->
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item py-2">
                        <a class="nav-link text-lowercase text-decoration-none text-reset" href="{{ route('ad.new') }}">
                            <span>Nuevo Anuncio</span>
                        </a>
                    </li>
                    <!----------------------------------------------------------------------------------------------------------->
                    <!--------------------------------------------------Drop down CATEGORIAS--------------------------------------------------------->
                    <li class="nav-item py-2 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($categories as $category)
                            <li><a class="dropdown-item"
                                    href="{{route('category.ads',['name'=>$category->name,'id'=>$category->id])}}">{{$category->name}}</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    <!---------------------------------------------------Drop down CATEGORIAS-------------------------------------------------------->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item mx-0 mx-lg-1 ">
                        <a class="borderMarcador nav-link text-lowercase py-3 px-0 px-lg-3 rounded js-scroll-trigger text-decoration-none text-reset"
                            href="{{route('login')}}"><span>Login</span></a>
                    </li>
                    @endif
                    @if (Route::has('register'))
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="borderMarcador nav-link text-lowercase py-3 px-0 px-lg-3 rounded js-scroll-trigger text-decoration-none text-reset"
                            href="{{route('register')}}"><span>Register</span></a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item mx-0 mx-lg-1">
                        <form id="logoutForm" action="{{route('logout')}}" method="POST">
                            @csrf
                        </form>
                        <a id="logoutBtn"
                            class=" nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger text-decoration-none text-reset"
                            href="#">Logout</a>
                    </li>
<!------------------------------------------------------------para que nos aparezca un numero con cuantos anuncios por revisar----------------------------------------------->
                    @auth
                    @if (Auth::user()->is_revisor)
                    <li class="nav-item py-2">
                        <a class="nav-link" href="{{ route('revisor.home') }}">
                            Por revisar
                            <span class="badge rounded-pill bg-danger">
                                {{\App\Models\Ad::ToBeRevisionedCount() }}
                            </span>
                        </a>
                    </li>
                    @endif
                    @endauth
                    @endguest
                </ul>
        </div>
    </div>
</nav>
