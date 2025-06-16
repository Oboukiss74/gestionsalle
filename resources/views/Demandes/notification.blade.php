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
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('profile') }}"
                style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 30px;">
                <img src="{{ asset('images/logo.png') }}" width="30" height="30" alt="Logo"
                    class="d-inline-block align-top">
                <b style="color: rgb(57, 209, 115)">gs.ujkz</b>
            </a>
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
                <form class="d-flex" role="search" style="transform: translate(295%,0)">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Recherche</button>
                </form>
            </div>
        </div>
    </nav>

    <div style="align-content: center;">
        @forelse ($demandes as $demande)
            @if ($demande->etat === 'Validée')
                <p style="font-size: 15px; text-align: center;">
                    Votre demande <b style="color: black">n° {{ $demande->id }}</b> a été <span
                        style="color: green;">acceptée</span> le {{ $demande->updated_at->format('d/m/Y H:i') }}.<br>
                    Vous pouvez procéder au paiement.
                </p>
                <a href="#" style="font-size: 15px; text-align: center;">Cliquez ici</a>
            @elseif ($demande->etat === 'Refusée')
                <p style="font-size: 15px; text-align: center;">
                    Votre demande <b style="color: black">n° {{ $demande->id }}</b> a été <span
                        style="color: red;">refusée</span> le {{ $demande->updated_at->format('d/m/Y H:i') }}.<br>
                    Vous pouvez refaire une autre demande.
                </p>
                <a href="#" style="font-size: 15px; text-align: center;">Cliquez ici</a>
            @endif
        @empty
            <p style="text-align: center;">Aucune notification pour le moment.</p>
        @endforelse
    </div>
</body>

</html>
