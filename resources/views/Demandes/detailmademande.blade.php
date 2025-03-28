<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>details</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Raleway">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="images/logo.png" />
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detaildemande.css') }}">
    <style>

    </style>
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
                <a href="{{ route('Verifie_demande') }}"class="nav-item nav-link"><h6>Retour</h6></a>

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
    <div>
        @yield('contenu')
    </div>
    <div class="formbold-main-wrapper">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="formbold-form-wrapper">

            <form action="#" method="POST">
                <div class="formbold-form-title">
                    <h2 class="">demande selectionnée N° {{ $demandes->id }}</h2>
                    <p>
                        Modification possible si l'etat est en attente
                    </p>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="firstname" class="formbold-form-label">
                            Date de debut
                        </label>
                        <input type="date" name="datedebut" id="firstname" class="formbold-form-input"
                            value="{{ $demandes->datedebut }}" />
                    </div>
                    <div>
                        <label for="lastname" class="formbold-form-label"> Date de fin </label>
                        <input type="date" name="datefin" id="lastname" class="formbold-form-input" value="{{ $demandes->datefin }}"/>
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="email" class="formbold-form-label"> heure de debut </label>
                        <input type="time" name="heuredebut" id="email" class="formbold-form-input" value="{{$demandes->heuredebut}}"/>
                    </div>
                    <div>
                        <label for="phone" class="formbold-form-label">heure de fin </label>
                        <input type="time" name="phone" id="phone" class="formbold-form-input" value=" {{ $demandes->heurefin }}" />
                    </div>
                </div>

                <div class="formbold-mb-3">
                    <label for="address" class="formbold-form-label">
                        motif de la demande
                    </label>
                    <input type="textarea" name="address" id="address" class="formbold-form-input" value=" {{ $demandes->motif }}" />
                </div>

                <div class="formbold-mb-3">
                    <label for="address2" class="formbold-form-label">
                        effectif de participants
                    </label>
                    <input type="number" name="address2" id="address2" class="formbold-form-input" value="{{ $demandes->effectif }}" />
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="state" class="formbold-form-label"> State/Prvince </label>
                        <input type="text" name="state" id="state" class="formbold-form-input" />
                    </div>
                    <div>
                        <label for="country" class="formbold-form-label"> Country </label>
                        <input type="text" name="country" id="country" class="formbold-form-input" />
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div>
                        <label for="post" class="formbold-form-label"> Post/Zip code </label>
                        <input type="text" name="post" id="post" class="formbold-form-input" />
                    </div>
                    <div>
                        <label for="area" class="formbold-form-label"> Area Code </label>
                        <input type="text" name="area" id="area" class="formbold-form-input" />
                    </div>
                </div>

                <div class="formbold-checkbox-wrapper">
                    <label for="supportCheckbox" class="formbold-checkbox-label">
                        <div class="formbold-relative">
                            <input type="checkbox" id="supportCheckbox" class="formbold-input-checkbox" />
                            <div class="formbold-checkbox-inner">
                                <span class="formbold-opacity-0">
                                    <svg width="11" height="8" viewBox="0 0 11 8" fill="none"
                                        class="formbold-stroke-current">
                                        <path
                                            d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z"
                                            stroke-width="0.4"></path>
                                    </svg>
                                </span>
                            </div>
                        </div>

                    </label>
                </div>

                <button class="formbold-btn">Enregistrer</button>
            </form>
        </div>
    </div>

    <style>

    </style>
</body>

</html>
