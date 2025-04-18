@extends('layouts.navbaradmin')
@section('contenue')
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
                        <a href="{{ route('recherche_salles') }}" class="nav-link">
                            <i class="fa-sharp-duotone fa-solid fa-house"></i>
                            <p>Verifer etat</p>
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
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
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
        <section class="content">
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
                            <a href="{{ route('liste_salles') }}" class="small-box-footer text-dark">plus d'infos <i
                                    class="fas fa-arrow-circle-right"></i></a>
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
                            <a href="{{ route('liste_salles_occupee') }}" class="small-box-footer text-dark">plus d'infos <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="small-box card">
                            <div class="inner">
                                <h3>{{$nombreSallesLibres}}</h3>
                                <p>Salles non occupées</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('listesalles') }}" class="small-box-footer text-dark">plus d'infos <i
                                    class="fas fa-arrow-circle-right"></i></a>
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
    <footer class="main-footer">

        <strong>Gestion &copy; des salles et demandes 24/24.
    </footer>
@endsection
