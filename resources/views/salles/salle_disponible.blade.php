@section('lien')
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/salles/salle_dispo.css') }}">
@endsection

@extends('layouts.navbaradmin')



@section('body')
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
                    <a class="nav-link" href="{{ route('profile') }}">Retour</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('profile') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    @can('view', App\Models\Salles::class)
                        <a class="nav-link" href="{{ route('liste_salles_dipsonible') }}">Salles libre</a>
                    @endcan

                </li>
                <li class="nav-item">
                    @can('view', App\Models\Salles::class)
                        <a class="nav-link" href="{{ route('liste_salles_occupee') }}">Salles occupées</a>
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

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title" style="width: auto">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2>Liste <b>des Salles</b></h2>
                        </div>
                        <div class="row" style="flex-direction: column; width: 50%; ">
                            <div class="col-sm-8">
                                <a href="{{ route('pages_salles') }}" class="btn btn-primary">
                                    Ajouter Salles</a>

                            </div>
                            <div class="col-sm-8">
                                <a href="#" class="btn btn-primary"><i class="material-icons">&#xE863;</i>
                                    <span>rafraichire</span></a>
                                {{-- <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i>
                                <span>Export to Excel</span></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-filter">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="show-entries">
                                <span>choix</span>
                                <select class="form-control">
                                    <option>2</option>

                                </select>
                                <span>entré</span>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            <div class="filter-group">
                                <label>Nom</label>
                                <input type="text" class="form-control">
                            </div>
                            {{-- <div class="filter-group">
                                <label>Location</label>
                                <select class="form-control">
                                    <option>All</option>
                                    <option>Berlin</option>
                                    <option>London</option>
                                    <option>Madrid</option>
                                    <option>New York</option>
                                    <option>Paris</option>
                                </select>
                            </div>
                            <div class="filter-group">
                                <label>Status</label>
                                <select class="form-control">
                                    <option>Any</option>
                                    <option>Delivered</option>
                                    <option>Shipped</option>
                                    <option>Pending</option>
                                    <option>Cancelled</option>
                                </select>
                            </div> --}}
                            <span class="filter-icon"><i class="fa fa-filter"></i></span>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom</th>
                            <th>nombre de place</th>
                            <th>statut</th>
                            <th>capacité</th>
                            <th>voir</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($salles as $salle)
                            <tr>
                                <td>{{ $salle->id }}</td>
                                {{-- <td><a href="#"><img src="/examples/images/avatar/1.jpg" class="avatar"
                                        alt="Avatar"> Michael Holz</a></td> --}}
                                <td>{{ $salle->nom }}</td>
                                <td>{{ $salle->nombreplace }}</td>
                                <td><span class="status text-success">&bull;</span>{{ $salle->statut }}</td>
                                <td>{{ $salle->taille }}</td>
                                <td>
                                    @can('update', App\Models\Salles::class)
                                        <a href="#" class="view" title="Modifier" data-toggle="tooltip"><i
                                                class="material-icons">&#xE5C8;</i></a>
                                    @endcan
                                </td>
                                <td>
                                    @can('create', App\Models\Salles::class)
                                        <a href="{{ route('pages_salles') }}" class="view" title="ajouter"
                                            data-toggle="tooltip"><i class="fa-solid fa-plus"></i></a>
                                    @endcan

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="clearfix">
                    <nav aria-label="...">
                        <ul class="pagination pagination-sm">
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">1</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
