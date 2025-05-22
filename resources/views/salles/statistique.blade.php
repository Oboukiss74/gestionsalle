<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="{{ route('profile') }}"
            style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 30px;">
            <img src="{{ asset('images/logo.png') }}" width="30" height="30" alt="Logo"
                class="d-inline-block align-top">
            <b style="color: rgb(57, 209, 115)"> E.Gestion des Salles</b>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Boutons de navigation -->
            <ul class="navbar-nav mr-auto ml-4">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('profile') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    @can('view', App\Models\Salles::class)
                        <a class="nav-link" href="{{ route('tableau_salles') }}">Salles</a>
                    @endcan

                </li>
                <li class="nav-item">
                    @can('cretae', App\Models\Demandes::class)
                        <a class="nav-link" href="{{ route('pagedemandes') }}">Réservations</a>
                    @endcan

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
                        <a class="dropdown-item" href="#">Mon profil</a>
                        <a class="dropdown-item" href="#">Paramètres</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="#">Déconnexion</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- On tables -->
    <table class="table-primary">...</table>
    <table class="table-secondary">...</table>
    <table class="table-success">...</table>
    <table class="table-danger">...</table>
    <table class="table-warning">...</table>
    <table class="table-info">...</table>
    <table class="table-light">...</table>
    <table class="table-dark">...</table>

    <!-- On rows -->
    <tr class="table-primary">...</tr>
    <tr class="table-secondary">...</tr>
    <tr class="table-success">...</tr>
    <tr class="table-danger">...</tr>
    <tr class="table-warning">...</tr>
    <tr class="table-info">...</tr>
    <tr class="table-light">...</tr>
    <tr class="table-dark">...</tr>

    <!-- On cells (`td` or `th`) -->
    <tr>
        <td class="table-primary">...</td>
        <td class="table-secondary">...</td>
        <td class="table-success">...</td>
        <td class="table-danger">...</td>
        <td class="table-warning">...</td>
        <td class="table-info">...</td>
        <td class="table-light">...</td>
        <td class="table-dark">...</td>
    </tr>
</body>

</html>
