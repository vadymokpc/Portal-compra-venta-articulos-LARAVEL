@extends('layouts.app')  
@section('content')
<!-- --------------------------------Alert "Anuncio creado con exito"------------------------------ -->
@if(session('ad.create.success'))     
<div class="alert alert-success">{{session('ad.create.success')}}</div>
 @endif
<!-- --------------------------------Alert "Anuncio creado con exito"------------------------------ -->
<h1>home</h1>
@endsection