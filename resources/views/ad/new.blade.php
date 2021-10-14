@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="cardNuevoAnuncio">
                <div class="card-header">
                    <!-------------------------------------------------------Generar identificadores únicos (codigo secreto)--------------------------------------------------->
                    Nuevo Anuncio (Secret: {{$uniqueSecret}})
                    <!-------------------------------------------------------Generar identificadores únicos (codigo secreto)--------------------------------------------------->
                    <form method="POST" action='{{route("ad.create")}}'>
                        @csrf
                        <!-------------------------------------------------------Generar identificadores únicos (codigo secreto)--------------------------------------------------->
                        <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">
                        <!-------------------------------------------------------Generar identificadores únicos (codigo secreto)--------------------------------------------------->
                        <!-- ----------------------------------------------Titulo------------------------------------------------ -->
                        <div class="form-group">
                            <label for="adName">Titulo</label>
                            <input type="text" class="form-control" id="adName" name="title" value="{{old('title')}}">

                            @error('title')
                            <small id="emailHelp" class="form-text" style="color:red;">
                                {{ $message }}
                            </small>
                            @enderror
                            <!-- ----------------------------------------------Titulo------------------------------------------------ -->
                            <!-- ----------------------------------------------Precio------------------------------------------------ -->
                            <div class="form-group">
                                <label for="adPrice">Precio</label>
                                <input type="number" step="0.01" class="form-control" id="adPrice"
                                    aria-describedby="priceHelp" name="price" value="{{old("price")}}">
                                @error('price')
                                <small id="priceHelp" class="form-text" style="color:red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <!-- ----------------------------------------------Precio------------------------------------------------ -->

                            <!-- ----------------------------------------------Desplegabe de categorias------------------------------------------------ -->
                            <div class="form-group">
                                <label for="form-label" class="my-2">Categorias</label>
                                <select class="form-control" id="categories" name="category">
                                    @foreach($categories ?? '' as $category)
                                    <option value="{{$category->id}}"
                                        {{old('category') == $category->id ? 'selected' : ''}}>{{$category->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- ----------------------------------------------Desplegabe de categorias------------------------------------------------ -->
                        <!-- -------------------------------------------Dropzone imagenes--------------------------------------------------- -->
                        <div class="mb-3">
                            <label for="adImages" class="form-label">Imagenes</label>
                            <div class="dropzone" id="drophere"></div>
                            @error('images')
                            <small class="alert alert-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <!-- ------------------------------------------Dropzone imagenes---------------------------------------------------- -->

                        <!-- ----------------------------------------------Anuncio text area------------------------------------------------ -->
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
                        <!-- ----------------------------------------------Anuncio text area------------------------------------------------ -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection