@extends('layouts.navbaradmin')

@section('contenue')
    <!-- /.navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        @can('view', App\Models\Demandes::class)
            <a class="navbar-brand" href="{{ route('total_demande') }}">
                <img src="{{ asset('images/logo.png') }}" width="30" height="30" alt="Logo"
                    class="d-inline-block align-top">
                Gestion des Salles
            </a>
        @endcan

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">

            <!-- Boutons de navigation -->
            <ul class="navbar-nav mr-auto ml-4">
                <li class="nav-item active">
                    @can('view', App\Models\Demandes::class)
                        <a class="nav-link" href="{{ route('total_demande') }}">Accueil</a>
                    @endcan

                </li>
                <!-- Dropdown Demandes -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="demandeDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Demandes <i class="fa fa-list mr-1"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="demandeDropdown">
                        @can('view', App\Models\Demandes::class)
                            <a class="dropdown-item" href="{{ route('liste_demande') }}">Liste des demandes</a>
                        @endcan

                        <a class="dropdown-item" href="{{ route('pagedemandes') }}">Faire une demande</a>

                        @can('view', App\Models\Demandes::class)
                            <a class="dropdown-item" href="{{ route('liste_demandeencour') }}">demande en cours</a>
                        @endcan

                        @can('view', App\Models\Demandes::class)
                            <a class="dropdown-item" href="{{ route('demandevalidee') }}">demande validée</a>
                        @endcan

                        @can('view', $demandes)
                            <a class="dropdown-item" href="{{ route('liste_demanderefusee') }}">demande refusée</a>
                        @endcan
                    </div>
                </li>
                <li class="nav-item">
                    @can('viewAny', App\Models\Salles::class)
                        <a class="nav-link" href="{{ route('tableau_salles') }}">Salles</a>
                    @endcan

                </li>
                <li class="nav-item">
                    @can('view', App\Models\Demandes::class)
                        <a class="nav-link" href="{{ route('liste_demande') }}">Les demandes</a>
                    @endcan

                </li>
                <li class="nav-item">
                    @can('create', App\Models\Demandes::class)
                        <a class="nav-link" href="{{ route('creer_demande') }}">Réservations</a>
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
    <!-- Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>
                            @can('view', App\Models\Demandes::class)
                                <a href="{{ route('liste_demande') }}"> Traiter les demandes</a>
                            @endcan
                        </h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        @can('create', App\Models\Demandes::class)
                            <a href="{{ route('creer_demande') }}" class="btn btn-primary">Nouvelle demande</a>
                        @endcan

                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <div class="input-group input-group" style="width: 250px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th width="60">ID</th>
                                    <th>Demandeur</th>
                                    <th>Telephone</th>
                                    <th>Date de debut</th>
                                    <th>Date de fin</th>
                                    <th>Heure de debut</th>
                                    <th>Heure de fin</th>
                                    <th>Motif</th>
                                    <th width="100">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($demandes as $demande)
                                    <tr>
                                        <td>{{ $demande->id }}</td>

                                        <td><a href="#">{{ $demande->nom }}</a></td>
                                        <td>{{ $demande->telephone }}</td>
                                        <td>{{ $demande->datedebut }}</td>
                                        <td>{{ $demande->datefin }}</td>
                                        <td>{{ $demande->heuredebut }}</td>
                                        <td>{{ $demande->heurefin }}</td>
                                        <td>{{ $demande->motif }}</td>
                                        <td>
                                            <a href="#">
                                                <svg class="filament-link-icon w-4 h-4 mr-1"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <a href="{{ route('demandesupprimer', $demande->id) }}"
                                                class="text-danger w-4 h-4 mr-1">
                                                <svg wire:loading.remove.delay="" wire:target=""
                                                    class="filament-link-icon w-4 h-4 mr-1"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path ath fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix" style="transform: translate(80%,25px)">
                        {{-- <div class="hint-text">{{ $demande->id }} <b>sur</b> {{ $demande->id }}</b> entrées</div> --}}
                        <ul class="pagination">
                            <!-- Bouton "Précédent" -->
                            @if ($demandes->onFirstPage())
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">Précédent</a>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $demandes->previousPageUrl() }}">Précédent</a>
                                </li>
                            @endif

                            <!-- Liens de pagination -->
                            @foreach ($demandes->getUrlRange(1, $demandes->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $demandes->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            <!-- Bouton "Suivant" -->
                            @if ($demandes->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $demandes->nextPageUrl() }}">Suivant</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">Suivant</a>
                                </li>
                            @endif
                        </ul>

                    </div>
                    <div class="clearfix" style="transform: translate(15px,-8px)">
                        <div class="hint-text">{{ $demandes->lastItem() }} <b>sur</b> {{ $nombredemandes }} </div>

                    </div>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">

        <strong>Gestion et localisation &copy; des salles de l'université Joseph Ki-Zerbo.
    </footer>
@endsection
