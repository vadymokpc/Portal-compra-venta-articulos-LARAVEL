@extends('layouts.app')
@section('content')

<!-- --------------------------------Visualizacion ultimos 5 anuncios ciclados por el foreach------------------------------ -->
<div class="container-fluid my-5">
    <div class="row">
        <div class="d-flex justify-content-center col-12">
            <h1 class="">Bienvenidos a Rápido.es</h1>
        </div>
        @include('ad._ad')
    </div>
</div>
<!-- --------------------------------Visualizacion ultimos 5 anuncios ciclados por el foreach------------------------------ -->
@endsection
