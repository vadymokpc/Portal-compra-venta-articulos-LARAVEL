@extends('layouts.app')  
@section('content')
<h1>hola</h1>
@if(session('ad.create.success'))     
<div class="alert alert-success">{{session('ad.create.success')}}</div>
 @endif
@endsection