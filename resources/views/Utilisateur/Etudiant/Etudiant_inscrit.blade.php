<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700">
<title>Inscrition etudiant</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="icon" type="image/png" href="images/logo.png"/>
<link rel="stylesheet" href="{{asset('css/Etudiant/etudiant_inscrit.css')}}">

</head>
<body class="body_etudiant">
<div class="signup-form">
    <form action="{{ route('etudiants_enregistrer') }}" method="post">
		@csrf
		<div class="form-header">
			<h2>s'inscrire</h2>
			<p></p>
		</div>
        <div class="form-group" >
			<label class="required">identifiant</label>
        	<input type="text" class="form-control" name="id" required="required" placeholder="identifiant">
        </div>
       
        <div class="form-group" >
			<label class="required">nom</label>
        	<input type="text" class="form-control" name="nom" required="required" placeholder="nom">
        </div>
        <div class="form-group">
			<label class="required" >prenom</label>
        	<input type="text" class="form-control" name="prenom" required="required"  placeholder="prenom">
        </div>
		<div class="form-group" >
			<label class="required">profile</label>
        	<select name="profile">
				<option value="" style="text-decoration: none">
					selection
				</option>
				<option value="etudiant">
					etudiant
				</option>
				<option value="locataire">
					locataire
				</option>
			</select>
        </div>
        <div class="form-group">
			<label class="required" >mail</label>
        	<input type="email" class="form-control" name="email" required="required"  placeholder="mail">
        </div>
        <div class="form-group">
			<label class="required" >telephone</label>
        	<input type="text" class="form-control" name="telephone" required="required"  placeholder="telephone">
        </div>
        <div class="form-group">
			<label class="required" >INE</label>
        	<input type="text" class="form-control" name="INE"   placeholder="INE">
        </div>
		<div class="form-group">
			<label class="required">mot de passe</label>
            <input type="password" class="form-control" name="passe" required="required" placeholder="mot de passe">
        </div>
		<div class="form-group">
			<label class="required">Confirme mot de  passe</label>
            <input type="password" class="form-control" name="confirmepasse" required="required" placeholder="Confirme mot de  passe">
        </div>        
        <div class="form-group">
			<label class="form-check-label"><input type="checkbox" required="required"> j'accepte <a href="#">les termes et conditons</a> &amp; <a href="#">politiques</a></label>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block btn-lg">Envoyer</button>
		</div>	
    </form>
	<div class="text-center small">Deja un compte ? <a href="#">se conneter</a></div>
</div>
</body>
</html>