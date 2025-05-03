<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>profile</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
</head>

<body style="background-image: url('{{ asset('images/uo.jpg') }}');
            ;background-size: cover;
            ;background-position: center;
            ;background-attachment: fixed;
            ;background-repeat: no-repeat;
            position: fixed;">
    {{-- <i class="fa fa-cube"> --}}
    <nav class="navbar navbar-expand-xl navbar-dark bg-dark" style="height: 80px; width: 135%; " >
        <a href="{{ route('profile') }}" class="navbar-brand"> <img src="{{ asset('images/logo.png') }}"
                alt=""></i><b style="color: rgb(241, 236, 99)">Gestion </b> <b style="color: red"> Sall</b><b
                style="color: rgba(11, 234, 81, 0.899)">es</b></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">

            <div class="navbar-nav ml-auto">
                <a href="{{ route('profile') }}" class="nav-item nav-link active" style="color: black"><i
                        class="fa fa-home"></i><span>Acceuil</span></a>

                @can('view', App\Models\Demandes::class)
                    <a href="{{ route('total_demande') }}" class="nav-item nav-link active" style="color: black"><i
                            class="fa-solid fa-file"></i><span>les demandes</span></a>
                @endcan

                @can('view', App\Models\Salles::class)
                    <a href="{{ route('tableau_salles') }}" class="nav-item nav-link active" style="color: black"><i
                            class="fa-solid fa-landmark"></i><span>les salles</span></a>
                @endcan

                @can('viewAny',App\Models\User::class)
                    <a href="{{ route('tableau_de_bord') }}" class="nav-item nav-link active" style="color: black"><i
                                            class="fa-solid fa-user-graduate"></i><span>les utilisateurs</span></a>
                @endcan


                <a href="#" class="nav-item nav-link" style="color: black"><i class="fa fa-gears"></i><span>mes
                        infos</span></a>

                {{-- <a href="#" class="nav-item nav-link"><i class="fa fa-users"></i><span>Team</span></a> --}}

                <a href="{{ route('mes_demande') }}" class="nav-item nav-link" style="color: black"><i
                        class="fa fa-pie-chart" style="color: black"></i><span>Mes demandes</span></a>

                {{-- @php
    dd(auth()->user());
@endphp --}}
                {{-- <a href="#" class="nav-item nav-link"><i class="fa fa-briefcase"></i><span>Careers</span></a> --}}
                <a href="#" class="nav-item nav-link" style="color: black"><i class="fa fa-bell"><span
                            style="color: red">1</span></i><span>Notifications</span></a>
                {{-- photo de profile --}}
                <a href="#" class="nav-item nav-link" style="color: black"><i
                        class="fa-solid fa-circle-user avatar" style="font-size: 40px"></i></a>
                <div class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action"
                        style="color: black"> {{ Auth::user()->nom }} <b class="caret"></b></a>
                    <br>
                    {{-- <h5 class="nav-item" >{{ Auth::user()->cnib }}</h5> --}}
                    <div class="dropdown-menu">
                        {{-- <div class="px-4">
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div> --}}

                        <a href="{{ route('mesinfos') }}" class="dropdown-item"><i class="fa fa-calendar-o"></i> mes infos</a>
                        <a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> parametre</a>
                        <a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> parametre</a>
                        <div class="divider dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                            @csrf

                            <div class="deconnecter">
                                <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                    class="dropdown-item deconnecter">
                                    <i class="material-icons ">&#xE8AC;</i> Deconnexion
                                </x-responsive-nav-link>
                            </div>
                        </form>
                        {{-- <a href="#" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>
