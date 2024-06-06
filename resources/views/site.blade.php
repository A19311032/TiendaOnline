<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Landing Page - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
                <a class="navbar-brand" href="#!">Bienvenido al Surtidito Feliz</a>
                <a class="btn btn-primary" href="{{route('venta')}}">Registrate</a>
            </div>
        </nav>
        <!-- Masthead-->
        <!-- Image Showcases-->
        <section class="showcase">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-6 text-white showcase-img" style="background-image: url('{{asset('img/surfel.jpg')}}')"></div>
                    <div class="col-lg-6 text-white showcase-img" style="background-image: url('{{asset('img/surfel.jpg')}}')"></div>
                </div>
            </div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-6 text-white showcase-img" style="background-image: url('{{asset('img/surfel.jpg')}}')"></div>
                    <div class="col-lg-6 text-white showcase-img" style="background-image: url('{{asset('img/surfel.jpg')}}')"></div>
                </div>
            </div>
        </section>
        
        <!-- Footer-->
        <footer class="footer bg-light">
            
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
