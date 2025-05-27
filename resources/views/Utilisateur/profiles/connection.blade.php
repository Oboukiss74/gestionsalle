
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>connexion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="images/logo.png" />
    <link rel="stylesheet" href="{{ asset('css/Etudiant/etudiant_connection.css') }}">

</head>

<body class="body_etudiant_connection">
    @include('layouts.navbarfinal')
    <div class="login-form body_etudiant_connections">
        <form action="{{ route('connexion') }}" method="POST">
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
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
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
                    <input type="password" name="password" class="@error('password') is-invalid @enderror form-control"
                        placeholder="mot de password">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
            </div>
            <div class="bottom-action clearfix">
                <label class="float-left form-check-label"><input type="checkbox"> Se souvenir</label>
                <a href="#" class="float-right">Mot de password oublié?</a>
            </div>
        </form>
        <p class="text-center small">Pas de compte! <a href="#">Creer un compte</a>.</p>
    </div>
</body>

</html>
