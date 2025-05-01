<title>@yield('title', 'inscription') </title>
<link rel="stylesheet" href="css/users.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link rel="icon" type="image/png" href="images/logo.png" />
@extends('layouts.navbar2')

@section('liens')

    <a href="{{ route('connexion') }}" class="nav-item nav-link" style="transform: translate(-100px,0); color: white;"><i class="fa-solid fa-unlock-keyhole"></i><span>connexion</span></a>
    <a href="{{ route('register') }}" class="nav-item nav-link"><i class="fa-solid fa-address-card" style="color: white"></i><span>S'inscrire</span></a>

@endsection
@section('infos')
    <div class="signup-form">
        <form action="{{ route('valider') }}" method="POST">
            @csrf
            @if (session()->has('success'))
                <h3 style="color: red">
                    {{ session('success') }}
                </h3>
            @endif

            <div class="form-group">
                <div class="row">
                    <div class="col"><input type="text" class="form-control" name="nom" placeholder="Nom"
                            required="required"></div>
                    <div class="col"><input type="text" class="form-control" name="prenom" placeholder="prenom"
                            required="required"></div>

                </div>
            </div>

            <div class="form-group">
                <label for="choix">Sexe</label>
                <select name="sexe" id="choixsexe" class="selcetion_sexe">
                    <option value="selection">
                        selectionne
                    </option>

                    <option value="Feminin">
                        Feminin
                    </option>

                    <option value="Public">
                        masculin
                    </option>
                </select>
            </div>


            <div class="form-group">
                <label for="choix">Votre profile</label>
                <select name="profile" id="choix" onchange="afficherChamps()" class="selcetion_profile"
                    style="border: white">
                    <option value="selection">
                        selectionne
                    </option>
                    <option value="Public">
                        Public
                    </option>
                    <option value="Etudiant">
                        Etudiant
                    </option>
                    <option value="Personnel">
                        Personnel
                    </option>
                </select>

            </div>

            <div class="form-group">
                <label for="">numero cnib</label>
                <input type="text" class="form-control" name="cnib" placeholder="CNIB" required="required">
            </div>
            {{-- <div class="form-group">
                <label for="">fichier cnib</label>
                <input type="file" class="form-control" name="cnibfichier" placeholder="CNIB PDF" >
            </div> --}}

            <div class="form-group">
                <label for="">delivré le:</label>
                <input type="date" class="form-control" name="datecnib" placeholder="delivrée le" required="required">
            </div>



            <div class="form-group" id="publicDiv" style="display: none;">
                <label for="Public" style="color: red"> suivant</label>
                {{-- <input type="text" class="form-control" name="Public" placeholder="Public"> --}}
            </div>

            <div class="form-group" id="matriculeDiv" style="display: none;">
                <label for="">matricule</label>
                <input type="text" class="form-control"  name="matricule" placeholder="matricule" >
            </div>

            <div class="form-group" id="fonctionDiv" style="display: none;">
                <label for="">fonction</label>
                <input type="text" class="form-control"  name="fonction" placeholder="fonction" >
            </div>

            <div class="form-group">
                <label for="">telephone</label>
                <input type="text" class="form-control" name="telephone" placeholder="telephone" required="required">
            </div>

            <div class="form-group" id="ineDiv" style="display: none;">
                <label for="INE">INE</label>
                <input type="text" class="form-control" name="INE" placeholder="INE">
            </div>

            <div class="form-group" id="universiteDiv" style="display: none;">
                <label for="INE">universite</label>
                <input type="text" class="form-control" name="universite" placeholder="universite">
            </div>

            <div class="form-group" id="filiereDiv" style="display: none;">
                <label for="INE">filiere</label>
                <input type="text" class="form-control" name="filiere" placeholder="filiere">
            </div>

            <div class="form-group">
                <label for="">votre mail</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required="required">
            </div>

            <div class="form-group">
                <label for="">creer un mot de passe</label>
                <input type="password" class="form-control" name="password" placeholder="mot de passe" required="required">
            </div>

            <div class="form-group">
                <input type="password" class="form-control" name="confirmepassword" placeholder="Confirme mot de Passe"
                    required="required">
            </div>

            <div class="form-group">
                <label class="form-check-label"><input type="checkbox" required="required"> j'accepte<a href="#">
                        les termes</a> &amp; <a href="#">et contrats</a></label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block">Envoyer</button>

            </div>

        </form>
        <div class="text-center">J'ai deja un compte ! <a href="{{ route('connexion') }}" style="color: blue">Se connecter</a></div>
        <script>
            function afficherChamps() {
                var choix = document.getElementById("choix").value;

                // Sélectionner les div contenant les champs
                var matriculeDiv = document.getElementById("matriculeDiv");
                var fonctionDiv = document.getElementById("fonctionDiv");
                var ineDiv = document.getElementById("ineDiv");
                var universiteDiv = document.getElementById("universiteDiv");
                var filiereDiv = document.getElementById("filiereDiv");

                // Cacher les champs par défaut
                matriculeDiv.style.display = "none";
                fonctionDiv.style.display = "none";
                ineDiv.style.display = "none";
                publicDiv.style.display = "none";
                universiteDiv.style.display = "none";
                filiereDiv.style.display = "none";

                // Afficher uniquement le champ correspondant au choix
                if (choix === "Personnel") {
                    matriculeDiv.style.display = "block";
                    fonctionDiv.style.display = "block";
                } else if (choix === "Etudiant") {
                    ineDiv.style.display = "block";
                    universiteDiv.style.display = "block";
                    filiereDiv.style.display = "block";
                } else if (choix === "Public") {
                    publicDiv.style.display = "block";
                }
            }
        </script>

    </div>
@endsection
