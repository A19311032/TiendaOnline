@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  
    <style>
        .center-text {
            text-align: center;
        }

        .no-bg {
            background: none;
        }
        hr {
            border: 2px solid #4E73DE;
            margin-top: 0px; 
            margin-bottom: 20px; 
        }
        .btn-custom-color {
            background-color: #4E73DE; 
            color: white;
        }
        .card{
            background-color: #fff;
            width: 100%;
            border: 0px ;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            margin-bottom: 10px;
            
        }
    </style>
    <!---Fin de Style--->

    <div class="container" >
    <div class="row justify-content-center">
        <div class="col-md-6" style="margin-top: 50px">
            <div class="card" stlye="box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                <div class="container" style="text-align: center; padding: 10px; background-color: #4E73DE; border-radius: 10px 10px 0 0"><img src="{{ asset('/images/surfel_bg.png') }}" style="width: 90px"></div>   
                <div class="card-body" style="text-align: center;">
                        <h3 class="card-header text-center no-bg">Iniciar Sesion</h3>
                        <!-- Session Status -->

                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <br>
                            <!-- Email Address -->
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electronico</label>
                                <div class="col-md-6">
                                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                    
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group row" style="margin-top: 10px">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                                <div class="col-md-6">
                                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                                </div>
                            </div>

                            <div class="form-group text-center" style="margin-top: 10px">
                                <button type="submit" class="btn btn-primary btn-custom-color">
                                    Ingresar
                                </button>
                            </div>
                            <div class="form-group text-center" style="margin-top: 20px">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="text-decoration: none; color: gray; font-size: 15px">
                                        ¿Olvidaste tu contraseña?
                                    </a>
                                @endif
                            </div>
                            <!-- Registration Button -->
                            <div class="form-group text-center">
                                <a class="btn btn-link" href="{{ route('register') }}" style="text-decoration: none; color: gray; font-size: 15px">
                                    Registrarse
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
