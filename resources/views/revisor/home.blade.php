
@extends('layouts.app')
@section('content')
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
                      <div class="col-md-9">
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
      <form action="{{route('revisor.ad.reject',['id'=>$ad->id])}}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger">Rechazar</button>
      </form>
      </div>
      <div class="col-md-6 text-right">
          <form action="{{route('revisor.ad.accept',['id'=>$ad->id])}}" method="POST">
              @csrf
              <button type="submit" class="btn btn-success">Aceptar</button>
          </form>
      </div>
  </div>
</div>

@else 
  <h3 class="text-center"> no hay anuncios para revisar </h3> 

@endif
@endsection