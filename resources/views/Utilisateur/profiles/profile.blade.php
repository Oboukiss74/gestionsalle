<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>profile</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link
        rel="stylesheet"href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/salles/listesalle.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
</head>

<body
    style="background-image: url('{{ asset('images/univerte.png') }}'); background-size: cover; background-repeat: no-repeat;">
    @include('layouts.navbarunique')
    @role('Admin')
        <div class="container mt-5">
            <div class="row justify-content-center" style="margin-left: 150px">
                <!-- Statistiques des Salles -->
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header">
                            <i class="fa fa-building"></i> Salles Totales
                        </div>
                        <div class="card-body">
                            <a href="{{ route('liste_salles') }}"></a>
                            <h3 class="card-title">{{ $nombresalle ?? 0 }}</h3>
                            <p class="card-text">Nombre total de salles disponibles.</p>
                        </div>
                    </div>
                </div>
                <!-- Statistiques des Demandes -->
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header">
                            <i class="fa fa-envelope"></i> Demandes Totales
                        </div>
                        <div class="card-body">
                            <h3 class="card-title">{{ $nombredemande ?? 0 }}</h3>
                            <p class="card-text">Nombre des demandes effectuées.</p>
                        </div>
                    </div>
                </div>
                <!-- Statistiques des Demandes Acceptées -->
                <div class="col-md-4">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-header">
                            <i class="fa fa-check-circle"></i> Demandes Acceptées
                        </div>
                        <div class="card-body">
                            <a href="{{ route('liste_demandevalidee') }}">
                                <h3 class="card-title">{{ $nombredemandeaccepte ?? 0 }}</h3>
                            </a>
                            <p class="card-text">Nombre de demandes acceptées.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <!-- Statistiques des Salles -->
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3" style="background-color: #f15218;">
                        <a href="{{ route('liste_demandeencour') }}">
                            <div class="card-header">
                                <i class="fas fa-hourglass-half"></i> demande en cours
                            </div>
                        </a>
                        <div class="card-body">
                            <h3 class="card-title">{{ $nombredemandeencour ?? 0 }}</h3>
                            <p class="card-text">Nombre des demande en cour.</p>
                        </div>
                    </div>
                </div>
                {{-- <!-- Statistiques des Demandes -->
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">
                        <i class="fa fa-envelope"></i> Demandes Totales
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $nombredemandeaccepte ?? 0 }}</h3>
                        <p class="card-text">Nombre total de demandes effectuées.</p>
                    </div>
                </div>
            </div>
            <!-- Statistiques des Demandes Acceptées -->
            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">
                        <i class="fa fa-check-circle"></i> Demandes Acceptées
                    </div>
                    <div class="card-body">
                        <h3 class="card-title">{{ $demandesAcceptees ?? 0 }}</h3>
                        <p class="card-text">Nombre de demandes acceptées.</p>
                    </div>
                </div>
            </div> --}}
            </div>
        </div>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-secondary text-white">
                            <i class="fa fa-chart-bar"></i> Statistiques des demandes
                        </div>
                        <div class="card-body">
                            <canvas id="statsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart.js CDN -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('statsChart').getContext('2d');
            const statsChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        'Salles Totales',
                        'Demandes Totales',
                        'Demandes Acceptées',
                        'Demandes en cours'
                    ],
                    datasets: [{
                        label: 'Statistiques',
                        data: [
                            {{ $nombresalle ?? 0 }},
                            {{ $nombredemande ?? 0 }},
                            {{ $demandesAcceptees ?? 0 }},
                            {{ $nombredemandeencour ?? 0 }}
                        ],
                        backgroundColor: [
                            'rgba(13, 110, 253, 0.7)',
                            'rgba(25, 135, 84, 0.7)',
                            'rgba(23, 162, 184, 0.7)',
                            'rgba(241, 82, 24, 0.7)'
                        ],
                        borderColor: [
                            'rgba(13, 110, 253, 1)',
                            'rgba(25, 135, 84, 1)',
                            'rgba(23, 162, 184, 1)',
                            'rgba(241, 82, 24, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            precision: 0
                        }
                    }
                }
            });
        </script>
    @endrole
</body>

</html>
