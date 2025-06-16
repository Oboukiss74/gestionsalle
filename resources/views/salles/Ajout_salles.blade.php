<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ajout de salle</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Raleway">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    {{-- localisation theme --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <link rel="stylesheet" href="{{ asset('css/salles/salle_dispo.css') }}">
    <link rel="stylesheet" href="{{ asset('css/salles/listesalle.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/salles/salle.css') }}">

</head>

<body>
    @include('layouts.navbarunique')
    <div>
        <div class="formbold-main-wrapper">

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

                    <div id="map" style="height: 400px;"></div>
                    <div class="formbold-input-flex">
                        <div>
                            <label for="email" class="formbold-form-label" id="longitude"> la longitude </label>
                            <input type="text" name="longitude" id="lng" placeholder="la longitude"
                                class="formbold-form-input" />
                        </div>

                        <div>
                            <label for="latitude" class="formbold-form-label" id="latitude"> la latitude </label>
                            <input type="text" name="latitude" id="lat" placeholder="la latitude"
                                class="formbold-form-input" />
                        </div>


                    </div>



                    <button class="formbold-btn">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    var map = L.map('map').setView([12.3689, -1.5332], 16);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    var marker;

    map.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;
        document.getElementById("latitude").value = lat;
        document.getElementById("longitude").value = lng;

        if (marker) {
            map.removeLayer(marker);
        }
        marker = L.marker([lat, lng]).addTo(map);
    });
</script>

</html>
