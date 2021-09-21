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
    </script>
    <!-- Scripts -->
    <script src="{{mix('js/app.js')}}"></script>

</body>

</html>