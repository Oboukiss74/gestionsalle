<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Simple Contact Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="images/logo.png"/>

</head>

<body>
    <div class="container-xl">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="contact-form">
                    <h1>inscription</h1>
                    <p class="hint-text"></p>
                    @if (session()->has('message'))
                        <!-- #region -->
                        <h3 class="hint-text" style="color: red">
                            {{ session('message') }}
                        </h3>
                    @endif
                    <form action="{{ route('locataire_Enregistrer') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="inputid">id</label>
                            <input type="text" class="form-control" id="inputEmail" name="id" required>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="inputFirstnom">nom</label>
                                    <input type="text" class="form-control" name="nom" id="inputFirstName"
                                        required placeholder="nom">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="inputLastprenom">prenom</label>
                                    <input type="text" class="form-control" name="prenom" id="inputLastName"
                                        required placeholder="prenom">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail"> Addresse Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" required
                                placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="inputtelephone">telephone</label>
                            <input type="text" class="form-control" id="inputEmail" name="telephone" required
                                placeholder="telephone">
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="inputFirstcnib">cnib</label>
                                    <input type="text" class="form-control" name="cnib" id="inputFirstName"
                                        required placeholder="piéce d'identité">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="inputLastName">date d'edtion</label>
                                    <input type="date" class="form-control" name="datecnib" id="inputLastName"
                                        required placeholder="date d'edtion">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputpassword">creer un mot de passe</label>
                            <input type="password" class="form-control" id="inputEmail" name="password" required
                                placeholder="mot de passe">
                        </div>
                        <div class="form-group">
                            <label for="inputconfirmepassword">confirme le mot de passe</label>
                            <input type="password" class="form-control" id="inputEmail" name="confirmepassword" required
                                placeholder="confirmer">
                        </div>

                        <input type="submit" class="btn btn-primary" value="Envoyer">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
