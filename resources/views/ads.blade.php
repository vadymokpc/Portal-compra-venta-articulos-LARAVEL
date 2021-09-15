@extends('layouts.app')
@section('content')
<!-- --------------------------------Tarjeta duplicada de Home------------------------------ -->
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h1>Anuncios por categoría: {{$category->name}}</h1>
        </div>
        @include('ad._ad')
    </div>
    <!-- -----------------------------Visualizar anuncios agrupados por categorias--------------------------------- -->
    <div class="row my-3">
        <div class="col-12 col-md-6 offset-md-3">
            {{ $ads->links() }}
        </div>
    </div>    
</div>
<!-- -----------------------------Visualizar anuncios agrupados por categorias--------------------------------- -->
<!-- --------------------------------Tarjeta duplicada de Home------------------------------ -->
@endsection
