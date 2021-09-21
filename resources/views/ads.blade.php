@extends('layouts.app')
@section('content')
<!-- -----------------------------Visualizar anuncios agrupados por categorias--------------------------------- -->
<div class="container my-3 py-3">
    <div class="row">
        <div class="col-12 text-center">
            <h2>Anuncios por categoria: {{$category->name}}</h2>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        @include('ad._ad')
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <div>
                {{ $ads->links() }}
            </div>
        </div>
    </div>
</div>
<!-- -----------------------------Visualizar anuncios agrupados por categorias--------------------------------- -->
@endsection