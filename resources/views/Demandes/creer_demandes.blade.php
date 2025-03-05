<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creer une demande</title>
    <link rel="stylesheet" href="{{ asset('css/demande/creer_demande.css') }}">
    <link rel="icon" type="image/png" href="images/logo.png" />
</head>

<body>
    <div class="formbold-main-wrapper">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="formbold-form-wrapper">
            <form action="{{ route('creer_demande') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="formbold-mb-5 ">
                    <select name="id_salle" id="" class="formbold-form-label required">
                        <option value="">choisir une salle</option>
                        @foreach ($salles as $salle)
                            <option value="{{ $salle->id }}" class="formbold-form-input ">
                                {{ $salle->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="formbold-mb-5 ">
                    <label for="name" class="formbold-form-label required"> nom complet</label>
                    <input type="text" name="nom" id="name" placeholder="nom"
                        class="formbold-form-input " />
                </div>
                <div class="formbold-mb-5">
                    <label for="phone" class="formbold-form-label required"> telephone</label>
                    <input type="tel" name="telephone" id="phone" placeholder="votre telephone"
                        class="formbold-form-input" />
                </div>
                <div class="formbold-mb-5">
                    <label for="email" class="formbold-form-label required"> Email </label>
                    <input type="email" name="mail" id="email" placeholder="email"
                        class="formbold-form-input" />
                </div>
                <div class="formbold-mb-5">
                    <label for="cnib" class="formbold-form-label ">
                        <h4 class="required">fichier cnib pdf</h4>
                    </label>
                    <input type="file" name="cnib" id="email" placeholder="fichier piece"
                        class="formbold-form-input" accept="pdf" style="" />
                </div>

                <div class="flex flex-wrap formbold--mx-3">
                    <div class="w-full sm:w-half formbold-px-3">
                        <div class="formbold-mb-5 w-full">
                            <label for="date" class="formbold-form-label required"> Date de debut</label>
                            <input type="date" name="datedebut" id="date" class="formbold-form-input" />
                        </div>
                    </div>
                    <div class="w-full sm:w-half formbold-px-3">
                        <div class="formbold-mb-5 w-full">
                            <label for="date" class="formbold-form-label required"> Date de fin</label>
                            <input type="date" name="datefin" id="date" class="formbold-form-input" />
                        </div>
                    </div>
                    <div class="w-full sm:w-half formbold-px-3">
                        <div class="formbold-mb-5">
                            <label for="time" class="formbold-form-label required"> Heure de debut </label>
                            <input type="time" name="heuredebut" id="heuredebut" class="formbold-form-input" />
                        </div>
                        <div class="formbold-mb-5">
                            <label for="time" class="formbold-form-label required"> Heure de fin </label>
                            <input type="time" name="heurefin" id="heurefin" class="formbold-form-input" />
                        </div>
                    </div>
                </div>

                <div class="formbold-mb-5 formbold-pt-3">
                    <label class="formbold-form-label formbold-form-label-2">
                        Salle
                    </label>
                    <div class="flex flex-wrap formbold--mx-3">
                        <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5">
                                <select name="salle" id="" class="formbold-form-input required">
                                    <option value="selection" aria-placeholder="selectionne">selectionne la salle
                                    </option>
                                    <option value="salle1">salle 1</option>
                                    <option value="salle2">salle 2</option>
                                </select>

                            </div>
                        </div>
                        <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5">
                                <input type="text" name="effectif" id="place" placeholder="Nombre de personnes"
                                    class="formbold-form-input" />
                            </div>
                        </div>
                        <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5">
                                <label for="Motif" class="formbold-form-label required"> Motif </label>
                                <input type="text" name="motif" id="state"
                                    placeholder="motif de la demande" class="formbold-form-input" />
                            </div>
                        </div>
                        <div class="w-full sm:w-half formbold-px-3">
                            <div class="formbold-mb-5">
                                <label for="Equipement" class="formbold-form-label required"> Equipements </label>
                                <input type="text" name="equipement" id="post-code"
                                    placeholder="Equipements necessaires" class="formbold-form-input" />
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <button class="formbold-btn">Envoyer</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
