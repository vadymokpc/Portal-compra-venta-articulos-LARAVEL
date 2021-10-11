@extends('layouts.app')
@section('content')

<!-- --------------------------------Visualizacion ultimos 5 anuncios ciclados por el foreach------------------------------ -->
<div class="container-fluid my-5">
    <div class="row">
        <div class="d-flex justify-content-center col-12">
            <!-- -----------------------------------------Middleware para configurar el idioma en session--------------------------------------------------  -->
            <h1 class="wh-100 my-3">{{__('ui.welcome')}}</h1>
            <!-- -----------------------------------------Middleware para configurar el idioma en session--------------------------------------------------  -->
        </div>
        @include('ad._ad')
    </div>
</div>
<!-- -----------------------------------------Columna izquierda--------------------------------------------------  -->
<div class="row mt-10">
    <div class="col-12 col-md-6 d-flex flex-column justify-content-center">
        <h2>{{__('ui.segundoh1')}}</h2>
        <p>{{__('ui.parrafoHome')}}</p>
    </div>
    <!-- -----------------------------------------Columna izquierda--------------------------------------------------  -->
    <!-- -----------------------------------------Columna derecha--------------------------------------------------  -->
    <div class="col-12 col-md-6">
        <img class="w-100 imagenColDerecha"
            src="https://images.news18.com/ibnlive/uploads/2020/06/1591287606_825x582_1.jpg" alt="">
    </div>
    <!-- -----------------------------------------Columna derecha--------------------------------------------------  -->
</div>
<!-- --------------------------------Visualizacion ultimos 5 anuncios ciclados por el foreach------------------------------ -->
@endsection