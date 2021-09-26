        <!-- ---------------------------------------------Card home---------------------------------------------------------------------------------------------------------------------------------->
        @foreach($ads as $ad)
        <div class="col-12 col-md-3 d-flex justify-content-center">
            <div class="card mb-5 cardHome" style="width: 18rem;">
                <!-- ---------------------------------------------Carussel de fotos---------------------------------------------------------------------------------------------------------------------------------->
                @foreach ($ad->images as $image)
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner carouselImagen">

                        <div class="carousel-item @if($loop->first)active @endif">
                            <img src="{{$image->getUrl(300,350)}}" class=" d-block w-100" alt="...">
                        </div>

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
                @endforeach
                <!-- ---------------------------------------------Carussel de fotos---------------------------------------------------------------------------------------------------------------------------------->
                <!-- ---------------------------------------------Titulo, Precio, Descripcion---------------------------------------------------------------------------------------------------------------------------------->
                <div class="card-body">
                    <h5 class="card-title fs-5"> {{$ad->title}}</h5>
                    <h6 class="precioCard card-subtitle mb-2 fw-bold fs-4">{{$ad->price}} €</h6>
                    <div class="textoCard">
                        <p class="card-text"> {{$ad->body}}</p>
                    </div>
                    <h6 class="card-subtitle mb-2">
                        <!-- ---------------------------------------------Titulo, Precio, Descripcion---------------------------------------------------------------------------------------------------------------------------------->
                        <!-- -------------------------------------Visualizar  "categoria por cada tarjeta en home------------------------------------------------------------------------------------------------------------------------------------------>
                        <div class="nombreCategoria">
                            <strong>{{__('ui.categorie')}}: <a
                                    href="{{route('category.ads',['name'=>$ad->category->name,'id'=>$ad->category->id])}}">{{$ad->category->name}}</a></strong>
                        </div>
                        <!-- --------------------------------------Visualizar  "categoria por cada tarjeta en home----------------------------------------------------------------------------------------------------------------------------------------->
                        <!-- --------------------------------------Formato de fecha y hora ordenado  , Visualizar el nombre del user creador del anuncio----------------------------------------------------------------------------------------------------------------------------------------->
                        <div class="nombreUser">
                            <i>{{$ad->created_at->format('d/m/Y')}} - {{ $ad->user->name }}</i>
                        </div>
                    </h6>
                    <!-- ------------------------------------------Formato de fecha y hora ordenado  , Visualizar el nombre del user creador del anuncio------------------------------------------------------------------------------------------------------------------------------------>
                    <!---------------------------------------------Visualizar  "DETALLE" por cada tarjeta en vista Details ---------------------------------------------------------------------------->
                    <div class="linkDetalle">
                        <a href="{{route('ad.details', ['id'=>$ad->id])}}">Detalle</a>
                    </div>
                    <!---------------------------------------------Visualizar  "DETALLE" por cada tarjeta en vista Details ---------------------------------------------------------------------------->
                </div>
            </div>
        </div>
        @endforeach
        <!-- ---------------------------------------------Card home---------------------------------------------------------------------------------------------------------------------------------->