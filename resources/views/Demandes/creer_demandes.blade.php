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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <a class="navbar-brand" href="{{ route('profile') }}"><b style="color: rgb(11, 159, 63);">gs.ujkz</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <div class="navbar-nav">
                <a href="{{ route('profile') }}"class="nav-item nav-link">Acceuil</a>
                @yield('elements')
                @can('voirmesdemandes', App\Models\Demandes::class)
                    <a href="{{ route('Verifie_demande') }}" class="nav-item nav-link">verifier demandes</a>
                @endcan
                <a href="{{ route('mesinfos') }}" class="nav-item nav-link ">mes infos</a>
                @can('view', App\Models\Demandes::class)
                    <a href="{{ route('deatilsdemandes') }}" class="nav-item nav-link">supprimer demande</a>
                @endcan
                <a href="#" class="nav-item nav-link">Contact</a>
            </div>

        </div>
    </nav>


    <div class="formbold-main-wrapper">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="container">
            <div class="formbold-form-wrapper">

                <div class="container">
                    <div id="etape1">
                        <h1>
                           @if (session()->has('success'))
                                <p style="color: red">{{ session('success') }}</p>
                            </p>

                           @endif
                        </h1>
                        <h1> Veuillez entrer la periode de l'occupation de la salle svp.</h1>
                        <form action="{{ route('pagedemandes') }}" method="GET" enctype="multipart/form-data"
                            id="form-etape1">
                            <div class="flex flex-wrap formbold--mx-3">
                                <div class="w-full sm:w-half formbold-px-3">
                                    <div class="formbold-mb-5 w-full">
                                        <label for="date" class="formbold-form-label required"> Date de
                                            debut</label>
                                        <input type="date" name="datedebut" id="datedebut"
                                            class="formbold-form-input" />
                                    </div>
                                </div>
                                <div class="w-full sm:w-half formbold-px-3">
                                    <div class="formbold-mb-5 w-full">
                                        <label for="date" class="formbold-form-label required"> Date de fin</label>
                                        <input type="date" name="datefin" id="datefin"
                                            class="formbold-form-input" />
                                    </div>
                                </div>
                                <div class="w-full sm:w-half formbold-px-3">
                                    <div class="formbold-mb-5">
                                        <label for="time" class="formbold-form-label required"> Heure de debut
                                        </label>
                                        <input type="time" name="heuredebut" id="heuredebut"
                                            class="formbold-form-input" />
                                    </div>
                                </div>
                                <div class="w-full sm:w-half formbold-px-3">
                                    <div class="formbold-mb-5 w-full">
                                        <label for="time" class="formbold-form-label required"> Heure de fin</label>
                                        <input type="time" name="heurefin" id="heurefin"
                                            class="formbold-form-input" />
                                    </div>
                                </div>
                            </div>

                            <div id="etape_suivant">
                                <button class="formbold-btn" type="submit">suivant</button>
                            </div>
                        </form>

                    </div>

                    @if ($sallesDisponibles->count() > 0)
                        <div id="etape2" style="display: none">
                            <a href="{{ route('pagedemandes') }}">Retour</a>
                            <form method="POST" action="{{ route('creer_demande') }}" enctype="multipart/form-data">

                                @csrf

                                <div class="formbold-mb-5 " style="display: none">
                                    <input type="text" name="id_user" id="name"
                                        value="{{ Auth::user()->id }}" class="formbold-form-input " />
                                </div>

                                <div class="formbold-mb-5 ">
                                    <label for="name" class="formbold-form-label required"> nom complet</label>
                                    <input type="text" name="nom" id="name"
                                        value="{{ Auth::user()->nom }} {{ Auth::user()->prenom }}"
                                        class="formbold-form-input " />
                                </div>
                                <div class="formbold-mb-5">
                                    <label for="phone" class="formbold-form-label required"> telephone</label>
                                    <input type="tel" name="telephone" id="phone"
                                        placeholder="votre telephone" class="formbold-form-input" />
                                </div>
                                <div class="formbold-mb-5">
                                    <label for="email" class="formbold-form-label required"> Email </label>
                                    <input type="email" name="mail" id="email"
                                        value="{{ Auth::user()->email }}" class="formbold-form-input" />
                                </div>


                                <div class="w-full sm:w-half formbold-px-3">
                                    <div class="formbold-mb-5">
                                        <input type="hidden" id="datedebut" name="datedebut"
                                            value="{{ $dateDebut }}" placeholder="Nombre de personnes"
                                            class="formbold-form-input" />
                                    </div>
                                </div>
                                <div class="w-full sm:w-half formbold-px-3">
                                    <div class="formbold-mb-5">
                                        <input type="hidden" id="datefin" name="datefin"
                                            value="{{ $dateFin }}" placeholder="date de fin"
                                            class="formbold-form-input" />
                                    </div>
                                </div>
                                <div class="w-full sm:w-half formbold-px-3">
                                    <div class="formbold-mb-5">
                                        <input type="hidden" id="heuredebut" name="heuredebut"
                                            value="{{ $heureDebut }}" placeholder="heure de debut"
                                            class="formbold-form-input" />
                                    </div>
                                </div>
                                <div class="w-full sm:w-half formbold-px-3">
                                    <div class="formbold-mb-5">
                                        <input type="hidden" id="heurefin" name="heurefin"
                                            value="{{ $heureFin }}" placeholder="heure de fin"
                                            class="formbold-form-input" />
                                    </div>
                                </div>


                                <div class="table-responsive">
                                    <div class="accordion" id="accordionExample">


                                        <div class="formbold-mb-5 formbold-pt-3">

                                            <label class="formbold-form-label formbold-form-label-2 required">
                                                Salle
                                            </label>
                                            <div class="flex flex-wrap formbold--mx-3">
                                                <div class="w-full sm:w-half formbold-px-3">
                                                    <div class="formbold-mb-5">
                                                        <ul class="list-group">
                                                            @foreach ($sallesDisponibles as $salle)
                                                                <li class="list-group-item">
                                                                    <div
                                                                        class="d-flex justify-content-between align-items-center">
                                                                        <div>
                                                                            <input type="radio" name="id_salle"
                                                                                value="{{ $salle->id }}" required>
                                                                            <strong>{{ $salle->nom }}</strong> —
                                                                            Capacité
                                                                            : {{ $salle->nombreplace }} places
                                                                        </div>
                                                                        <button type="button"
                                                                            class="btn btn-sm btn-outline-primary"
                                                                            onclick="afficherEquipements({{ $salle->id }})">
                                                                            Voir les équipements
                                                                        </button>
                                                                    </div>

                                                                    <!-- Zone d’affichage des équipements (masquée au départ) -->
                                                                    <div id="equipements-{{ $salle->id }}"
                                                                        class="equipements mt-2"
                                                                        style="display: none;">
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>

                                                    </div>


                                                </div>



                                            </div>

                                        </div>
                                        <div class="w-full sm:w-half formbold-px-3">
                                            <div class="formbold-mb-5">
                                                <label for="Equipement" class="formbold-form-label required">
                                                    nombre de personnes
                                                </label>
                                                <input type="text" name="effectif" id="post-code"
                                                    placeholder="nombre de personnes" class="formbold-form-input" />
                                            </div>
                                        </div>
                                        <div class="w-full sm:w-half formbold-px-3">
                                            <div class="formbold-mb-5">
                                                <label for="motif" class="formbold-form-label required">
                                                    Motif
                                                </label>
                                                <input type="text" name="motif" id="post-code"
                                                    placeholder="motif de la demande" class="formbold-form-input" />
                                            </div>
                                        </div>



                                        <div class="w-full sm:w-half formbold-px-3">
                                            <div class="formbold-mb-5">
                                                <button type="submit" class="formbold-form-input"
                                                    style="background-color: lightgreen">Envoyer</button>

                                            </div>
                                        </div>
                                    </div>

                            </form>
                        </div>

                </div>
                @endif
                @if ($sallesDisponibles->count() == 0)
                    <div class="alert alert-warning mt-3">Aucune salle disponible pour la période sélectionnée.</div>
                @endif


            </div>
        </div>

    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#etape_suivant').on('click', function(e) {
                e.preventDefault();

                // Récupérer les valeurs saisies
                const datedebut = $('#datedebut').val();
                const datefin = $('#datefin').val();
                const heuredebut = $('#heuredebut').val();
                const heurefin = $('#heurefin').val();
                if (!datedebut || !datefin || !heuredebut || !heurefin) {
                    alert('Veuillez remplir toutes les dates et heures');
                    return;
                }
                // Mettre à jour les champs cachés du formulaire d'étape 2
                $('input[name="datedebut"]').val(datedebut);
                $('input[name="datefin"]').val(datefin);
                $('input[name="heuredebut"]').val(heuredebut);
                $('input[name="heurefin"]').val(heurefin);

                $('#etape1').hide();
                $('#etape2').show();
            });
        });

        const salle = @json($sallesDisponibles);

        const salleData = @json($sallesDisponibles);

        function afficherEquipements(id) {
            const selectedSalle = salleData.find(s => s.id == id);
            const container = document.getElementById('equipements-' + id);

            // Masquer tous les autres
            document.querySelectorAll('.equipements').forEach(div => div.style.display = 'none');

            if (selectedSalle && selectedSalle.equipements.length > 0) {
                let html = '<strong>Équipements :</strong><ul>';
                selectedSalle.equipements.forEach(e => {
                    html += `<li>${e.nom}</li>`;
                });
                html += '</ul>';
                container.innerHTML = html;
            } else {
                container.innerHTML = 'Aucun équipement pour cette salle.';
            }

            container.style.display = 'block';
        }
    </script>
</body>

</html>
