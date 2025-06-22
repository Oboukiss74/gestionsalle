<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>modifier salle</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Patua+One">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
    <style>
        body {
            color: #333;
            background: #fafafa;
            font-family: "Patua One", sans-serif;
        }

        .contact-form {
            padding: 50px;
            margin: 30px 0;
        }

        .contact-form h1 {
            color: #19bc9d;
            font-weight: bold;
            margin: 0 0 15px;
        }

        .contact-form .form-control,
        .contact-form .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .contact-form .form-control:focus {
            border-color: #19bc9d;
        }

        .contact-form .btn-primary,
        .contact-form .btn-primary:active {
            color: #fff;
            min-width: 150px;
            font-size: 16px;
            background: #19bc9d !important;
            border: none;
        }

        .contact-form .btn-primary:hover {
            background: #15a487 !important;
        }

        .contact-form .btn i {
            margin-right: 5px;
        }

        .contact-form label {
            opacity: 0.7;
        }

        .contact-form textarea {
            resize: vertical;
        }

        .hint-text {
            font-size: 15px;
            padding-bottom: 20px;
            opacity: 0.6;
        }
    </style>
</head>

<body>
    @include('layouts.navbarunique')
    <div class="container-lg">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="contact-form">
                    <h1>Modifier la salle</h1>

                    @php
                        // S'assurer que l'attribut JSON est bien transformé en tableau
                        $equipements_salle = is_array($salle->equipement)
                            ? $salle->equipement
                            : json_decode($salle->equipement, true);
                    @endphp

                    <form action="{{ route('enregistrer_salle_modifiee', $salle->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control" name="nom" value="{{ $salle->nom }}"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Code</label>
                            <input type="text" class="form-control" name="code" value="{{ $salle->code }}"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Nombre de place</label>
                            <input type="number" class="form-control" name="nombreplace"
                                value="{{ $salle->nombreplace }}" required>
                        </div>

                        <div class="form-group">
                            <label>Tarif</label>
                            <input type="text" class="form-control" name="tarif" value="{{ $salle->tarif }}"
                                required>
                        </div>

                        <div class="form-group">
                            <label>Équipements disponibles :</label><br>

                            @php
                                $equipements_disponibles = ['projecteur', 'tableau', 'climatisation', 'electriciter',
                                    'wifi', 'sonorisation', 'microphone', 'ecran'];
                            @endphp

                            @foreach ($equipements_disponibles as $eq)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="equipement[]"
                                        value="{{ $eq }}" id="eq_{{ $eq }}"
                                        {{ in_array($eq, $equipements_salle ?? []) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="eq_{{ $eq }}">{{ ucfirst($eq) }}</label>
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
