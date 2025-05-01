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
            style="font-size: 20px; text-decoration: none;color:black">Profie</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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

                        @foreach ($demandeRefusees as $demandeRefusee)
                            <tr>
                                <th>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="selectAll" {{ $demandeRefusee->id }}>
                                        <label for="selectAll"></label>
                                    </span>
                                </th>
                                <td>{{ $demandeRefusee->id }}</td>
                                <td>{{ $demandeRefusee->nom }}</td>
                                <td>{{ $demandeRefusee->mail }}</td>
                                <td>{{ $demandeRefusee->telephone }}</td>
                                <td>{{ $demandeRefusee->salle }}</td>
                                <td>{{ $demandeRefusee->effectif }}</td>
                                <td>{{ $demandeRefusee->created_at }}</td>
                                <td class="etat">{{ $demandeRefusee->etat }}</td>
                                <td>

                                    <a href="#" class="edit" data-toggle="modal"
                                        data-target="#editEmployeeModal{{ $demandeRefusee->id }}">
                                        <i class="material-icons" data-toggle="tooltip" title="Details">&#xE417;</i>
                                    </a>

                                    <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i
                                            class="material-icons" data-toggle="tooltip" title="supprimer">&#xE872;</i>
                                    </a>


                                    {{-- <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i
                                            class="material-icons" data-toggle="tooltip"
                                            title="supprimer">&#xE872;</i></a> --}}
                                </td>
                            </tr>

                            <!-- Modal pour afficher les détails de la demande -->
                            <div class="modal fade" id="editEmployeeModal{{ $demandeRefusee->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="modalLabel{{ $demandeRefusee->id }}"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h4 class="modal-title">Mise a jour de la demande</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">

                                            <p class="modal-body"><strong>Nom du demandeur:</strong>
                                                <br>{{ $demandeRefusee->nom }}
                                            </p>


                                            <p class="form-group"><strong>date de debut:</strong>
                                                {{ $demandeRefusee->datedebut }}</p>

                                            <p class="form-group"><strong>date de fin:</strong>
                                                {{ $demandeRefusee->datefin }}
                                            </p>

                                            <p class="form-group"><strong>heure de debut:</strong>
                                                {{ $demandeRefusee->heuredebut }}</p>

                                            <p class="form-group"><strong>heure de fin:</strong>
                                                {{ $demandeRefusee->heurefin }}</p>

                                            <p class="form-group"><strong>motif de la demande:</strong> <br>
                                                {{ $demandeRefusee->motif }}</p>
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
                        @if ($demandeRejetee->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Précédent</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $demandeRejetee->previousPageUrl() }}">Précédent</a>
                            </li>
                        @endif

                        <!-- Liens de pagination -->
                        @foreach ($demandeRejetee->getUrlRange(1, $demandeRejetee->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $demandeRejetee->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        <!-- Bouton "Suivant" -->
                        @if ($demandeRejetee->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $demandeRejetee->nextPageUrl() }}">Suivant</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Suivant</a>
                            </li>
                        @endif
                    </ul>

                </div>
                <div class="clearfix">
                    <div class="hint-text">{{ $demandeRejetee->lastItem() }} <b>sur</b> {{ $nombredemande }} </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->


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
