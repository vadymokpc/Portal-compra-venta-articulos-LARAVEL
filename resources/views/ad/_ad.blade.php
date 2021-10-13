        <!-- ---------------------------------------------Card home---------------------------------------------------------------------------------------------------------------------------------->
        @foreach($ads as $ad)

        <div class="col-12 col-md-3 ">
            <div class="card mb-5 cardHome" style="width: ;">
                <!-- ---------------------------------------------Carussel de fotos---------------------------------------------------------------------------------------------------------------------------------->
                @foreach ($ad->images as $image)
                <div>
                    @if($loop->first)
                    <img src="{{$image->getUrl(300,350)}}" class=" d-block w-100" alt="...">
                    @endif
                </div>
                @endforeach
                <div class=" card-body d-flex flex-column justify-content-around">
                    <h6 class="precioCard card-subtitle mb-2 fw-bold fs-4">{{$ad->price}} €</h6>
                    <h5 class="card-title fs-5"> {{$ad->title}}</h5>
                    <div class="textoCard">
                        <p class="card-text"> {{substr($ad->body, 0, 100)}} ...</p>
                    </div>
                    <h6 class="card-subtitle mb-2">
                        <!-- ---------------------------------------------Titulo, Precio, Descripcion---------------------------------------------------------------------------------------------------------------------------------->
                        <!---------------------------------------------Visualizar  "DETALLE" por cada tarjeta en vista Details ---------------------------------------------------------------------------->
                        <div class="detalle">
                            <a class="linkDetalle  text-decoration-none d-flex justify-content-center"
                                href="{{route('ad.details', ['id'=>$ad->id])}}">Detalle</a>
                        </div>

                        <!---------------------------------------------Visualizar  "DETALLE" por cada tarjeta en vista Details ---------------------------------------------------------------------------->
                </div>
            </div>
        </div>
        <!-- ---------------------------------------------Titulo, Precio, Descripcion---------------------------------------------------------------------------------------------------------------------------------->
        @endforeach
        <!-- ---------------------------------------------Card home---------------------------------------------------------------------------------------------------------------------------------->