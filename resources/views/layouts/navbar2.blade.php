<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'profile') </title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="@yield('csss','{{ asset("css/profile.css") }}')">
    <link rel="icon" type="image/png" href="images/logo.png" />
</head>

<body>
    {{-- <i class="fa fa-cube"> --}}
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
        <a href="{{ route('profile') }}" class="navbar-brand"> <img src="{{ asset('images/logo.png') }}"
                alt=""></i>gestion<b> salles</b></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <form class="navbar-form form-inline">
                <div class="input-group search-box">
                    <input type="text" id="search" class="form-control" placeholder="Search here...">
                    <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                </div>
            </form>
            <div class="navbar-nav ml-auto">
                <a href="{{ route('Accueil') }}" class="nav-item nav-link active"><i
                        class="fa fa-home"></i><span>Acceuil</span></a>
                <a href="{{ route('profile.edit') }}" class="nav-item nav-link"><i class="fa fa-gears"></i><span>paramétre</span></a>
                {{-- <a href="#" class="nav-item nav-link"><i class="fa fa-users"></i><span>Team</span></a> --}}
                {{-- <a href="{{ route('mes_demande') }}" class="nav-item nav-link"><i class="fa fa-pie-chart"></i><span>Mes demandes</span></a> --}}
                {{-- <a href="#" class="nav-item nav-link"><i class="fa fa-briefcase"></i><span>Careers</span></a> --}}
                {{-- <a href="#" class="nav-item nav-link"><i class="fa fa-envelope"></i><span>Messages</span></a>
                <a href="#" class="nav-item nav-link"><i class="fa fa-bell"></i><span>Notifications</span></a> --}}

            </div>
        </div>
        </div>
    </nav>

    <div class="infos">
        @yield('infos')
    </div>

</body>

</html>
