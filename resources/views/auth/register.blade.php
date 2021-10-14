@extends('layouts.app')
@section('content')
<!-- ======= REGISTER ======= -->
<div class="container-fluid my-5 py-5 altura">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-column align-items-center ">
                <!--FORM TITLE -->
                <h2>REGISTRARSE</h2>

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
                <form action="/register" method="POST" role="form"
                    class="d-flex flex-column justify-content-center align-items-center">
                    @csrf
                    <!--Name -->

                    <input type="text" name="name" id="name" class="form-control forms_field-input" placeholder="Nombre"
                        data-rule="minlen:4" data-msg="Please enter at least 4 chars">

                    <!--Email -->

                    <input type="email" name="email" id="email" class="form-control forms_field-input mt-1"
                        placeholder="Email" data-rule="minlen:4" data-msg="Please enter at least 4 chars">

                    <!--Password -->

                    <input type="password" name="password" id="password" class="form-control forms_field-input mt-1"
                        placeholder="Contraseña">

                    <!--Password Confirmation -->

                    <input type="password" name="password_confirmation" id="password"
                        class="form-control forms_field-input mt-1" placeholder="Contraseña">

                    <!--Button-Register-->
                    <div class="align-items-center my-2">
                        <button class="boton" href="#">
                            Register
                        </button>
                    </div>
                </form>
            </div>
            <div class="d-flex flex-column justify-content-center align-items-center">
                <p class="text-dark mb-0">¿Ya tienes una cuenta?</p>
                <a class="text-reset text-decoration-none mt-0" href="{{route('login')}}"><u>Inicia sesión aquí</u></a>
            </div>


        </div>
    </div>
    </section>
    @endsection