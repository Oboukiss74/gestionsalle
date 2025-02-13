<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>inscription personnels</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/personnels/personnels_inscrit.css">
<link rel="icon" type="image/png" href="images/logo.png"/>
</head>
<body class="bodypersonnel">
<div class="signup-form">
    <form action="{{ Route('personnel_senregistrer') }}" method="POST">
		@csrf
        @if (session()->has('success'))
           <h3 style="color: red">
            {{ session('success') }}
           </h3>
        @endif
        <div class="form-group">
        	<input type="text" class="form-control" name="id" placeholder="identifiant" required="required">
        </div>
        <div class="form-group">
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="nom" placeholder="Nom" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="prenom" placeholder="prenom" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="prenom" placeholder="prenom" required="required"></div>
				<div class="col"><input type="text" class="form-control" name="prenom" placeholder="prenom" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="matricule" placeholder="No matricule" required="required">
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="telephone" placeholder="telephone" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="mot de passe" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="confirmepassword" placeholder="Confirme mot de Passe" required="required">
        </div>        
        <div class="form-group">
			<label class="form-check-label"><input type="checkbox" required="required"> j'accepte<a href="#"> les termes</a> &amp; <a href="#">et contrats</a></label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block bonton_envoyer">Envoyer</button>
        </div>
    </form>
	<div class="text-center">J'ai deja un compte ! <a href="#" style="color: blue">Se connecter</a></div>
</div>
</body>
</html>