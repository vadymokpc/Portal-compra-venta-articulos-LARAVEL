@extends('layouts.app')
@section('content')
<!-- ------------------------------------------------------Home del revisor---------------------------------------------------->
@if ($ad)
<div class='container my-5 py-5'>
    <div class='row'>
        <div class='col-12'>
            <div class="card">
                <div class="card-header">
                    Anuncio {{$ad->id}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <h3>Usuario</h3>
                        </div>
                        <div class="col-md-9">
                            {{$ad->user->id}}
                            {{$ad->user->name}}
                            {{$ad->user->email}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h3>Titulo</h3>
                        </div>
                        <div class="col-md-9">
                            {{$ad->title}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <h3>Descripción</h3>
                        </div>
                        <!-- ---------------------------------------Visualización de la imagen subida por un usuario---------------------------------------->
                        @foreach ($ad->images as $image)
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <img src="{{$image->getUrl(300,350)}}" class="img-fluid" alt="">
                            </div>
                            <!-- ---------------------------------------7---------------------------------------->
                            <div class="col-md-8">
                                Adult : {{ $image->adult}} <br>
                                spoof : {{ $image->spoof}} <br>
                                medical : {{ $image->medical}} <br>
                                violence : {{ $image->violence}} <br>
                                racy : {{ $image->racy}} <br>
                                {{ $image->id}} <br>
                                {{ $image->file}} <br>
                                {{ Storage:: url($image->file)}} <br>
                            </div>
                            <!-- ---------------------------------------7---------------------------------------->
                        </div>
                        @endforeach
                        <!-- ---------------------------------------Visualización de la imagen subida por un usuario---------------------------------------->
                        <div class="col-md-9 justify-content-center">
                            {{$ad->body}}
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6">

            <form action="{{route('revisor.ad.accept',['id'=>$ad->id])}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Aceptar</button>
            </form>

        </div>

        <div class="col-md-6 text-right">
            <form action="{{route('revisor.ad.reject',['id'=>$ad->id])}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Rechazar</button>
            </form>
        </div>
    </div>
</div>

@else
<h3 class="text-center">{{__('ui.checkrevisor')}}</h3>

@endif

<!-- ------------------------------------------------------Home del revisor---------------------------------------------------->
@endsection