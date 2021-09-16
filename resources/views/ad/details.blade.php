@extends('layouts.app')
@section('content')

<h2>Detalle de anuncio</h2>

<div class="container my-5">
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            <div class="card mb-5" style="width: 18rem;">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> {{$ad->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{$ad->price}}</h6>
                    <p class="card-text"> {{$ad->body}}</p>
                    <h6 class="card-subtitle mb-2">
                        <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <!-- Visualizar  "categoria por cada tarjeta -->
                        <strong>Categoria: <a
                                href="{{route('category.ads',['name'=>$ad->category->name,'id'=>$ad->category->id])}}">{{$ad->category->name}}</a></strong>
                        <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                        <!--Visualizar  "usuario" por cada tarjeta  -->
                        <i>{{$ad->created_at->format('d/m/Y')}} - {{ $ad->user->name }}</i></h6>
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
                    <!--Visualizar  "DETALLE" por cada tarjeta en vista Details -->
                    <a href="{{route('ad.details', ['id'=>$ad->id])}}">Leer más</a>
                    <br>
                    <a href="#" class="card-link">Link</a>
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
