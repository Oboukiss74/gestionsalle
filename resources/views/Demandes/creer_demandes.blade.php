<!DOCTYPE html>
<html lang="en">

<head>
    <title>Creer une demande</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Raleway">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link
        rel="stylesheet"href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/salles/listesalle.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">
    <!-- Theme style -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('css/demande/creer_demande.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    {{-- pour les entête --}}
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>

<body>
    @include('layouts.navbarunique')



    <div class="formbold-main-wrapper" style="transform: translate(150px);">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="container" style="padding: 2%;padding-right: initial; margin-left: 70px;">
            <div class="formbold-form-wrapper">

                <div class="container">
                    <div id="etape1" style="{{ $requeteUtilisateur ? 'display:none;' : '' }}">
                        <h1>
                            @if (session()->has('success'))
                                <p style="color: rgb(34, 255, 0)">{{ session('success') }}</p>
                                </p>
                            @endif
                        </h1>
                        <h1>
                            @if (session()->has('message'))
                                <p style="color: rgb(0, 255, 21)">{{ session('success') }}</p>
                                </p>
                            @endif
                        </h1>
                        <h1> Veuillez entrer la periode de l'occupation de la salle svp.</h1>
                        <form action="{{ route('pagedemandes') }}" method="GET" >
                            <div class="flex flex-wrap formbold--mx-3">
                                <div class="w-full sm:w-half formbold-px-3">
                                    <div class="formbold-mb-5 w-full">
                                        <label for="date" class="formbold-form-label required"> Date de
                                            debut</label>
                                        <input type="date" name="datedebut" id="datedebut"
                                            class="formbold-form-input"  />
                                    </div>
                                </div>
                                <div class="w-full sm:w-half formbold-px-3">
                                    <div class="formbold-mb-5 w-full">
                                        <label for="date" class="formbold-form-label required"> Date de fin</label>
                                        <input type="date" name="datefin" id="datefin" class="formbold-form-input"
                                             />
                                    </div>
                                </div>
                                <div class="w-full sm:w-half formbold-px-3">
                                    <div class="formbold-mb-5">
                                        <label for="time" class="formbold-form-label required"> Heure de debut
                                        </label>
                                        <input type="time" name="heuredebut" id="heuredebut"
                                            class="formbold-form-input"/>
                                    </div>
                                </div>
                                <div class="w-full sm:w-half formbold-px-3">
                                    <div class="formbold-mb-5 w-full">
                                        <label for="time" class="formbold-form-label required"> Heure de fin</label>
                                        <input type="time" name="heurefin" id="heurefin" class="formbold-form-input"
                                           />
                                    </div>
                                </div>

                            </div>

                            <div id="etape_suivant"
                                style="display: flex; justify-content: center; margin-top: 190px; background-color: rgb(16, 237, 119); margin-left: -8px;">
                                <button class="formbold-btn" type="submit" style="background-color: green">suivant</button>
                            </div>
                        </form>

                    </div>

                    @if ($sallesDisponibles->count() > 0)
                        <div id="etape2" style="{{ $requeteUtilisateur && $sallesDisponibles->count() > 0 ? '' : 'display:none;' }}">
                            <a href="{{ route('pagedemandes') }}">Retour</a>
                            <form method="POST" action="{{ route('creer_demande') }}"
                                enctype="multipart/form-data">

                                @csrf

                                <div class="formbold-mb-5 " style="display: none">
                                    <input type="text" name="id_user" id="name"
                                        value="{{ Auth::user()->id }}" class="formbold-form-input " />
                                </div>

                                <div class="formbold-mb-5 ">
                                    <label for="name" class="formbold-form-label required"> nom complet</label>
                                    <p class="formbold-form-input ">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</p>
                                </div>
                                <div style="justify-content: left; display: flex; display: grid;">
                                    <div class="formbold-mb-5 ">
                                        <label for="name" class="formbold-form-label required"> nom complet du
                                            demandeur</label>
                                        <input type="text" name="demandeur" id="name"
                                            value="{{ Auth::user()->nom }}" class="formbold-form-input " />
                                    </div>

                                    {{-- <div class="formbold-mb-5 ">
                                        <label for="name" class="formbold-form-label required">prenom du
                                            demandeur</label>
                                        <input type="text" name="nom" id="name"
                                            value="{{ Auth::user()->prenom }}" class="formbold-form-input " />
                                    </div> --}}

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
                                            value="{{ $dateDebut }}" placeholder="date de debut"
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
                                        <input type="hidden" id="heurefin" name="heurefin" max="17:00"
                                            value="{{ $heureFin }}" placeholder="{{ $heureFin }}"
                                            class="formbold-form-input" />
                                    </div>
                                </div>


                                <div class="table-responsive">
                                    <div class="accordion" id="accordionExample">


                                        <div class="formbold-mb-5 formbold-pt-3">

                                            <label class="formbold-form-label formbold-form-label-2 required"
                                                style="margin-left: 15px;">
                                                Salle
                                            </label>
                                            <div class="flex flex-wrap formbold--mx-3">
                                                <div class="w-full sm:w-half formbold-px-3">
                                                    <div class="formbold-mb-5">
                                                        <ul class="list-group">
                                                            <table class="table table-bordered table-hover">
                                                                <thead class="thead-light">
                                                                    <tr>
                                                                        <th>Sélectionner</th>
                                                                        <th>salle</th>
                                                                        <th>Capacité</th>
                                                                        <th>Équipements</th>

                                                                    </tr>
                                                                </thead>
                                                                <!-- Barre de recherche -->
                                                                <input type="text" id="searchSalle"
                                                                    class="form-control"
                                                                    placeholder="Rechercher une salle par nom ou équipement ou n° place..."
                                                                    style="padding: 5px; margin: 5px;">
                                                                <tbody>


                                                                    @foreach ($sallesDisponibles as $salle)
                                                                        <tr class="salle-row">
                                                                            <td class="align-middle text-center">
                                                                                <input type="radio" name="id_salle"
                                                                                    value="{{ $salle->id }}"
                                                                                    required
                                                                                    style="transform: scale(1.3); accent-color: #28a745;">
                                                                            </td>
                                                                            <td class="align-middle"
                                                                                style="color:#28a745; font-weight: bold;">
                                                                                {{ $salle->nom }}
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                {{ $salle->nombreplace }} places
                                                                            </td>
                                                                            <td class="align-middle">
                                                                                @if (!empty($salle->equipements))
                                                                                    <ul class="list-inline mb-0">
                                                                                        @foreach ($salle->equipements as $equipement)
                                                                                            <li
                                                                                                class="list-inline-item">
                                                                                                <span
                                                                                                    class="badge rounded-pill bg-light text-dark border"
                                                                                                    style="font-size: 0.92em;">
                                                                                                    <i
                                                                                                        class="fa fa-check-circle text-success mr-1"></i>
                                                                                                    {{ ucfirst($equipement) }}
                                                                                                </span>
                                                                                            </li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                @else
                                                                                    <span
                                                                                        class="badge bg-secondary">Aucun
                                                                                        équipement</span>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach

                                                                    <script>
                                                                        document.addEventListener('DOMContentLoaded', function() {
                                                                            const searchInput = document.getElementById('searchSalle');
                                                                            searchInput.addEventListener('keyup', function() {
                                                                                const filter = searchInput.value.toLowerCase();
                                                                                document.querySelectorAll('.salle-row').forEach(function(row) {
                                                                                    const nom = row.children[1].textContent.toLowerCase();
                                                                                    const nombreplace = row.children[2].textContent.toLowerCase();
                                                                                    const equipements = row.children[3].textContent.toLowerCase();
                                                                                    if (nom.includes(filter) || equipements.includes(filter) || nombreplace
                                                                                        .includes(filter)) {
                                                                                        row.style.display = '';
                                                                                    } else {
                                                                                        row.style.display = 'none';
                                                                                    }
                                                                                });
                                                                            });
                                                                        });
                                                                    </script>
                                                                </tbody>
                                                            </table>
                                                        </ul>

                                                    </div>


                                                </div>

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
                                                <label for="motif" class="formbold-form-label required">
                                                    Description
                                                </label>
                                                <input type="texterea" name="motif" id="post-code"
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
            // $('#etape_suivant').on('click', function(e) {
            //     e.preventDefault();

            //     // Récupérer les valeurs saisies
            //     const datedebut = $('#datedebut').val();
            //     const datefin = $('#datefin').val();
            //     const heuredebut = $('#heuredebut').val();
            //     const heurefin = $('#heurefin').val();
            //     if (!datedebut || !datefin || !heuredebut || !heurefin) {
            //         alert('Veuillez remplir toutes les dates et heures');
            //         return;
            //     }
            //     // Mettre à jour les champs cachés du formulaire d'étape 2
            //     $('input[name="datedebut"]').val(datedebut);
            //     $('input[name="datefin"]').val(datefin);
            //     $('input[name="heuredebut"]').val(heuredebut);
            //     $('input[name="heurefin"]').val(heurefin);

            //     $('#etape1').hide();
            //     $('#etape2').show();
            // });
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
