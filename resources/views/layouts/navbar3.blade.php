<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('titre','mes demandes')</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Raleway">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="images/logo.png"/>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/salles/salle.css') }}">
    @yield('liens')
    <style>

    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#"><b style="color: rgb(11, 159, 63);font-size: 30px">Gestion</b> <b
                style="color:rgb(11, 159, 63);font-size: 30px"> Sall</b><b style="color: rgb(11, 159, 63);font-size: 30px">es</b></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <div class="navbar-nav">
                <a href="{{ route('profile') }}"class="nav-item nav-link">Acceuil</a>
                @yield('elements')

                <a href="#" class="nav-item nav-link">Contact</a>
            </div>
            <div class="navbar-nav ml-auto">
                <div class="navbar-form-wrapper">
                    <form class="navbar-form form-inline">
                        <div class="input-group search-box">
                            <input type="text" id="search" class="form-control" placeholder="Search Here...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="material-icons">&#xE8B6;</i>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </nav>
    <div>
        @yield('contenu')
    </div>
</body>

</html>
