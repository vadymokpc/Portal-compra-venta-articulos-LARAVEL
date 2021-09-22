@extends('layouts.app')
@section('content')

<h2>Detalle de anuncio</h2>

<div class="container my-5 py-5">
    <div class="row">
        <div class="col-12 col-md-4 offset-md-2 my-img-detail">
            <h1 class="text-center my-card-title">{{$ad->title}}</h1>    
            <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
            <strong class="footer-dcho">{{__('ui.categories')}}:<a href="{{route('category.ads',['name'=>$ad->category->name,'id'=>$ad->category->id])}}"> {{$ad->category->name}}</a></strong>
        </div>
        <div class="col-12 col-md-4 offset-md-2 my-detail">
            <p>{{$ad->body}}</p>
            <div>
                <strong class="card-subtitle mb-2">{{__('Precio')}}: {{$ad->price}} €</strong>  
                <p>{{__('ui.creadoPor')}}: {{$ad->user->name }}</p>
                <p>{{$ad->created_at->format('d/m/Y')}}</p>
            </div>
        </div>
    </div>
</div>

@endsection
