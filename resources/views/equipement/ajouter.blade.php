<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ajout equipemnet</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Raleway">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/salles/salle.css') }}">
    @yield('liens')

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{ route('profile') }}"
            style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 30px;">
            <img src="{{ asset('images/logo.png') }}" width="30" height="30" alt="Logo"
                class="d-inline-block align-top">
            <b style="color: rgb(57, 209, 115)">gs.ujkz</b>
        </a>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <div class="navbar-nav">
                <a href="{{ route('profile') }}"class="nav-item nav-link">Acceuil</a>
                <a href="{{ route('ajoutequipement') }}"class="nav-item nav-link">Ajouter materiels</a>
                <a href="{{ route('listeequipement') }}"class="nav-item nav-link">verifier materiels</a>
                @yield('elements')

                <a href="#" class="nav-item nav-link">Contact</a>
            </div>
            <div class="navbar-nav ml-auto">
                <div class="navbar-form-wrapper">
                    <form class="navbar-form form-inline">
                        <div class="input-group search-box">
                            <input type="text" id="search" class="form-control" placeholder="Search Here...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="material-icons">&#xE8B6;</i>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </nav>
    <div class="formbold-main-wrapper">

        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="formbold-form-wrapper">
            @if (@session()->has('succes'))
                <p style="color: red">{{ session('succes') }}</p>
            @endif
            {{-- <img src="{{ asset('images/logo.jpg') }}"> --}}
            <!-- Formulaire -->
            <form action="{{ route('validerequipement') }}" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="formbold-input-flex">
                    <div class="formbold-mb-3">
                        <label for="nom" class="formbold-form-label">Nom *</label>
                        <input type="text" name="nom" id="nom" value="{{ old('nom') }}"
                            class="formbold-form-input" required>
                    </div>

                    <div class="formbold-mb-3">
                        <label for="code" class="formbold-form-label">Code *</label>
                        <input type="text" name="code" id="code" value="{{ old('code') }}"
                            class="formbold-form-input" placeholder="le code de l'equipemnet" required>
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div class="formbold-mb-3">
                        <label for="quantite" class="formbold-form-label">Quantité *</label>
                        <input type="number" name="quantite" id="quantite" value="{{ old('quantite') }}"
                            class="formbold-form-input" min="1" required>
                    </div>

                    <div class="formbold-mb-3">
                        <label for="salle_id" class="formbold-form-label">Salle *</label>
                        <select name="salle_id" id="salle_id" class="formbold-form-input" required>
                            <option value="">Choisir une salle</option>
                            @foreach ($salles as $salle)
                                <option value="{{ $salle->id }}"
                                    {{ old('salle_id') == $salle->id ? 'selected' : '' }}>
                                    {{ $salle->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="formbold-mb-3">
                    <label for="etat" class="formbold-form-label">État *</label>
                    <select name="etat" id="etat" class="formbold-form-input" required>
                        <option value="">Sélectionner un état</option>
                        <option value="neuf" {{ old('etat') == 'neuf' ? 'selected' : '' }}>Neuf</option>
                        <option value="bon" {{ old('etat') == 'bon' ? 'selected' : '' }}>Bon état</option>
                        <option value="usé" {{ old('etat') == 'usé' ? 'selected' : '' }}>Usé</option>
                        <option value="mauvais" {{ old('etat') == 'mauvais' ? 'selected' : '' }}>Mauvais état</option>
                    </select>
                </div>

                <button type="submit" class="formbold-btn">Enregistrer</button>
            </form>
        </div>
    </div>
</body>

</html>
