<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="Tooplate">

    <title>Gestion des salles</title>

    <!-- CSS FILES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap"
        rel="stylesheet">

    <link href="css2/bootstrap.min.css" rel="stylesheet">

    <link href="css2/bootstrap-icons.css" rel="stylesheet">

    <link href="css2/owl.carousel.min.css" rel="stylesheet">

    <link href="css2/tooplate-moso-interior.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="images/logo.png" />

    <!--

Tooplate 2133 Moso Interior

https://www.tooplate.com/view/2133-moso-interior

Bootstrap 5 HTML CSS Template

-->
</head>

<body>

    @include('layouts.navebar')

    @if (session()->has(session('success')))
        <h1>
            {{ session('success') }}
        </h1>
    @endif
    <main>

        <section class="hero-section hero-slide d-flex justify-content-center align-items-center" id="section_1">
            <div class="container">
                <div class="row">

                    <div class="col-lg-8 col-12 text-center mx-auto">
                        <img src="images/slideshow/ujkz.jpg" alt="ujkz" style="border-radius: 00px">
                        <div class="hero-section-text">
                            <small class="section-small-title"
                                style="font-family: Arial, Helvetica, sans-serif">gs.ujkz<i
                                    class="hero-icon bi-house"></i></small>

                            <h1 class="hero-title text-white mt-2 mb-4">Université Pr Joseph Ki Zerbo</h1>

                        </div>
                    </div>

                </div>
            </div>
        </section>


    </main>


    <!-- JAVASCRIPT FILES -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/click-scroll.js"></script>
    <script src="js/jquery.backstretch.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/custom.js"></script>

</body>

</html>
