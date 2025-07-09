<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des administrateurs</title>
    @yield('lien')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/salles/listesalle.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    {{-- pour les entête --}}
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<style>
    body {
        background-image: url('{{ asset('images/uo.jpg') }}');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        background-repeat: no-repeat;
    }

    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: -1;
    }

    .content-wrapper {
        background-color: rgba(255, 255, 255, 0.95);
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        transform: translate(0%, 50px);
        width: 100%;
    }

    .card {
        border-radius: 12px;
    }

    .table th,
    .table td {
        vertical-align: middle;
    }

    .btn-primary {
        border-radius: 20px;
    }

    .table thead {
        background-color: #f4f6f9;
    }
</style>

<body class="hold-transition sidebar-mini">
    @include("layouts.navbarunique")


    <div class="container" style="margin-left: 1px;padding: 55px;">
        <div class="content-wrapper">
            <section class="content-header" >
                <div class="container-fluid my-2">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <h1 class="text-dark">Gestion des utilisateurs</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="{{ route('ajouterutilisateur') }}" class="btn btn-primary">
                                <i class="fas fa-user-plus"></i> Ajouter un utilisateur
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content" >
                <div class="container-fluid" >
                    <div class="card">
                        <div class="card-header d-flex justify-content-end">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Rechercher"
                                    aria-label="Search">
                                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><i
                                        class="fas fa-search"></i></button>
                            </form>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Sexe</th>
                                        <th>Profil</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->nom }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->telephone ?? '-' }}</td>
                                            <td>{{ $user->sexe }}</td>
                                            <td>{{ $user->profile }}</td>
                                            <td>
                                                <a href="{{ route('profile.modifier',$user->id) }}" class="text-primary mr-2" title="Modifier"><i
                                                        class="fas fa-edit"></i></a>
                                                <form action="{{ route('supprimer_utilisateur',$user->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-danger" style="border: none; outline: none; background-color: white;"><i class="fas fa-trash-alt"></i></button>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer clearfix d-flex justify-content-between align-items-center">
                            <span>Page {{ $pagination->currentPage() }} sur {{ $pagination->lastPage() }}</span>
                            <ul class="pagination mb-0">
                                <li class="page-item {{ $pagination->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $pagination->previousPageUrl() }}">Précédent</a>
                                </li>
                                <li class="page-item active">
                                    <span class="page-link">{{ $pagination->currentPage() }}</span>
                                </li>
                                <li class="page-item {{ !$pagination->hasMorePages() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $pagination->nextPageUrl() }}">Suivant</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

</body>

</html>
