<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Modification de demande</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Raleway">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detaildemande.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <b style="color: rgb(244, 244, 13);font-size: 30px">Gestion</b>
            <b style="color:rgb(249, 82, 82);font-size: 30px"> Sall</b>
            <b style="color: rgb(11, 159, 63);font-size: 30px">es</b>
        </a>
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <div class="navbar-nav">
                <a href="{{ route('Verifie_demande') }}" class="nav-item nav-link">
                    <h6>Retour</h6>
                </a>
            </div>
        </div>
    </nav>

    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <!-- Affichage des messages d'erreur/succès -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif


            <div class="formbold-mb-3">
                <label for="effectif" class="formbold-form-label">nom</label>
                <p>
                    {{ $demande->user->nom }}
                </p>
            </div>

            <div class="formbold-mb-3">
                <label for="effectif" class="formbold-form-label">nom</label>
                <p>
                    {{ $demande->user->prenom }}
                </p>
            </div>

            <div class="formbold-mb-3">
                <label for="effectif" class="formbold-form-label">nom</label>
                <p>
                    {{ $demande->user->telephone }}
                </p>
            </div>


            <div class="formbold-form-title">
                <h2 class="">quittance N° {{ $demande->id }}</h2>

            </div>

            <div class="formbold-input-flex">
                <div>
                    <label for="datedebut" class="formbold-form-label">Date de début</label>
                    <input type="date" name="datedebut" id="datedebut" class="formbold-form-input"
                        value="{{ old('datedebut', $demande->datedebut) }}" required />
                    @error('datedebut')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="datefin" class="formbold-form-label">Date de fin</label>
                    <input type="date" name="datefin" id="datefin" class="formbold-form-input"
                        value="{{ old('datefin', $demande->datefin) }}" required />
                    @error('datefin')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="formbold-input-flex">
                <div>
                    <label for="heuredebut" class="formbold-form-label">Heure de début</label>
                    <input type="time" name="heuredebut" id="heuredebut" class="formbold-form-input"
                        value="{{ old('heuredebut', $demande->heuredebut) }}" required />
                    @error('heuredebut')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="heurefin" class="formbold-form-label">Heure de fin</label>
                    <input type="time" name="heurefin" id="heurefin" class="formbold-form-input"
                        value="{{ old('heurefin', $demande->heurefin) }}" required />
                    @error('heurefin')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="formbold-mb-3">
                <label for="effectif" class="formbold-form-label">Effectif de participants</label>
                <input type="number" name="effectif" id="effectif" class="formbold-form-input"
                    value="{{ old('effectif', $demande->effectif) }}" min="1" required />
                @error('effectif')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="formbold-mb-3">
                <label for="motif" class="formbold-form-label">Motif de la demande</label>
                <textarea name="motif" id="motif" class="formbold-form-input" required>{{ old('motif', $demande->motif) }}</textarea>
                @error('motif')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <p class="formbold-form-input">heure : {{ $demande->updated_at->format('d/m/Y à H:i') }}</p>
            <p class="formbold-form-input">heure : Ce document fait foi de l'approbation de votre demande de réservation.</p>


            <button type="submit" class="formbold-btn">Enregistrer les modifications</button>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
