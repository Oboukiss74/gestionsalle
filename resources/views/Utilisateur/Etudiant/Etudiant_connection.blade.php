<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Sign in Form with Icons</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="images/logo.png"/>
    <link rel="stylesheet" href="css/Etudiant/etudiant_connection.css">

</head>

<body class="body_etudiant_connection">
    <div class="login-form">
        <form action="{{ route('etudiant_connecter') }}" method="post">
            @csrf
            <h2 class="text-center">Se connecter</h2>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <span class="fa fa-user"></span>
                        </span>
                    </div>
                    <input type="email" name="email" placeholder="email" value="{{ old('email') }}"
                        class="@error('email') is-invalid @enderror form-control">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>
                    <input type="password" name="passe" class="@error('passe') is-invalid @enderror form-control" placeholder="mot de passe">
                    @error('passe')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
            </div>
            <div class="bottom-action clearfix">
                <label class="float-left form-check-label"><input type="checkbox"> Se souvenir</label>
                <a href="#" class="float-right">Mot de passe oublié?</a>
            </div>
        </form>
        <p class="text-center small">Pas de compte! <a href="#">Creer un compte</a>.</p>
    </div>
</body>

</html>
