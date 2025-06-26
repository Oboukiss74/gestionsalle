<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mes demandes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Raleway">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
     <link
        rel="stylesheet"href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('css/salles/listesalle.css') }}">
    <link rel="stylesheet" href="{{asset('css/salles/listesalle.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">


    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/demande/creer_demande.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />


</head>

<body>
    @include('layouts.navbarunique')

    <div class="container mt-5" style="margin-right: 5%;padding: 4%;padding-right: initial; margin-left: 17%; " >
        <h2>Mes demandes validées</h2>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Salle</th>
                    <th>Motif</th>
                    <th>Heure début</th>
                    <th>Heure fin</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @forelse($demandes as $demande)
                    @if($demande->etat === 'Validée')
                        <tr>

                            <td>{{ $demande->id }}</td>
                            <td>{{ $demande->salle->nom ?? 'N/A' }}</td>
                            <td>{{ $demande->motif }}</td>
                            <td>{{ $demande->heuredebut }}</td>
                            <td>{{ $demande->heurefin }}</td>
                            <td><span class="badge badge-success">Validée</span></td>
                        </tr>
                    @endif
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Aucune demande validée trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>
