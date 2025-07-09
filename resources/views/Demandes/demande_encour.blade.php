<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Liste demandes</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Font Awesome -->



    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">
    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('css/demande/liste_demande.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />

    {{-- pour les entête --}}

</head>

<body class="listedemande_body">
    @include('layouts.navbarunique')

    <div class="container-xl" style=" width: 78%;  justify-content: center; margin-left: 1px; margin-right: 1px;">
        <div class="table-responsive" style="padding: 4%;padding-right: initial;margin-left:15%">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Liste des <b> Demandes en attente</b></h2>
                        </div>
                        <div class="col-sm-6 ">

                            <form action="#" method="post">
                                <div class="button">

                                    <input type="text" class="btn btn-success recherche" placeholder="recherche">
                                </div>

                            </form>
                            @can('deleteAny', App\Models\Demandes::class)
                                <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i
                                        class="material-icons">&#xE15C;</i> <span>Supprimer</span></a>
                            @endcan

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
                            <th>N° demande</th>
                            <th>Nom</th>
                            <th>Email</th>

                            <th>Telephone</th>
                            <th>salle</th>
                            <th>effectif</th>
                            <th>date</th>
                            <th>Etat</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (session()->has('message'))
                            <div style="color: red">
                                {{ session('message') }}
                            </div>
                        @endif

                        @foreach ($demandeEncours as $demandeEncour)
                            <tr>
                                <th>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="selectAll" {{ $demandeEncour->id }}>
                                        <label for="selectAll"></label>
                                    </span>
                                </th>
                                <td>{{ $demandeEncour->id }}</td>
                                <td>{{ $demandeEncour->nom }}</td>
                                <td>{{ $demandeEncour->mail }}</td>
                                <td>{{ $demandeEncour->telephone }}</td>
                                <td>{{ $demandeEncour->salle->nom }}</td>
                                <td>{{ $demandeEncour->effectif }}</td>
                                <td>{{ $demandeEncour->created_at }}</td>
                                <td class="etat">{{ $demandeEncour->etat }}</td>
                                <td>
                                    @can('view', App\Models\Demandes::class)
                                        <a href="#" class="edit" data-toggle="modal"
                                            data-target="#editEmployeeModal{{ $demandeEncour->id }}">
                                            <i class="material-icons" data-toggle="tooltip" title="Details">&#xE417;</i>
                                        </a>
                                    @endcan

                                    @can('deleteAny', App\Models\Demandes::class)
                                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i
                                                class="material-icons" data-toggle="tooltip"
                                                title="supprimer">&#xE872;</i>
                                        </a>
                                    @endcan



                                    {{-- <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i
                                            class="material-icons" data-toggle="tooltip"
                                            title="supprimer">&#xE872;</i></a> --}}
                                </td>
                            </tr>

                            <!-- Modal pour afficher les détails de la demande -->
                            <div class="modal fade" id="editEmployeeModal{{ $demandeEncour->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="modalLabel{{ $demandeEncour->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="text-align: center;">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Traiter la demande</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex align-items-center mb-2">
                                                <label class="mb-0 mr-2">Nom du demandeur:</label> <br>
                                                <input type="text" value="{{ $demandeEncour->nom }}" readonly style="border: none; background-color: transparent;">
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <label class="mb-0 mr-2">date de debut:</label>
                                                <input type="text" value="{{ \Carbon\Carbon::parse($demandeEncour->datedebut)->format('d/m/Y') }}" readonly style="border: none; background-color: transparent;">
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <label class="mb-0 mr-2">date de fin:</label>
                                                <input type="text" value="{{ \Carbon\Carbon::parse($demandeEncour->datefin)->format('d/m/Y') }}" readonly style="border: none; background-color: transparent;">
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <label class="mb-0 mr-2">heure de debut:</label>
                                                <input type="text" value="{{ \Carbon\Carbon::parse($demandeEncour->heuredebut)->format('H-i') }}" readonly style="border: none; background-color: transparent;">
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <label class="mb-0 mr-2">heure de fin:</label>
                                                <input type="text" value="{{  \Carbon\Carbon::parse($demandeEncour->heurefin)->format('H-i') }}" readonly style="border: none; background-color: transparent;">
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <label class="mb-0 mr-2">motif de la demande:</label>
                                                <input type="text" value="{{ $demandeEncour->motif }}" readonly style="border: none; background-color: transparent;">
                                            </div>
                                            <div class="d-flex align-items-center mb-2">
                                                <label class="mb-0 mr-2">salle demandée:</label>
                                                <input type="text" value="{{ $demandeEncour->salle->nom }}" readonly style="border: none; background-color: transparent;">
                                            </div>
                                        </div>
                                        <div class="modal-footer modal-body">
                                            <form action="{{ route('refuserdemande', ['id' => $demandeEncour->id]) }}" method="post" class="mr-2">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="etat" class="btn btn-default" value="refusée">Refuser</button>
                                            </form>
                                            <form action="{{ route('accpeterdemande', ['id' => $demandeEncour->id]) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="etat" class="btn btn-info" value="validée">Accepter</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </tbody>
                </table>
                <div class="clearfix" style="transform: translate(0,40px)">
                    {{-- <div class="hint-text">{{ $demande->id }} <b>sur</b> {{ $demande->id }}</b> entrées</div> --}}
                    <ul class="pagination">
                        <!-- Bouton "Précédent" -->
                        @if ($demandeEncours->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Précédent</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $demandeEncours->previousPageUrl() }}">Précédent</a>
                            </li>
                        @endif

                        <!-- Liens de pagination -->
                        @foreach ($demandeEncours->getUrlRange(1, $demandeEncours->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $demandeEncours->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        <!-- Bouton "Suivant" -->
                        @if ($demandeEncours->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $demandeEncours->nextPageUrl() }}">Suivant</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Suivant</a>
                            </li>
                        @endif
                    </ul>

                </div>

                <div class="clearfix">
                    <div class="hint-text">{{ $demandeEncours->lastItem() }} <b> sur </b> {{ $nombredemande }}
                        demandes
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->

    <!-- Edit Modal HTML -->
    @foreach ($demandeEncours as $demandeEncour)
        <div id="editEmployeeModal{{ $demandeEncour->id }}" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="modalLabel{{ $demandeEncour->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="Poste" action="{{ route('demandevalidee') }}">

                        <div class="modal-header">
                            <h4 class="modal-title">Mise a jour de la demande</h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                        </div>

                        <div class="modal-body">
                            <div class="form-group">
                                <label>
                                    <h1>nom du demandeur</h1>
                                </label>
                                <div>{{ $demandeEncour->nom }}</div>

                            </div>
                            <div class="form-group">
                                <label>date de but</label>
                                <div>{{ $demandeEncour->datedebut }}</div>

                            </div>
                            <div class="form-group">
                                <label>date de fin</label>
                                <div>{{ $demandeEncour->datefin }}</div>
                            </div>
                            <div class="form-group">
                                <label>heure de debut</label>
                                <div>{{ $demandeEncour->heuredebut }}</div>
                            </div>
                            <div class="form-group">
                                <label>heure de fin</label>
                                <div>{{ $demandeEncour->heurefin }}</div>
                            </div>
                            <div class="form-group">
                                <label>motif de la demande</label>
                                <div>{{ $demandeEncour->motif }}</div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="etat" class="btn btn-default"
                                value="refusée">Refuser</button>
                            <button type="submit" name="etat" class="btn btn-info"
                                value="validée">Accepter</button>
                            {{-- <input type="button" name="etat" class="btn btn-default" data-dismiss="modal" value="Refuser">
                        <input type="button" name="etat" class="btn btn-info" value="Accepter"> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('demandesupprimer', ['id' => $demandeEncour->id]) }}"
                    method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h4 class="modal-title">Supprimer demande</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Vous êtes sur de vouloir supprimer?</p>
                        <p class="text-warning"><small>Cette action est ireversible</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Retour">
                        <button type="submit" class="btn btn-danger"value="Supprimer">Supprimer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"
        integrity="sha512-b+nQTCdtTBIRIbraqNEwsjB6UvL3UEMkXnhzd8awtCYh0Kcsjl9uEgwVFVbhoj3uu1DO1ZMacNvLoyJJiNfcvg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
</body>

</html>
