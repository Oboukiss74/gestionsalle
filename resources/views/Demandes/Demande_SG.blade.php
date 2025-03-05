<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>liste des salles louées</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/demande/SG.css">
    <link rel="icon" type="image/png" href="images/logo.png" />

</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title" style="background-color: #FFCF39">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="show-entries">
                                {{-- <span>Show</span>
                                <select>
                                    <option>5</option>
                                    <option>10</option>
                                    <option>15</option>
                                    <option>20</option>
                                </select>
                                <span>entries</span> --}}
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <h2 class="text-center">Liste de demande des salles</b></h2>
                        </div>
                        <div class="col-sm-4">
                            <div class="search-box">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                                    <input type="text" class="form-control" placeholder="Search&hellip;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nom </th>
                            <th>mail</th>
                            <th>telephone </th>
                            <th>Salle</th>
                            <th>date </th>
                            <th>Etat</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($demandes as $demande)
                            <tr>
                                <td>{{ $demande->id }}</td>
                                <td>{{ $demande->nom }}</td>
                                <td>{{ $demande->mail }}</td>
                                <td>{{ $demande->telephone }}</td>
                                <td>{{ $demande->salle }}</td>
                                <td>{{ $demande->created_at }}</td>
                                <td>
                                    <span
                                        class="badge 
                                        @if ($demande->etat == 'Validée') bg-success
                                        @elseif ($demande->etat == 'En attente') bg-warning
                                        @elseif ($demande->etat == 'Refusée') bg-danger
                                        @endif">
                                        {{ $demande->etat }}
                                    </span>
                                </td>
                                
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                <div class="clearfix">
                    {{-- <div class="hint-text">{{ $demande->id }} <b>sur</b> {{ $demande->id }}</b> entrées</div> --}}
                    <ul class="pagination">
                        <!-- Bouton "Précédent" -->
                        @if ($demandes->onFirstPage())
                            <li class="page-item disabled">
                                <a class="page-link" href="#">Précédent</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $demandes->previousPageUrl() }}">Précédent</a>
                            </li>
                        @endif

                        <!-- Liens de pagination -->
                        @foreach ($demandes->getUrlRange(1, $demandes->lastPage()) as $page => $url)
                            <li class="page-item {{ $page == $demandes->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endforeach

                        <!-- Bouton "Suivant" -->
                        @if ($demandes->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $demandes->nextPageUrl() }}">Suivant</a>
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

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
            // Animate select box length
            var searchInput = $(".search-box input");
            var inputGroup = $(".search-box .input-group");
            var boxWidth = inputGroup.width();
            searchInput.focus(function() {
                inputGroup.animate({
                    width: "300"
                });
            }).blur(function() {
                inputGroup.animate({
                    width: boxWidth
                });
            });
        });
    </script>
</body>

</html>
