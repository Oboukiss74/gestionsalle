<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Quittance N° {{ $demande->id }}</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1 style="text-align: center;"> QUITTANCE N° {{ $demande->id }}</h1>

    <table>
        <tr>
            <th>Demandeur</th>
            <td>{{ $demande->user->nom }} {{ $demande->user->prenom }}</td>
        </tr>
        <tr>
            <th>N° cnib</th>
            <td>{{ $demande->user->cnib }} </td>
        </tr>
        <tr>
            <th>Téléphone</th>
            <td>{{ $demande->user->telephone }}</td>
        </tr>
        <tr>
            <th>Date de début</th>
            <td>{{ $demande->datedebut }}</td>
        </tr>
        <tr>
            <th>Date de fin</th>
            <td>{{ $demande->datefin }}</td>
        </tr>
        <tr>
            <th>Heure de début</th>
            <td>{{ $demande->heuredebut }}</td>
        </tr>
        <tr>
            <th>Heure de fin</th>
            <td>{{ $demande->heurefin }}</td>
        </tr>
        <tr>
            <th>Effectif</th>
            <td>{{ $demande->effectif }} personnes</td>
        </tr>
        <tr>
            <th>Motif</th>
            <td>{{ $demande->motif }}</td>
        </tr>
        <tr>
            <th>salle</th>
            <td>{{ $demande->salle->nom }}</td>
        </tr>
        <tr>
            <th>État</th>
            <td>
                @if ($demande->etat === 'Validée')
                    <span style="color: green;">Demandes acceptée</span>
                @elseif($demande->etat === 'Refusée')
                    <span style="color: red;">Demande refusée</span>
                @else
                    <span style="color: orange;">Demande En attente</span>
                @endif
            </td>
        </tr>
    </table>

    <div style="margin-top: 30px; text-align: center;">
        <p>Émis le: {{ now()->format('d/m/Y à H:i') }}</p>
        <p>Ce document fait foi de l'approbation de votre demande de réservation.</p>
    </div>

    <div style="margin-top: 30px; text-align: left;">
        <p>Vuillez vous addresser au responsable pour des reclamations</p>
        <p>contact: +226 xx xx xx xx </p>
    </div>
</body>

</html>
