@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Resultados de la búsqueda: {{ $q }}</h1>
        </div>
        @include('ad._ad')
    </div>
</div>
@endsection