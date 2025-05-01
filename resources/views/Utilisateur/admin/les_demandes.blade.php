<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des administrateurs</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
</head>

<body class="hold-transition sidebar-mini">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logo.png') }}" width="30" height="30" alt="Logo" class="d-inline-block align-top">
            Gestion des Salles
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
                    <a class="nav-link" href="{{ route('liste_demandeencour') }}">Démande en attente</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('liste_demanderefusee') }}">Démandes refusées</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('liste_demandevalidee') }}">Démandes validées</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('liste_demande') }}">Traiter les démandes</a>
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
    <!-- Site wrapper -->
    <div class="wrapper">

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
            <section class="content">
                <!-- Default box -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <div class="small-box card">
                                <div class="inner">
                                    <h3>{{ $demandes }}</h3>
                                    <p>Total demandes</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="{{ route('deatilsdemandes') }}" class="small-box-footer text-dark">plus
                                    infos<i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <div class="small-box card">
                                <div class="inner">
                                    <h3>{{ $demandeValidée }}</h3>
                                    <p>Demandes validées</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="{{ route('liste_demandevalidee') }}" class="small-box-footer text-dark"> plus infos <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-4 col-6">
                            <div class="small-box card">
                                <div class="inner">
                                    <h3>{{ $demandeRefusée }}</h3>
                                    <p>Demandes refusées</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{ route('liste_demanderefusee') }}" class="small-box-footer text-dark"> plus infos <i
                                        class="fas fa-arrow-circle-right"></i></a>
                                {{-- <a href="javascript:void(0);" class="small-box-footer">&nbsp;</a> --}}
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="small-box card">
                                <div class="inner">
                                    <h3>{{ $demandeEncour }}</h3>
                                    <p>Demandes en attente</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{ route('liste_demandeencour') }}" class="small-box-footer text-dark"> plus infos <i
                                        class="fas fa-arrow-circle-right"></i></a>
                                {{-- <a href="javascript:void(0);" class="small-box-footer">&nbsp;</a> --}}
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
</body>

</html>
