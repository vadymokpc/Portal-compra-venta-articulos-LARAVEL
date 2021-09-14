@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Nuevo Anuncio
                    <form method="POST" action='{{route("ad.create")}}'>
                        @csrf
                        <div class="form-group">
                            <label for="adName">Titulo</label>
                            <input type="text" class="form-control" id="adName" name="title" value="{{old('title')}}">

                            @error('title')
                            <small id="emailHelp" class="form-text" style="color:red;">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="adBody">Anuncio</label>
                            <textarea class="form-control" name="body" id="adBody" cols="30"
                                rows="10">{{old("body")}}</textarea>

                            @error('body')
                            <small id="emailHelp" class="form-text" style="color:red;">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
