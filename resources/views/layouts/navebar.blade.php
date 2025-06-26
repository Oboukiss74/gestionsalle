<nav class="navbar navbar-expand-lg bg-light fixed-top shadow-lg">

    <div class="container" style="background-color: rgb(81, 234, 134) !important;
  margin-left: 11%;">
        @guest
            <a class="navbar-brand" href="{{ route('Accueil') }}"
                style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 30px; margin-left: -13%;">
                <img src="{{ asset('images/logo.png') }}" width="30" height="30" alt="Logo"
                    class="d-inline-block align-top" style="margin-top: 10px;">
                <b style="color: rgb(57, 209, 115)">gs.ujkz</b>
            </a>
            {{-- <a class="tooplate-green" href="{{ route('Accueil') }}"
                style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 30px;">gs.
                <span class="tooplate-green">ujkz</span></a> --}}


        @endguest

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="{{ route('Accueil') }}">Accueil</a>
                    </li>
                    @if (Route::currentRouteName() === 'Accueil' || Route::currentRouteName() === 'register')
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="#section_2">A propos</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link click-scroll" href="{{ route('register') }}">S'incrire</a>

                    </li>

                    @if (Route::currentRouteName() === 'Accueil' || Route::currentRouteName() === 'register')
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ route('login') }}">Se connecter</a>
                        </li>
                    @endif


                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="#section_5">Contact</a>
                    </li>
                @endguest

                @auth

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="{{ route('profile') }}">Acceuil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="{{ route('pagedemandes') }}">Soummetre</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="{{ route('Verifie_demande') }}">Verifier</a>
                    </li>
                    @can('voirmesdemandes', App\Models\Demandes::class)
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ route('Verifie_demande') }}">voir</a>
                        </li>
                    @endcan


                    <li class="nav-item">
                        <a class="nav-link click-scroll" href="{{ route('mesinfos') }}">Mes infos</a>
                    </li>

                    @can('view', App\Models\Demandes::class)
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ route('deatilsdemandes') }}">supprimer demande</a>
                        </li>
                    @endcan
                    @can('view', App\Models\Demandes::class)
                    @endcan

                    @can('view', App\Models\Demandes::class)
                        <li class="nav-item">
                            <a class="nav-link click-scroll" href="{{ route('total_demande') }}">les demandes</a>
                        </li>
                    @endcan


                @endauth

            </ul>
        </div>
    </div>
</nav>
