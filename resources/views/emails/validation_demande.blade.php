<!DOCTYPE html>
<html>
<head>
    <title>Nouvelle demande de réservation</title>
</head>
<body>
    <h2>Une nouvelle demande de réservation a été soumise</h2>
    <p><strong>Nom :</strong> {{ $demande->nom }}</p>
    <p><strong>Téléphone :</strong> {{ $demande->telephone }}</p>
    <p><strong>Email :</strong> {{ $demande->mail }}</p>
    <p><strong>Salle demandée :</strong> {{ $demande->salle }}</p>
    {{-- <p><strong>Effectif :</strong> {{ $demande->effectif }}</p> --}}
    <p><strong>Motif :</strong> {{ $demande->motif }}</p>
    <p><strong>Date :</strong> Du {{ $demande->datedebut }} au {{ $demande->datefin }}</p>
    <p><strong>Heure :</strong> De {{ $demande->heuredebut }} à {{ $demande->heurefin }}</p>

    <p>Veuillez vérifier et valider cette demande.</p>
</body>
</html>
