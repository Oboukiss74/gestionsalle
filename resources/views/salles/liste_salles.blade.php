<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>les salles</title>

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
    <link
        rel="stylesheet"href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    {{-- lien manquants --}}
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Raleway">
    <link rel="stylesheet" href="{{ asset('css/salles/salle.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('css/salles/listesalle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/salles/listesalle.css') }}">
    <!-- Theme style -->
    {{-- lien manquants --}}
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Raleway">
    <link rel="stylesheet" href="{{ asset('css/salles/salle.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Google Font: Source Sans Pro -->
</head>

<body class="hold-transition sidebar-mini">
    @include('layouts.navbarunique')
    <!-- Site wrapper -->

    <div class="container-xl d-flex" style="transform: translate(50px,0px)">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Liste <b>des Salles</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                    class="material-icons">&#xE147;</i> <span>Ajouter salle</span></a>
                            <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i
                                    class="material-icons">&#xE15C;</i> <span>Effacer</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>n°</th>
                            <th>nom</th>
                            <th>code</th>
                            <th>nombre place</th>
                            <th>tarife</th>
                            <th>Statut</th>
                            <th>localiser</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($salles as $salle)
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                        <label for="checkbox1"></label>
                                    </span>
                                </td>
                                <td>{{ $salle->id }}</td>
                                <td>{{ $salle->nom }}</td>
                                <td>{{ $salle->code }}</td>
                                <td>{{ $salle->nombreplace }}</td>
                                <td>{{ $salle->tarif }}</td>
                                <td>{{ $salle->statut }}</td>
                                <td>
                                    <a href="https://www.google.com/maps/search/?api=1&query={{ $salle->latitude }},{{ $salle->longitude }}"
                                        target="_blank">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </a>
                                </td>
                                <td>
                                    @can('create', App\Models\Salles::class)
                                        <a href="#editEmployeeModal{{ $salle->id }}" class="edit"
                                            data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                                title="Modifier">&#xE254;</i></a>
                                    @endcan

                                    @can('create', App\Models\Salles::class)
                                        <a href="#deleteEmployeeModal{{ $salle->id }}" class="delete"
                                            data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                                title="Effacer">&#xE872;</i></a>
                                    @endcan

                                </td>
                            </tr>
                            <!-- modifier salles Modal HTML -->
                            <div class="modal fade" id="editEmployeeModal{{ $salle->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="modalLabel{{ $salle->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form>
                                            <div class="modal-header">
                                                <h4 class="modal-title">modifer la salle</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nom</label>
                                                    <input type="text" class="form-control" required
                                                        value="{{ $salle->nom }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Le code</label>
                                                    <input type="email" class="form-control" required
                                                        value="{{ $salle->code }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nombre de place</label>
                                                    <input type="number" class="form-control" required
                                                        value="{{ $salle->nombreplace }}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tarif</label>
                                                    <input type="text" class="form-control" required
                                                        value="tarif">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal"
                                                    value="Annuler">
                                                <input type="submit" class="btn btn-info" value="modifier">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </tbody>
                </table>
                <div class="clearfix">
                    {{-- <div class="hint-text">

                        </b> {{ $salles->id }} <b> éléments </b> sur <b>{{ $nombresalles }}</b>
                    </div> --}}
                    <ul class="pagination">

                        @if ($salles->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Précédent</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $salles->previousPageUrl() }}">Précédent</a>
                            </li>
                        @endif

                        <!-- Liens de pagination -->
                        @foreach ($salles->getUrlRange(1, $salles->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $salles->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        <!-- Bouton "Suivant" -->
                        @if ($salles->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $salles->nextPageUrl() }}">Suivant</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Suivant</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- ajouter salle Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                <form method="post" action="{{ route('enregistrer_salle') }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Ajout de salle</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control" name="nom" required
                                placeholder="nom de la salle">
                        </div>
                        <div class="form-group">
                            <label>Le code de la salle</label>
                            <input type="text" class="form-control" name="code" required
                                placeholder="entrer le code de la salle">
                        </div>
                        <div class="form-group">
                            <label>Nombre de salle</label>
                            <input type="number" name="nombreplace" class="form-control" required
                                placeholder="nombre de place">
                        </div>
                        <div class="form-group">
                            <label>Taille</label>
                            <select class="form-control" name="taille" id="occupation">
                                <option value="petite" selected>choix de taille</option>
                                <option value="petite">petite</option>
                                <option value="moyenne">moyenne</option>
                                <option value="grande">grande</option>
                            </select>

                        </div>
                        {{-- ajout de option materiels --}}
                        <div class="form-group">
                            <label>Tarif de la salle</label>
                            <input type="text" name="tarif" class="form-control" required
                                placeholder="tarif de la salle">
                        </div>
                        <div class="form-group">
                            <label>statut</label>
                            <select class="form-control" name="statut" id="occupation">
                                <option selected>choix de statut</option>
                                <option value="payante">Payante</option>
                                <option value="non payante">Non payante</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Latitude</label>
                            <input type="text" name="latitude" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Longitude</label>
                            <input type="text" name="longitude" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Annuler">
                        <input type="submit" class="btn btn-success" value="Ajouter">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
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
