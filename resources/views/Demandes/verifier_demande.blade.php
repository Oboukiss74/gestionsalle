<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>verifier demande</title>
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link
        rel="stylesheet"href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('css/salles/listesalle.css') }}">
    <link rel="stylesheet" href="css/salles/listesalle.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />

</head>

<body>
    @include('layouts.navbarunique')
    @role('Utilisateur')
        <div style="margine:18px; padding: 18px;">
            @if (@session()->has('message'))
                <p style="color: red">{{ session('message') }}</p>
            @endif
            <table class="table" style="    width: 80%;left: 104px;margin-left: 18%;">
                <thead>
                    <tr>
                        <th scope="col">N°</th>
                        <th scope="col">nom</th>
                        <th scope="col">motif</th>
                        <th scope="col">etat</th>
                        <th scope="col">date de soumission</th>
                        <th scope="col">etat de paiement</th>
                        <th scope="col">details</th>
                        <th scope="col">Quittances</th>
                        <th scope="col">localiser</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($demandes as $demande)
                        <tr>
                            <th scope="row">{{ $demande->id }} </th>
                            {{-- <th scope="row">{{ $loop->iteration }} </th> --}}
                            <td>{{ $demande->nom }}</td>
                            <td>{{ $demande->motif }}</td>
                            <td>{{ $demande->etat }}</td>
                            <td>{{ $demande->created_at }}</td>
                            <td>

                                @if ($demande->etat === 'Validée')
                                    <a href="">
                                        <button
                                            style="border-radius: 4px; color: red; border-color: red; background-color: red; color:aliceblue;">non
                                            payé</button>
                                    </a>
                                @endif

                                @if ($demande->etat === 'En attente')
                                    <button
                                        style="border-radius: 4px; color: rgb(28, 241, 85); border-color: rgb(28, 241, 85); background-color: rgb(28, 241, 85); color:black;">en
                                        attente
                                    </button>
                                @endif
                                @if ($demande->etat === 'Refusée')
                                    <button
                                        style="border-radius: 4px; color: rgb(28, 241, 85); border-color: rgb(28, 241, 85); background-color: rgb(28, 241, 85); color:black;">paiement
                                        impossible
                                    </button>
                                @endif


                            </td>
                            <td>
                                <a href="{{ route('ma_demande_detail', ['id' => $demande->id]) }}" style="color: red">
                                    <i class="fa-solid fa-eye-slash"></i>
                                </a>
                            </td>
                            <td>

                                @if ($demande->etat === 'Validée')
                                    <a href="{{ route('quittance', $demande->id) }}" style="color: green">
                                        <i class="fas fa-download" style="text: green; "></i>
                                        telecharger
                                    </a>
                                @endif
                                @if ($demande->etat === 'En attente')
                                    <p>En attente</p>
                                @endif

                            </td>
                            <td>

                                <a href="https://www.google.com/maps/search/?api=1&query={{ $demande->latitude }},{{ $demande->longitude }}"
                                    target="_blank">
                                    <i class="fas fa-map-marker-alt"></i>
                                </a>

                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    @endrole
</body>

</html>
