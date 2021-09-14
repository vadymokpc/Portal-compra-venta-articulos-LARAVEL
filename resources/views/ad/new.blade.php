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
                            <div class="form-group text-bold me-5  ms-5">
                                <label for="form-label" class="my-2">Categorias</label>
                                <select class="form-control" id="categories" name="category">
                                    @foreach($categories ?? '' as $category)
                                    <option value="{{$category->id}}"
                                        {{old('category') == $category->id ? 'selected' : ''}}>{{$category->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- ----------------------------------------------Desplegabe de categorias------------------------------------------------ -->

                        </div>
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
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
