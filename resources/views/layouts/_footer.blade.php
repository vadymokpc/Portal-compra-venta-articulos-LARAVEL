<!-- Footer -->
<footer class="text-center text-lg-start bg-white bg-opacity-25 text-muted mt-5">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-center p-4 border-bottom">
        <!-- Left -->
        <div class="me-5 d-none d-lg-block">
            <span>{{__('ui.conecta')}}</span>
        </div>
        <!-- Left -->

        <!-- Right -->
        <div>
            <a href="https://www.facebook.com" class="me-4 text-reset">
                <i class="fab fa-facebook-square"></i>
            </a>
            <a href="https://twitter.com/?lang=es" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://google.es" class="me-4 text-reset">
                <i class="fab fa-google"></i>
            </a>
            <a href="https://instagram.com" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://www.linkedin.com/in/vadym-ostapchuk-06b86721b/" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="https://github.com/vadymokpc" class="me-4 text-reset">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Rápido.es
                    </h6>
                    <p>
                        {{__('ui.vende')}}
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-5 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        {{__('ui.categories')}}
                    </h6>
                    <div class="mover d-flex flex-wrap justify-content-between">
                        @foreach ($categories as $category)

                        <a class="my-category text-muted text-decoration-none"
                            href="{{route('category.ads',['name'=>$category->name,'id'=>$category->id])}}">{{$category->name}}</a>


                        @endforeach
                    </div>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->

                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        {{__('ui.contacta')}}
                    </h6>
                    <p><i class="fas fa-home me-3"></i> Barcelona</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        vadimokpc@gmail.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> 697851024</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        {{__('ui.copyright')}}
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Rápido.es</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->