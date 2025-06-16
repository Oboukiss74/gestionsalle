<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion des administrateurs</title>

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
    <link rel="stylesheet" href="{{ asset('css/salles/salle_dispo.css') }}">
    <link rel="stylesheet" href="{{ asset("css/salles/listesalle.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
</head>

<body class="hold-transition sidebar-mini">
    @yield('navabar')
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->

        @yield('contenue')
        @include('layouts.navbarunique')

        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title" style="width: auto" >
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



    </div>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });

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
