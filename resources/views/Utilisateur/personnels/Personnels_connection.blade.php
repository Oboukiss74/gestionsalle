<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Login Form with Avatar Image</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/personnels/personnels_connecter.css">
    <link rel="icon" type="image/png" href="images/logo.png" />
</head>

<body id="body_personnel_connecter">
    @if (session()->has('error'))
        <h4  class="connexion_erreur" >
            {{ session('error') }}
        </h4>
    @endif
    <div class="login-form">
        <form action="{{ route('personnels_conneter') }}" method="post">

            @csrf
            <div class="avatar">
                <img src="/examples/images/avatar.png" alt="Avatar">
            </div>
            <h2 class="text-center">Connection</h2>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="mail" required="required"
                    value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="mot de passe"
                    required="required">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">se connecter</button>
            </div>
            <div class="bottom-action clearfix">
                <label class="float-left form-check-label"><input type="checkbox"> Se souvenir</label>
                <a href="#" class="float-right">mot de passe oublié?</a>
            </div>
        </form>
        <p class="text-center small">je ne pas de compte? <a href="#">s'inscrire!</a></p>
    </div>
</body>

</html>
