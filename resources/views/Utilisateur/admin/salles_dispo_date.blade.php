@extends('layouts.navbaradmin')

@section('contenue')
    <!-- Site wrapper -->
    <div class="wrapper">
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
                        <a class="nav-link" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Salles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Réservations</a>
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
        <!-- Navbar -->
        {{-- <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Right navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <div class="navbar-nav pl-2">
                <ol class="breadcrumb p-0 m-0 bg-white">
                    <li class="breadcrumb-item"><a href="{{ route('Accueil') }}">G.S</a></li>
                    <li class="breadcrumb-item active">List</li>
                </ol>
            </div>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link p-0 pr-3" data-toggle="dropdown" href="#">
                        <img src="{{ asset('img/avatar5.png') }}" class='img-circle elevation-2' width="40"
                            height="40" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-3">
                        <h4 class="h4 mb-0"><strong>Mohit Singh</strong></h4>
                        <div class="mb-3">example@example.com</div>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user-cog mr-2"></i> parametre
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-lock mr-2"></i> changer mot de passe
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item text-danger">
                            <i class="fas fa-sign-out-alt mr-2"></i> Se deconnecter
                        </a>
                    </div>
                </li>
            </ul>
        </nav> --}}
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        {{-- <aside class="main-sidebar sidebar-dark-primary elevation-4">
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
        </aside> --}}
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Verifier les sales disponible a une periode pour une demande</h1>
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
                <div class="container-fluid recherche_salles">
                    <form action="{{ route('liste_salles') }}" method="post">
                        @csrf
                        <div class="recherche_salles">
                            <label for="datedebut">Date de début :</label>
                            <input type="date" name="datedebut" id="datedebut" required>

                            <label for="datefin">Date de fin :</label>
                            <input type="date" name="datefin" id="datefin" required>
                            <br>
                            <button type="submit">Rechercher</button>
                        </div>
                    </form>

                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">

            <strong>Copyright &copy; 2014-2022 AmazingShop All rights reserved.
        </footer>

    </div>
    <!-- ./wrapper -->
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="js/demo.js"></script>
@endsection
