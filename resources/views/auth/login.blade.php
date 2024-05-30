@extends('layouts.app')

@section('content')
<!----------------------------------------------------->

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>El Surtido Feliz - Inicio de Sesión</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9" >

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf



                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image" >
                                    <!-- Carousel -->
                                    <div id="demo" class="carousel" data-bs-ride="carousel">

                                        <!-- Indicators/dots -->
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#demo" data-bs-slide-to="0"
                                                class="active"></button>
                                            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                                            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                                        </div>

                                        <!-- The slideshow/carousel -->
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img src="{{asset('img/testimonials-1.jpg')}}" alt="Los Angeles"
                                                    class="d-block flex-image">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{asset('img/testimonials-2.jpg')}}" alt="Chicago"
                                                    class="d-block flex-image">
                                            </div>
                                            <div class="carousel-item">
                                                <img src="{{asset('img/testimonials-3.jpg')}}" alt="New York"
                                                    class="d-block flex-image">
                                            </div>
                                        </div>

                                        <!-- Left and right controls/icons -->
                                        <button class="carousel-control-prev" type="button" data-bs-target="#demo"
                                            data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon"></span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#demo"
                                            data-bs-slide="next">
                                            <span class="carousel-control-next-icon"></span>
                                        </button>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="px-5 py-2">
                                        <!-- <div>
                                            <a class="d-flex align-items-center justify-content-center"
                                                href="">
                                                <img src="{{asset('img/navbar.png')}}" class="img-fluid" width="50px"
                                                    height="50px" alt="">
                                            </a>
                                        </div> -->
                                        <div class="d-flex align-items-center justify-content-center ">
                                            <img height="200" src="{{asset('img/surfel.jpg')}}" alt="Los Angeles"
                                                class="d-block">
                                        </div>
                                        <form class="user">

                                            <div class="form-group">
                                                <label for="email"
                                                    class="col-md-4 col-form-label ">{{ __('Email Address') }}</label>

                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                                    name="email" value="{{ old('email') }}" aria-describedby="emailHelp"
                                                    placeholder="Enter Email Address..." required autocomplete="email"
                                                    autofocus>

                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>


                                            <div class="form-group">

                                                <label for="password"
                                                    class="col-md-4 col-form-label ">{{ __('Password') }}</label>


                                                <input type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" placeholder="Password" name="password" required
                                                    autocomplete="current-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6 offset-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember"
                                                            id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                        <label class="form-check-label" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>
                                            <!-- <hr> -->
                                            <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                                <i class="fab fa-google fa-fw"></i> Login with Google
                                            </a>
                                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                                <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                            </a> -->
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            @if (Route::has('password.request'))
                                            <a class="small" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        </div>
                                        @endif
                                        <div class="text-center">
                                            <a class="small" href="register.html">Create an Account!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
@endsection