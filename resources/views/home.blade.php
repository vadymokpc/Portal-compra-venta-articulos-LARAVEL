@extends('layouts.app')  
@section('content')

<!-- --------------------------------Visualizacion ultimos 5 anuncios ciclados por el foreach------------------------------ -->
<div class="container my-5">
<div class="row">
    <div class="col-12 col-md-6 offset-md-3">
        <h1>Bienvenidos a Rápido.es</h1>
        @foreach($ads as $ad)
        <div class="card mb-5" style="width: 18rem;">
            <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"> {{$ad->title}}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{$ad->price}}</h6>
              <p class="card-text"> {{$ad->body}}</p>
              <h6 class="card-subtitle mb-2">
                <strong>Categoria: <a href="#">{{$ad->category->name}}</a></strong>                     <!-- -$ad->category->name- Visualizar  "categoria por cada tarjeta en home -->
                               <i>{{$ad->created_at->format('d/m/Y')}} - {{ $ad->user->name }}</i></h6> <!-- -$ad->user->name- Visualizar  "usuario" por cada tarjeta en home -->
              <a href="#" class="card-link">Link</a>
            </div>
          </div>
          @endforeach
    </div>
</div>
</div>
<!-- --------------------------------Visualizacion ultimos 5 anuncios ciclados por el foreach------------------------------ -->
@endsection