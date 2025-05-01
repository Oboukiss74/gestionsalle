<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des administrateurs</title>
    <!-- Google Font: Source Sans Pro -->
    <link
        rel="stylesheet"href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
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
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid my-2">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Brands</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="create-brand.html" class="btn btn-primary">New Brand</a>
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
                                        <th width="60">nom</th>
                                        <th>Date debut</th>
                                        <th>Date fin</th>
                                        <th width="100">Heure debut</th>
                                        <th width="100">Heure fin</th>
                                        <th width="100">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($salles as $salle)
                                        @if ($salle->demandes->count() > 0)
                                            @foreach ($salle->demandes as $index => $demande)
                                                <tr>
                                                    @if ($index === 0)
                                                        <td rowspan="{{ $salle->demandes->count() }}">
                                                            {{ $salle->nom }}</td>
                                                    @endif
                                                    <td>{{ $demande->datedebut }}</td>
                                                    <td>{{ $demande->datefin }}</td>
                                                    <td>{{ $demande->heuredebut }}</td>
                                                    <td>{{ $demande->heurefin }}</td>
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
                                                        <a href="#" class="text-danger w-4 h-4 mr-1">
                                                            <svg wire:loading.remove.delay="" wire:target=""
                                                                class="filament-link-icon w-4 h-4 mr-1"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                                fill="currentColor" aria-hidden="true">
                                                                <path fill-rule="evenodd"
                                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        @endif

                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">

            <strong>Gestion et localisation &copy; des salles de l'université Joseph KI-Zerbo
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
