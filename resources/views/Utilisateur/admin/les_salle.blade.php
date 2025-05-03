@extends('layouts.navbaradmin')
@section('contenue')
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="{{ route('profile') }}"
            style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 30px;">
            <img src="{{ asset('images/logo.png') }}" width="30" height="30" alt="Logo"
                class="d-inline-block align-top">
            <b style="color: rgb(57, 209, 115)"> E.Gestion des Salles</b>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Boutons de navigation -->
            <ul class="navbar-nav mr-auto ml-4">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('profile') }}">Accueil</a>
                </li>

                <li class="nav-item">
                    @can('view', App\Models\Salles::class)
                        <a class="nav-link" href="{{ route('liste_salles_dipsonible') }}">Salles disponibles</a>
                    @endcan
                </li>

                <li class="nav-item">
                    @can('view', App\Models\Salles::class)
                        <a class="nav-link" href="{{ route('liste_salles_occupee') }}">Salles occupées</a>
                    @endcan

                </li>

                <li class="nav-item">
                    @can('view', App\Models\Salles::class)
                        <a class="nav-link" href="{{ route('liste_salles') }}">mes salles</a>
                    @endcan
                </li>

                <li class="nav-item">
                    @can('create', App\Models\Salles::class)
                        <a class="nav-link" href="{{ route('pages_salles') }}">Ajouter une salle</a>
                    @endcan
                </li>
                <li class="nav-item">
                    @can('create', App\Models\Demandes::class)
                        <a class="nav-link" href="{{ route('creer_demande') }}">Réservation</a>
                    @endcan

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>

            <!-- Menu Profil -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <h2
                            style="font-size: 12px;font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">
                            {{ Auth::user()->nom }}</h2>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menuDropdown">
                        <a class="dropdown-item" href="{{ route('profile') }}">Mon profil</a>
                        <a class="dropdown-item" href="#">Paramètres</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}">Déconnexion</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="background-color: white">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tableau</h1>
                    </div>
                    <div class="col-sm-6">

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content" style="transform: translate(-50px,150px)">
            <!-- Default box -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <div class="small-box card">
                            <div class="inner">
                                <h3>{{ $salles }}</h3>
                                <p>Toutes salles</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            @can('view', App\Models\Demandes::class)
                                <a href="{{ route('liste_salles') }}" class="small-box-footer text-dark">plus d'infos <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            @endcan

                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="small-box card">
                            <div class="inner">
                                <h3>{{ $nombreSallesOccupees }}</h3>
                                <p>Salles occupées</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('liste_salles_occupee') }}" class="small-box-footer text-dark">plus d'infos
                                <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="small-box card">
                            <div class="inner">
                                <h3>{{ $nombreSallesLibres }}</h3>
                                <p>Salles non occupées</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            @can('view', App\Models\Demandes::class)
                                <a href="{{ route('liste_salles_dipsonible') }}" class="small-box-footer text-dark">plus
                                    d'infos <i class="fas fa-arrow-circle-right"></i></a>
                            @endcan

                        </div>
                    </div>

                </div>
            </div>
    </div>
    <!-- /.card -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
