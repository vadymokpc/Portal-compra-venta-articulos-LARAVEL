<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token meta tag-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token meta tag-->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <!-- Google fonts "Extra-light 200"  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@200&display=swap" rel="stylesheet">
    <!-- Google fonts "Extra-light 200"  -->

</head>

<body>

    <div id="app">
        @include('layouts._nav')
        <!-- --------------------------------Alert "Anuncio creado con exito"------------------------------ -->
        @if(session('ad.create.success'))
        <div class="alert alert-success">{{session('ad.create.success')}}</div>
        @endif
        <!-- --------------------------------Alert "Anuncio creado con exito"------------------------------ -->
        <!-- --------------------------------Alert Revisor en caso de acceso denegado------------------------------ -->
        @if(session('access.denied.revisor.only'))
        <div class="alert alert-danger">{{session('access.denied.revisor.only')}}</div>
        @endif
        <!-- --------------------------------Alert Revisor en caso de acceso denegado------------------------------ -->
        <main class="container py-4">
            @yield('content')
        </main>

    </div>
    @include('layouts._footer')
    <script>
    /*-----------------------------------------Script para boton de logout------------------------------*/
    const logout = document.getElementById('logoutBtn');
    if (logout) {
        logout.addEventListener('click', (e) => {
            e.preventDefault();
            const form = document.getElementById('logoutForm').submit();
        });
    }
    /* ----------------------------------------Script para boton de logout------------------------------*/
    /* ----------------------------------------Script para cambiar el color de l navbar------------------------------*/
    let nav = document.querySelector('#nav')
    document.addEventListener('scroll', () => {
        if (window.pageYOffset > 150) {
            nav.classList.remove('bg-opacity-25')
            nav.classList.add('text-dark')
            nav.classList.remove('text-white')
            nav.classList.remove('bg-white')
            nav.style.backgroundColor = '#f4c996'
            nav.classList.add('shadow')
        } else {
            nav.classList.add('bg-opacity-25')
            nav.classList.add('text-white')
            nav.classList.add('bg-white')
            nav.classList.remove('text-dark')
            nav.classList.remove('shadow')

        }
        console.log()
    })


    /* ----------------------------------------Script para cambiar el color de l navbar------------------------------*/
    </script>
    <!-- Scripts -->
    <script src="{{mix('js/app.js')}}"></script>

</body>

</html>