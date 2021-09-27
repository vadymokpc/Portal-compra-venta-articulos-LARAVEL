@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row rowDetalles">
        <div class="col-12 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <h1 class="text-center my-card-title">{{$ad->title}}</h1>
            <p>{{$ad->body}}</p>
            <div>
                <strong class="card-subtitle mb-2">{{__('Precio')}}: {{$ad->price}} €</strong>
                <p>{{__('ui.createdby')}}: {{$ad->user->name }}</p>
                <p>{{$ad->created_at->format('d/m/Y')}}</p>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <!-- -------------------------------------------Detalle carussel------------------------------------------------------------------------------------------------------------------------------------>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner carouselEstilo">
                    @foreach ($ad->images as $image)
                    <div class="carousel-item @if($loop->first)active @endif">
                        <img src="{{$image->getUrl(500,500)}}"" class=" d-block w-100" alt="...">
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <!-- -------------------------------------------Detalle carussel------------------------------------------------------------------------------------------------------------------------------------>
            <strong class="footer-dcho">{{__('ui.categories')}}:<a
                    href="{{route('category.ads',['name'=>$ad->category->name,'id'=>$ad->category->id])}}">
                    {{$ad->category->name}}</a></strong>
        </div>

    </div>
</div>

@endsection