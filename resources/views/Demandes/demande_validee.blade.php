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

    <link rel="stylesheet" href="{{ asset('css/demande/liste_demande.css') }}">
    <link rel="icon" type="image/png" href="images/logo.png" />


</head>

<body class="listedemande_body">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <a class="navbar-brand" href="{{ route('profile') }}"
            style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 30px;">
            <img src="{{ asset('images/logo.png') }}" width="30" height="30" alt="Logo"
                class="d-inline-block align-top">
            <b style="color: rgb(57, 209, 115)"> e.Gestion des Salles</b>
        </a>

        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('profile') }}"
                style="font-size: 20px; text-decoration: none;color:black">Profie</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        @can('view', App\Models\Demandes::class)
                            <a class="nav-link active " aria-current="page" href="{{ route('total_demande') }}"
                                aria-disabled="true" style="font-size: 20px; text-decoration: none;color:black">Tableau
                                bord</a>
                        @endcan
                    </li>
                </ul>
                <form class="d-flex" role="search" style="transform: translate(330%,0)">>
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Recherche</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Liste <b> Demandes</b></h2>
                        </div>
                        <div class="col-sm-6 ">

                            <form action="#" method="post">
                                <div class="button">
                                    <div class="buttonicon">
                                        <i class="fa-solid fa-magnifying-glass icon"></i>
                                    </div>
                                    <input type="text" class="btn btn-success recherche" placeholder="recherche">
                                </div>

                            </form>

                            <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i
                                    class="material-icons">&#xE15C;</i> <span>Supprimer</span></a>
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

                        @foreach ($demandes as $demande)
                            <tr>
                                <th>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="selectAll" {{ $demande->id }}>
                                        <label for="selectAll"></label>
                                    </span>
                                </th>
                                <td>{{ $demande->id }}</td>
                                <td>{{ $demande->nom }}</td>
                                <td>{{ $demande->mail }}</td>
                                <td>{{ $demande->telephone }}</td>
                                <td>{{ $demande->salle }}</td>
                                <td>{{ $demande->effectif }}</td>
                                <td>{{ $demande->created_at }}</td>
                                <td class="etat">{{ $demande->etat }}</td>
                                <td>

                                    <a href="#" class="edit" data-toggle="modal"
                                        data-target="#editEmployeeModal{{ $demande->id }}">
                                        <i class="material-icons" data-toggle="tooltip" title="Details">&#xE417;</i>
                                    </a>

                                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i
                                            class="material-icons" data-toggle="tooltip"
                                            title="supprimer">&#xE872;</i>
                                    </a>


                                    {{-- <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i
                                            class="material-icons" data-toggle="tooltip"
                                            title="supprimer">&#xE872;</i></a> --}}
                                </td>
                            </tr>

                            <!-- Modal pour afficher les détails de la demande -->
                            <div class="modal fade" id="editEmployeeModal{{ $demande->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="modalLabel{{ $demande->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 class="modal-title">Detail de la demande</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">

                                            <p class="modal-body"><strong>Nom du demandeur:</strong>
                                                <br>{{ $demande->nom }}
                                            </p>


                                            <p class="form-group"><strong>date de debut:</strong>
                                                {{ $demande->datedebut }}</p>

                                            <p class="form-group"><strong>date de fin:</strong>
                                                {{ $demande->datefin }}
                                            </p>

                                            <p class="form-group"><strong>heure de debut:</strong>
                                                {{ $demande->heuredebut }}</p>

                                            <p class="form-group"><strong>heure de fin:</strong>
                                                {{ $demande->heurefin }}</p>

                                            <p class="form-group"><strong>motif de la demande:</strong> <br>
                                                {{ $demande->motif }}</p>
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
                        @if ($demandeValidee->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Précédent</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $demandeValidee->previousPageUrl() }}">Précédent</a>
                            </li>
                        @endif

                        <!-- Liens de pagination -->
                        @foreach ($demandeValidee->getUrlRange(1, $demandeValidee->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $demandeValidee->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach
                        <!-- Bouton "Suivant" -->
                        @if ($demandeValidee->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $demandeValidee->nextPageUrl() }}">Suivant</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Suivant</a>
                            </li>
                        @endif
                    </ul>

                </div>

                <div class="clearfix">
                    <div class="hint-text">{{ $demandeValidee->lastItem() }} <b>sur</b> {{ $nombredemande }} </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->

    <!-- Edit Modal HTML -->
    @foreach ($demandes as $demande)
        <div id="editEmployeeModal{{ $demande->id }}" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="modalLabel{{ $demande->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="Poste" action="{{ route('demandevalidee') }}">
                        <div class="modal-header">
                            <h4 class="modal-title">Plus de Details de la demande</h4>
                            <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>
                                    <h1>nom du demandeur</h1>
                                </label>
                                <h3>{{ $demande->nom }}</h3>

                            </div>
                            <div class="form-group">
                                <label>date de but</label>
                                <h3>{{ $demande->datedebut }}</h3>

                            </div>
                            <div class="form-group">
                                <label>date de fin</label>
                                <h3>{{ $demande->datefin }}</h3>
                            </div>
                            <div class="form-group">
                                <label>heure de debut</label>
                                <h3>{{ $demande->heuredebut }}</h3>
                            </div>
                            <div class="form-group">
                                <label>heure de fin</label>
                                <h3>{{ $demande->heurefin }}</h3>
                            </div>
                            <div class="form-group">
                                <label>motif de la demande</label>
                                <h2>{{ $demande->motif }}</h3>
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
                <form method="post" action="{{ route('demandesupprimer', ['id' => $demande->id]) }}"
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
