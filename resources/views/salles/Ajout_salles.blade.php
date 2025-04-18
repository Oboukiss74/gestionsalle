@extends('layouts.navbar3')
@section('liens')
    <link rel="stylesheet" href="{{ asset('css/salles/salle.css') }}">
@endsection
@section('contenu')
    <div class="formbold-main-wrapper">
        @if (@session()->has('succes'))
            <p style="color: red">{{ session('succes') }}</p>
        @endif
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="formbold-form-wrapper">
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
                        <input type="text" name="nombreplace" id="email" placeholder="nombre de place"
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

                <div class="formbold-mb-3 formbold-input-wrapp">
                    <label for="phone" class="formbold-form-label"> Equipement </label>

                    <div>
                        <input type="text" name="equipement" id="areacode" placeholder="les equipements"
                            class="formbold-form-input formbold-w-45" />


                    </div>
                </div>

                <div class="formbold-mb-3">
                    <label for="age" class="formbold-form-label"> Le prix de location </label>
                    <input type="text" name="tarif" id="age" class="formbold-form-input"
                        placeholder="le prix de la salle" />
                </div>

                <div class="formbold-mb-3">
                    <label for="dob" class="formbold-form-label"> Statut de la salle</label>
                    <input type="text" name="statut" id="dob" class="formbold-form-input"
                        placeholder="statut de la salle" />
                </div>

                <div class="formbold-mb-3">
                    <label for="address" class="formbold-form-label"> Localisation </label>

                    {{-- <input type="text" name="localisation" id="address" placeholder="Street address"
                        class="formbold-form-input formbold-mb-3" /> --}}
                    <input type="text" name="localisation" id="address2" placeholder="lien geographique"
                        class="formbold-form-input" />
                </div>

                {{-- <div class="formbold-mb-3">
                    <label for="message" class="formbold-form-label">
                        Cover Letter
                    </label>
                    <textarea rows="6" name="message" id="message" class="formbold-form-input"></textarea>
                </div> --}}

                <button class="formbold-btn">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection
