        <!-- ---------------------------------------------Card home---------------------------------------------------------------------------------------------------------------------------------->
        @foreach($ads as $ad)

        <div class="col-12 col-md-3 ">
            <div class=" card mb-5 cardHome" style="width: ;">
                <!-- ---------------------------------------------Carussel de fotos---------------------------------------------------------------------------------------------------------------------------------->
                @foreach ($ad->images as $image)
                <div>
                    @if($loop->first)
                    <img src="{{$image->getUrl(300,350)}}" class=" d-block w-100" alt="...">
                    @endif
                </div>
                @endforeach
                <div class=" card-body d-flex flex-column justify-content-around">
                    <h5 class="card-title fs-5"> {{$ad->title}}</h5>
                    <h6 class="precioCard card-subtitle mb-2 fw-bold fs-4">{{$ad->price}} €</h6>
                    <div class="textoCard">
                        <p class="card-text"> {{substr($ad->body, 0, 100)}} ...</p>
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
                    <div class="detalle">
                        <a class="linkDetalle text-muted text-decoration-none d-flex justify-content-center"
                            href="{{route('ad.details', ['id'=>$ad->id])}}">Detalle</a>
                    </div>

                    <!---------------------------------------------Visualizar  "DETALLE" por cada tarjeta en vista Details ---------------------------------------------------------------------------->
                </div>
            </div>
        </div>
        <!-- ---------------------------------------------Carussel de fotos---------------------------------------------------------------------------------------------------------------------------------->
        <!-- ---------------------------------------------Titulo, Precio, Descripcion---------------------------------------------------------------------------------------------------------------------------------->
        @endforeach
        <!-- ---------------------------------------------Card home---------------------------------------------------------------------------------------------------------------------------------->