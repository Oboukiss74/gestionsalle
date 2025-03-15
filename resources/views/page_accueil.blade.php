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

        <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;300;400;600;700&display=swap" rel="stylesheet">

        <link href="css2/bootstrap.min.css" rel="stylesheet">

        <link href="css2/bootstrap-icons.css" rel="stylesheet">

        <link href="css2/owl.carousel.min.css" rel="stylesheet">

        <link href="css2/tooplate-moso-interior.css" rel="stylesheet">

        <link rel="icon" type="image/png" href="images/logo.png"/>

<!--

Tooplate 2133 Moso Interior

https://www.tooplate.com/view/2133-moso-interior

Bootstrap 5 HTML CSS Template

-->
    </head>

    <body>

        <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html">Gestion <span class="tooplate-red">Sall</span><span class="tooplate-green">es</span></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ route('Accueil') }}">Accueil</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">A propos</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link click-scroll" href="{{ route('register') }}" >S'incrire</a>

                            {{-- <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{route('etudiant_inscrit')}}">Etudiant</a></li>

                                <li><a class="dropdown-item" href="{{Route('inscrit_personnel')}}">Personnels</a></li>
                                <li><a class="dropdown-item" href="{{route('etudiant_inscrit')}}">Locataire</a></li>
                                <li><a class="dropdown-item" href="{{route('inscrit_publics')}}">public</a></li>
                            </ul> --}}
                        </li>


                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{route('profiles')}}">Se connecter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_5">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
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
                                <small class="section-small-title" style="font-family: Arial, Helvetica, sans-serif">Gestion des salles<i class="hero-icon bi-house"></i></small>

                                <h1 class="hero-title text-white mt-2 mb-4">Université Pr Joseph Ki Zerbo</h1>

                            </div>
                        </div>

                    </div>
                </div>
            </section>

         </main>

        {{-- <footer class="site-footer section-padding">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-5 col-12 mb-3">
                        <h3><a href="index.html" class="custom-link mb-1">Moso Interior</a></h3>

                        <p class="text-white">Since 1986, We crafted interior products for better spaces</p>

                        <p class="text-white"><a href="https://www.tooplate.com" target="_parent">Web Design: Tooplate</a></p>
                    </div>

                    <div class="col-lg-3 col-md-3 col-12 ms-lg-auto mb-3">
                        <h3 class="text-white mb-3">Store</h3>

                        <p class="text-white mt-2">
                            <i class="bi-geo-alt"></i>
                            Berlin, Germany
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-4 col-12 mb-3">
                        <h3 class="text-white mb-3">Contact Info</h3>

                            <p class="text-white mb-1">
                                <i class="bi-telephone me-1"></i>

                                <a href="tel: 090-080-0760" class="text-white">
                                    090-080-0760
                                </a>
                            </p>

                            <p class="text-white mb-0">
                                <i class="bi-envelope me-1"></i>

                                <a href="mailto:info@company.com" class="text-white">
                                    info@company.com
                                </a>
                            </p>
                    </div>

                    <div class="col-lg-6 col-md-7 copyright-text-wrap col-12 d-flex flex-wrap align-items-center mt-4 ms-auto">
                        <p class="copyright-text mb-0 me-4">Copyright © Moso Interior 2048</p>

                        <ul class="social-icon">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link social-icon-twitter bi-twitter"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link social-icon-facebook bi-facebook"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link social-icon-instagram bi-instagram"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link social-icon-pinterest bi-pinterest"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link social-icon-whatsapp bi-whatsapp"></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </footer> --}}

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/click-scroll.js"></script>
        <script src="js/jquery.backstretch.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>
