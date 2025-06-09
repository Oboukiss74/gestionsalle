@extends('layouts.navbar3')
@section('titre')
    ajout de salles
@endsection
@section('liens')

    <link rel="stylesheet" href="{{ asset('css/salles/salle.css') }}">
@endsection
@section('contenu')
    <div class="formbold-main-wrapper">

        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="formbold-form-wrapper">
            @if (@session()->has('succes'))
                <p style="color: red">{{ session('succes') }}</p>
            @endif
            {{-- <img src="{{ asset('images/logo.jpg') }}"> --}}
            <form action="{{ route('enregistrer_salle') }}" method="POST">
                @csrf
                <div class="formbold-input-flex">
                    <div>
                        <label for="firstname" class="formbold-form-label"> nom de la salle </label>
                        <input type="text" name="nom" id="firstname" placeholder="nom de la salle"
                            class="formbold-form-input" />
                    </div>

                    <div>
                        <label for="lastname" class="formbold-form-label"> code de la salle </label>
                        <input type="text" name="code" id="code" placeholder="code"
                            class="formbold-form-input" />
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="email" class="formbold-form-label"> nombre de place </label>
                        <input type="number" name="nombreplace" id="email" placeholder="nombre de place"
                            class="formbold-form-input" />
                    </div>

                    <div>
                        <label class="formbold-form-label">taile de la salle</label>

                        <select class="formbold-form-input" name="taille" id="occupation">
                            <option value="petite" selected>choix de taille</option>
                            <option value="petite">petite</option>
                            <option value="moyenne">moyenne</option>
                            <option value="grande">grande</option>
                        </select>
                    </div>
                </div>

                <div class="formbold-mb-3">
                    <label for="age" class="formbold-form-label"> Le prix de location </label>
                    <input type="text" name="tarif" id="age" class="formbold-form-input"
                        placeholder="le prix de la salle" />
                </div>

                <div class="formbold-mb-3">
                    <label for="dob" class="formbold-form-label"> Statut de la salle</label>
                    <select name="statut" id="statut" class="formbold-form-input">
                        <option value="selctionne">Selectionnez</option>
                        <option value="payante">payante</option>
                        <option value="non payante">non payante</option>
                    </select>
                    {{-- <input type="text" name="statut" id="dob" class="formbold-form-input"
                        placeholder="statut de la salle" /> --}}
                </div>


                <div class="formbold-input-flex">
                    <div>
                        <label for="email" class="formbold-form-label"> la longitude </label>
                        <input type="text" name="longitude" id="email" placeholder="la longitude"
                            class="formbold-form-input" />
                    </div>

                    <div>
                        <label for="latitude" class="formbold-form-label"> la latitude </label>
                        <input type="text" name="latitude" id="email" placeholder="la latitude"
                            class="formbold-form-input" />
                    </div>


                </div>



                <button class="formbold-btn">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection
