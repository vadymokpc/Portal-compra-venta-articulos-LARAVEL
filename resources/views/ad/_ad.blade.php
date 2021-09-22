            @foreach($ads as $ad)
            <div class="col-12 col-md-4 d-flex justify-content-center">
                <div class="card mb-5" style="width: 18rem;">
                    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($ad->images as $image)
                            <div class="carousel-item @if($loop->first)active @endif">
                                <img src="{{Storage::url($image->file)}}"" class=" d-block w-100" alt="...">
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

                    <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

                    <div class="card-body">
                        <h5 class="card-title"> {{$ad->title}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$ad->price}}</h6>
                        <p class="card-text"> {{$ad->body}}</p>
                        <h6 class="card-subtitle mb-2">
                            <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <!-- Visualizar  "categoria por cada tarjeta en home -->
                            <strong>Categoria: <a
                                    href="{{route('category.ads',['name'=>$ad->category->name,'id'=>$ad->category->id])}}">{{$ad->category->name}}</a></strong>
                            <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                            <!-- Formato de fecha y hora ordenado    , Visualizar el nombre del user creador del anuncio-->
                            <i>{{$ad->created_at->format('d/m/Y')}} - {{ $ad->user->name }}</i>
                        </h6>
                        <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
                        <!--Visualizar  "DETALLE" por cada tarjeta en vista Details -->
                        <a href="{{route('ad.details', ['id'=>$ad->id])}}">Leer más</a>
                        <br>
                        <a href="#" class="card-link">Link</a>
                        <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
                    </div>
                </div>
            </div>
            @endforeach