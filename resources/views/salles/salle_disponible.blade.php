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
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('profile_admin') }}" class="brand-link">
            <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">Gestion des salles</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('tableau_de_bord') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Tableau de bord</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-circle-user"></i>
                            <p>Profile</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('tableau_salles') }}" class="nav-link">
                            <i class="fa-solid fa-landmark"></i>
                            <p>Les salles</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('total_demande') }}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Les demandes</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="users.html" class="nav-link">
                            <i class="nav-icon  fas fa-users"></i>
                            <p>Utilisateurs</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages.html" class="nav-link">
                            <i class="fa-solid fa-pen-fancy"></i>
                            <p>parametres</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2>Liste <b>des Salles</b></h2>
                        </div>
                        <div class="col-sm-8">
                            <a href="#" class="btn btn-primary"><i class="material-icons">&#xE863;</i>
                                <span>rafraichire</span></a>
                            {{-- <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i>
                                <span>Export to Excel</span></a> --}}
                        </div>
                    </div>
                </div>
                <div class="table-filter">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="show-entries">
                                <span>choix</span>
                                <select class="form-control">
                                    <option>5</option>
                                    <option>10</option>
                                    <option>15</option>
                                    <option>20</option>
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
                                <td><span class="status text-success">&bull;</span> Libre</td>
                                <td>{{ $salle->taille }}</td>
                                <td><a href="#" class="view" title="voir Details" data-toggle="tooltip"><i
                                            class="material-icons">&#xE5C8;</i></a></td>
                                <td>
                                    <a href="#" class="view" title="ajouter" data-toggle="tooltip"><i
                                            class="fa-solid fa-plus"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Precedent</a></li>
                        <li class="page-item"><a href="#" class="page-link"></a></li>

                        <li class="page-item"><a href="#" class="page-link">Suivant</a></li>
                    </ul>
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
