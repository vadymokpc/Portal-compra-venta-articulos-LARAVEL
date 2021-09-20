@extends('layouts.app')
@section('content')

<!-- --------------------------------Visualizacion ultimos 5 anuncios ciclados por el foreach------------------------------ -->
<div class="container-fluid my-5">
    <div class="row vh-100">
        <div class="d-flex justify-content-center col-12">
            <!-- -----------------------------------------Middleware para configurar el idioma en session--------------------------------------------------  -->
            <h1 class="wh-100 my-3">{{__('ui.welcome')}}</h1>
            <!-- -----------------------------------------Middleware para configurar el idioma en session--------------------------------------------------  -->
        </div>
        @include('ad._ad')
    </div>
</div>

<!-- --------------------------------Visualizacion ultimos 5 anuncios ciclados por el foreach------------------------------ -->
@endsection