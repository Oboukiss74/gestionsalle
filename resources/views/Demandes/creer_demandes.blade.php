<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Raleway">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creer une demande</title>
    <link rel="stylesheet" href="{{ asset('css/demande/creer_demande.css') }}">
    <link rel="icon" type="image/png" href="images/logo.png" />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#"><b style="color: rgb(244, 244, 13);font-size: 30px">Gestion</b> <b
                style="color:rgb(249, 82, 82);font-size: 30px"> Sall</b><b
                style="color: rgb(11, 159, 63);font-size: 30px">es</b></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <div class="navbar-nav">
                <a href="{{ route('profile') }}"class="nav-item nav-link">Acceuil</a>
                @yield('elements')
                <a href="{{ route('Verifie_demande') }}" class="nav-item nav-link">voir demande</a>
                <a href="#" class="nav-item nav-link ">mes infos</a>
                <a href="#" class="nav-item nav-link">supprimer demande</a>
                <a href="#" class="nav-item nav-link">Contact</a>
            </div>
            <div class="navbar-nav ml-auto">
                <div class="navbar-form-wrapper">
                    <form class="navbar-form form-inline">
                        <div class="input-group search-box">
                            <input type="text" id="search" class="form-control" placeholder="Search Here...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="material-icons">&#xE8B6;</i>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </nav>
    <div class="formbold-main-wrapper">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="formbold-form-wrapper">

            <div class="container">
                <div id="etape1" >
                    <form action="{{ route('pagedemandes') }}" method="GET" enctype="multipart/form-data">
                        {{-- @csrf --}}


                        {{-- {{-- <div class="formbold-mb-5 " style="display: none">
                            <input type="text" name="id_user" id="name" value="{{ Auth::user()->id }}"
                                class="formbold-form-input " />
                        </div>

                        <div class="formbold-mb-5 ">
                            <label for="name" class="formbold-form-label required"> nom complet</label>
                            <input type="text" name="nom" id="name"
                                value="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}" class="formbold-form-input " />
                        </div>
                        <div class="formbold-mb-5">
                            <label for="phone" class="formbold-form-label required"> telephone</label>
                            <input type="tel" name="telephone" id="phone" placeholder="votre telephone"
                                class="formbold-form-input" />
                        </div>
                        <div class="formbold-mb-5">
                            <label for="email" class="formbold-form-label required"> Email </label>
                            <input type="email" name="mail" id="email" value="{{ Auth::user()->email }}"
                                class="formbold-form-input" />
                        </div>
                        <div class="formbold-mb-5">
                            <label for="cnib" class="formbold-form-label ">
                                <h4 class="required">fichier CNIB pdf</h4>
                            </label>
                            <input type="file" name="cnib" id="email" placeholder="fichier piece"
                                class="formbold-form-input" accept="pdf" style="" />
                        </div> --}}

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
                                    <input type="time" name="heuredebut" id="heuredebut"
                                        class="formbold-form-input" />
                                </div>
                            </div>
                            <div class="w-full sm:w-half formbold-px-3">
                                <div class="formbold-mb-5 w-full">
                                    <label for="time" class="formbold-form-label required"> Heure de fin</label>
                                    <input type="time" name="heurefin" id="date" class="formbold-form-input" />
                                </div>
                            </div>
                        </div>

                        {{-- <div class="formbold-mb-5 formbold-pt-3">
                            <label class="formbold-form-label formbold-form-label-2 required">
                                Salle
                            </label>
                            <div class="flex flex-wrap formbold--mx-3">
                                <div class="w-full sm:w-half formbold-px-3">
                                    <div class="formbold-mb-5">
                                        <select name="salle" id="" class="formbold-form-input required">
                                            <option value="selection" aria-placeholder="selectionne">selectionne la salle
                                            </option>
                                            <option value="salle1">salle enseignant (30 places)</option>
                                            <option value="salle2">salle visio (30 places)</option>
                                            <option value="salle2">grande salle (160 places)</option>
                                        </select>

                                    </div>
                                </div>
                                <div class="w-full sm:w-half formbold-px-3">
                                    <div class="formbold-mb-5">
                                        <input type="text" name="effectif" id="place"
                                            placeholder="Nombre de personnes" class="formbold-form-input" />
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
                        </div> --}}

                        <div id="etape_suivant">
                            <button class="formbold-btn">suivant</button>
                        </div>
                    </form>

                </div>
                @if ($sallesDisponibles->count() > 0)
                    <div id="etape2" style="display: none">
                        <form method="POST" action="{{ route('creer_demande') }}" enctype="multipart/form-data">

                            @csrf

                            <div class="formbold-mb-5 " style="display: none">
                                <input type="text" name="id_user" id="name" value="{{ Auth::user()->id }}"
                                    class="formbold-form-input " />
                            </div>

                            <div class="formbold-mb-5 ">
                                <label for="name" class="formbold-form-label required"> nom complet</label>
                                <input type="text" name="nom" id="name"
                                    value="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}"
                                    class="formbold-form-input " />
                            </div>
                            <div class="formbold-mb-5">
                                <label for="phone" class="formbold-form-label required"> telephone</label>
                                <input type="tel" name="telephone" id="phone" placeholder="votre telephone"
                                    class="formbold-form-input" />
                            </div>
                            <div class="formbold-mb-5">
                                <label for="email" class="formbold-form-label required"> Email </label>
                                <input type="email" name="mail" id="email"
                                    value="{{ Auth::user()->email }}" class="formbold-form-input" />
                            </div>
                            <div class="formbold-mb-5">
                                <label for="cnib" class="formbold-form-label ">
                                    <h4 class="required">fichier CNIB pdf</h4>
                                </label>
                                <input type="file" name="cnib" id="email" placeholder="fichier piece"
                                    class="formbold-form-input" accept="pdf" style="" />
                            </div>

                            <div class="w-full sm:w-half formbold-px-3">
                                <div class="formbold-mb-5">
                                    <input type="text" id="place" type="hidden" name="datedebut"
                                        value="{{ $dateDebut }}" placeholder="Nombre de personnes"
                                        class="formbold-form-input" />
                                </div>
                            </div>
                            <div class="w-full sm:w-half formbold-px-3">
                                <div class="formbold-mb-5">
                                    <input type="text" id="place" type="hidden" name="datefin"
                                        value="{{ $dateFin }}" placeholder="Nombre de personnes"
                                        class="formbold-form-input" />
                                </div>
                            </div>
                            <div class="w-full sm:w-half formbold-px-3">
                                <div class="formbold-mb-5">
                                    <input type="text" id="place" type="hidden" name="heuredebut"
                                        value="{{ $heureDebut }}" placeholder="Nombre de personnes"
                                        class="formbold-form-input" />
                                </div>
                            </div>
                            <div class="w-full sm:w-half formbold-px-3">
                                <div class="formbold-mb-5">
                                    <input type="text" id="place" type="hidden" name="heurefin"
                                        value="{{ $heureFin }}" placeholder="Nombre de personnes"
                                        class="formbold-form-input" />
                                </div>
                            </div>


                            <div class="table-responsive">
                                <table class="table table-hover">

                                    <tbody>
                                        <option value="selection" aria-placeholder="selectionne">selectionne le bâtiment
                                        </option>
                                        <select name="salle" id="" class="formbold-form-input required">
                                            @foreach ($sallesDisponibles as $salle)
                                                <div class="w-full sm:w-half formbold-px-3">
                                                    <div class="formbold-mb-5">

                                                        <option id="salle_{{ $salle->id }}"
                                                            value="{{ $salle->id }}" required
                                                            class="formbold-form-input required">{{ $salle->nom }}
                                                        </option>

                                                    </div>
                                                </div>
                                            @endforeach
                                        </select>
                                    </tbody>
                                </table>
                                <div class="formbold-mb-5 formbold-pt-3">
                                    <label class="formbold-form-label formbold-form-label-2 required">
                                        Salle
                                    </label>
                                    <div class="flex flex-wrap formbold--mx-3">
                                        <div class="w-full sm:w-half formbold-px-3">
                                            <div class="formbold-mb-5">
                                                <select name="salle" id=""
                                                    class="formbold-form-input required">
                                                    <option value="selection" aria-placeholder="selectionne">
                                                        selectionne la salle

                                                    </option>
                                                    <option value="salle1">salle enseignant (30 places)</option>
                                                    <option value="salle2">salle visio (30 places)</option>
                                                    <option value="salle2">grande salle (160 places)</option>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="w-full sm:w-half formbold-px-3">
                                            <div class="formbold-mb-5">
                                                <input type="text" name="effectif" id="place"
                                                    placeholder="Nombre de personnes" class="formbold-form-input" />
                                            </div>
                                        </div>
                                        <div class="w-full sm:w-half formbold-px-3">
                                            <div class="formbold-mb-5">
                                                <label for="Motif" class="formbold-form-label required"> Motif
                                                </label>
                                                <input type="text" name="motif" id="state"
                                                    placeholder="motif de la demande" class="formbold-form-input" />
                                            </div>
                                        </div>
                                        <div class="w-full sm:w-half formbold-px-3">
                                            <div class="formbold-mb-5">
                                                <label for="Equipement" class="formbold-form-label required">
                                                    Equipements
                                                </label>
                                                <input type="text" name="equipement" id="post-code"
                                                    placeholder="Equipements necessaires"
                                                    class="formbold-form-input" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            @endif

        </div>
    </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#etape_suivant').on('click', function (e) {
                e.preventDefault(); // empêcher le GET de se faire
                $('#etape1').hide();
                $('#etape2').show();
            });
        });
    </script>
</body>

</html>
