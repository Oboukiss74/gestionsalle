<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion Locataire</title>
    <link rel="stylesheet" href="css/locataire/locataire_connection.css">
    <link rel="icon" type="image/png" href="images/logo.png"/>
</head>

<body>

    <body>
        <nav>
            <ul>
                <li><a href="#">Connexion</a></li>
            </ul>
        </nav>
        <br>
        <form class="box" action="{{ route('locataire_connecter') }}" method="post">
            @csrf
            {{-- <h1 class="box-title">S'inscrire</h1> --}}
            {{-- <input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur" required /> --}}
            <input type="text" class="box-input" name="email" placeholder="Email" required />
            <input type="password" class="box-input" name="password" placeholder="Mot de passe" required />
            <input list="browsers" style="display: none;" class="box-input">

            <datalist id="browsers">
                <option value="Internet Explorer">
                <option value="Firefox">
                <option value="Google Chrome">
                <option value="Opera">
                <option value="Safari">
            </datalist>
            <button class="box-button">Se connecter</button>
            {{-- <input type="submit"  value="Se connecter" class="box-button" /> --}}
        </form>
    </body>
</body>

</html>
