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

                    <form action="#" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="inputName">nom</label>
                                    <input type="text" class="form-control" id="inputName" required value="{{ $salle->nom }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="inputEmail"> le code</label>
                                    <input type="email" class="form-control" id="inputEmail" required value="{{ $salle->code }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="inputPhone">Nombre de place</label>
                                    <input type="numbert" class="form-control" id="inputPhone" required value="{{ $salle->nombreplace }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSubject">Tarif</label>
                            <input type="text" class="form-control" id="inputSubject" required value="{{ $salle->tarif }}">
                        </div>
                        <div class="form-group">
                            <label for="inputMessage">equipement</label>
                            @foreach ($equipements as $equipement)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $equipement->id }}" id="equipement{{ $equipement->id }}" name="equipement[]" {{ in_array($equipement->id, $salle->equipements->pluck('id')->toArray()) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="equipement{{ $equipement->id }}">
                                        {{ $equipement->nom }}
                                    </label>
                                </div>

                            @endforeach
                            <input type="text" class="form-control" required value="{{ $salle->tarif }}">

                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
