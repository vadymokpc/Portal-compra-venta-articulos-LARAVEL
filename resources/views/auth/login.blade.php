@extends('layouts.app')
@section('content')
<!-- ======= FORM LOGIN ======= -->
<div class="container-fluid my-5 py-5 altura">
    <div class="row">
        <div class="col-12 d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <!--FORM TITLE -->
                    <h2 class="">LOGIN</h2>
                
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
                <form action="/login" method="POST" role="form" class="d-flex flex-column justify-content-center align-items-center">
                    @csrf
                    <!--Email -->
                    
                        <input type="email" name="email" id="email" class="form-control forms_field-input"
                            placeholder="Your Email" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        
                    
                    <!--Password -->
                    
                        <input type="password" name="password" id="password" class="form-control forms_field-input mt-2"
                            placeholder="Your Password">
                        
                    <!--Button-Login-->
                    <button type="submit" class=" text-center my-2">
                        Log-In
                    </button>
                </form>
            </div>
            <div class="form-link d-flex flex-column justify-content-center align-items-center ">
                <p class="text-white mb-0">¿No estás registrado? </p>
                <a class="text-reset text-decoration-none mt-0 ms-2 " href="{{route('register')}}"><u> ¡Registrate aqui!</u></a>
            </div>
        </div>
    </div>
</div>

</div>
</div>
@endsection