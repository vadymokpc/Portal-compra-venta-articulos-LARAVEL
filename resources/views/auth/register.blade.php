
@extends('layouts.app')  
@section('content') 
<!-- ======= REGISTER ======= -->
<div class="container-fluid bg-accent vh-100">
       <div class="row mb-5 pb-5">
            <div class="col-12 col-md-8 ms-5">
                <div class="d-flex flex-column align-items-center ">
                <div class="form-content justify-content-center mb-5 pb-5">
                    <!--FORM TITLE -->
                    <div class="section-title">
                        <h2 class="form-title space-around">REGISTER
                            <!-- <span> Rapido.es</span> -->
                        </h2>
                        <!-- <p>Ut possimus qui ut temporibus culpa velit autem.</p> -->
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <!--FORM FIELDS -->
                    <form action="/register" method="POST" role="form" class="php-email-form">
                        @csrf
                        <!--Name -->
                        <div class="form-field-edit form-field space-around my-2">
                          <input type="text" name="name" id="name" class="form-control forms_field-input" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                          <div class="validate"></div>
                        </div>
                        <!--Email -->
                        <div class="form-field-edit form-field space-around my-2">
                            <input type="email" name="email" id="email" class="form-control forms_field-input"
                                placeholder="Your Email" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                            <div class="validate"></div>
                        </div>
                        <!--Password -->
                        <div class="form-field-edit form-field space-around my-2">
                            <input type="password" name="password" id="password" class="form-control forms_field-input"
                                placeholder="Your Password">
                            <div class="validate"></div>
                        </div>
                         <!--Password Confirmation -->
                         <div class="form-field-edit form-field space-around my-2">
                            <input type="password" name="password_confirmation" id="password" class="form-control forms_field-input"
                                placeholder="Your Password">
                            <div class="validate"></div>
                        </div>
                        <!--Button-Register-->
                        <button type="submit" class=" form-button-edit text-center space-around my-2">
                            Register
                        </button>
                    </form>
                </div>
                <div class="form-link mt-4 d-flex">
                <p class="text-white">You dont have an account</p>
                <a class="text-reset text-decoration-none ps-2" href="{{route('login')}}"><u>Login here</u></a>
                </div>
            </div>
            <div class="col-12 col-md-4">
               <p>lorem</p>
            </div>
        </div>
    </div>
</section>
@endsection