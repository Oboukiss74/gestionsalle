<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
<link rel="icon" type="image/png" href="images/logo.png" />
@extends('layouts.navbar')

@section('title', 'mes infos')

@section('infos')
    <div class="modifier">
        <h3>mes infos</h3>
        <div class="modifiers">
            <div class="toutesinfos">
                <form action="{{ route('profile.modifier') }}" method="post">
                    @csrf

                    <div class="infos">
                        <div class="modifiersinofs">
                            <label for="">nom</label>
                            <input type="text" value="{{ Auth::user()->nom }} " class="saisieinfos" name="nom">
                            <x-input-error class="mt-2" :messages="$errors->get('nome')" />
                        </div>
                        <div class="modifiersinofs prenom">
                            <label for="">prenom</label>
                            <input type="text" value=" {{ Auth::user()->prenom }}" class="saisieinfos" name="prenom">
                            <x-input-error class="mt-2" :messages="$errors->get('prenom')" />
                        </div>
                    </div>

                    <div class="mail modifiersinofs">
                        <label for="">votre mail</label>
                        <input type="mail" value="{{ Auth::user()->email }}" class="saisieinfos" name="email">

                    </div>
                    <div class="mail modifiersinofs">
                        <label for="">Téléphone</label>
                        <input type="text"
                            value="{{ Auth::user()->Etudiant?->telephone ?? (Auth::user()->Personnel?->telephone ?? (Auth::user()->Locations?->telephone ?? '')) }}"
                            class="saisieinfos" name="telephone">

                    </div>


                    <div class="passe modifiersinofs">
                        <label for="">mot de passe</label>
                        <input type="password" placeholder="nouveau mot de passe" class="saisieinfos" name="password">
                        <x-input-error class="mt-2" :messages="$errors->get('password')" />
                    </div>
                    <br>
                    <div class="passe modifiersinofs">
                        <input type="password" placeholder="confirmer" class="saisieinfos">
                    </div>
                    <br>
                    <div class="passe modifiersinofs">
                        <button class="envoi">Modifier</button>
                    </div>
                </form>
                <form action="{{ route('profile.supprimer') }}" method="GET">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Voulez-vous vraiment supprimer votre compte ?');"
                        class="btn btn-danger">
                        Supprimer mon compte
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
