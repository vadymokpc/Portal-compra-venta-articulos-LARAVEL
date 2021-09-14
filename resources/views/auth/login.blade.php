
@extends('layouts.app')
@section('content')
<!-- ======= FORM LOGIN ======= -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-8 d-flex flex-column align-items-center">
            <div class="form-content">
                <!--FORM TITLE -->
                <div class="section-title">
                    <h2 class="form-title space-around">LOGIN
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
                <form action="/login" method="POST" role="form" class="php-email-form">
                    @csrf
                    <!--Email -->
                    <div class="form-field form-field-edit space-around my-2">
                        <input type="email" name="email" id="email" class="form-control forms_field-input"
                            placeholder="Your Email" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                    </div>
                    <!--Password -->
                    <div class="form-field form-field-edit  space-around my-2">
                        <input type="password" name="password" id="password" class="form-control forms_field-input"
                            placeholder="Your Password">
                        <div class="validate"></div>
                    </div>
                    <!--Button-Login-->
                    <button type="submit" class=" form-button-edit text-center space-around my-2">
                        Log-In
                    </button>
                </form>
            </div>
            <div class="div form-link d-flex mt-4 ms-5 ps-5 ">
                <p class="text-white">¿You dont have an account? </p>
                <a class="text-reset text-decoration-none ms-2" href="{{route('register')}}"><u> Register here</u></a>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <img src="./media/bg-login.svg" alt="">
        </div>
    </div>
</div>
<div class="col-12 col-md-4 mt-5 pt-5">
    <p class="text-medium ">LOGIN</p>
</div>
</div>
</div>
@endsection