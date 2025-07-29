<nav class="navbar navbar-expand-xl navbar-dark bg-dark fixed-top" style="background-color: #94f7a4 !important; height: 57px;">

    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start" style="transform: translate(-90px,0)">

        <div class="navbar-nav ml-auto">
            @auth
                <a href="{{ route('profile') }}" class="nav-item nav-link active" style="color: black"><i
                        class="fa fa-home"></i><span>Acceuil</span></a>

                @can('view', App\Models\Demandes::class)
                    <a href="{{ route('total_demande') }}" class="nav-item nav-link active" style="color: black"><i
                            class="fa-solid fa-file"></i><span>les demandes</span></a>
                @endcan

                @can('view', App\Models\Salles::class)
                    <a href="{{ route('liste_salles') }}" class="nav-item nav-link active" style="color: black"><i
                            class="fa-solid fa-landmark"></i><span>les salles</span></a>
                @endcan

                @can('viewAny', App\Models\User::class)
                    <a href="{{ route('tableau_de_bord') }}" class="nav-item nav-link active" style="color: black"><i
                            class="fa-solid fa-user-graduate"></i><span>les utilisateurs</span></a>
                @endcan


                <a href="#" class="nav-item nav-link" style="color: black"><i class="fa fa-gears"></i><span>mes
                        infos</span></a>

                {{-- <a href="#" class="nav-item nav-link"><i class="fa fa-users"></i><span>Team</span></a> --}}
                @can('mesdemandes', App\Models\Demandes::class)
                    <a href="{{ route('mes_demande') }}" class="nav-item nav-link" style="color: black"><i
                            class="fa fa-pie-chart" style="color: black"></i><span>Mes demandes</span></a>
                @endcan

                {{-- <a href="#" class="nav-item nav-link"><i class="fa fa-briefcase"></i><span>Careers</span></a> --}}
                <a href="{{ route('notifiation', ['id' => Auth::user()->id]) }}" class="nav-item nav-link"
                    style="color: black">
                    <i class="fa fa-bell">
                        @if (Auth::user()->unreadNotifications->count() > 0)
                            <span style="color: red">{{ Auth::user()->unreadNotifications->count() }}</span>
                        @endif
                    </i>
                    <span>Notifications</span>
                </a>
                {{-- photo de profile --}}
                <a href="#" class="nav-item nav-link" style="color: black"></a>

            @endauth

            {{-- <a href="{{ route('Accueil') }}" class="nav-item nav-link active" style="color: black"><i
                    class="fa-solid fa-user-graduate"></i><span>Acceuil</span></a> --}}


            <a href="#" class="nav-item nav-link active" style="color: black"><i
                    class="fa-solid fa-user-graduate"></i><span>Contact</span></a>

        </div>
    </div>
</nav>



<aside class="main-sidebar sidebar-light-primary bg-white"
    style="background-color: #fff !important; box-shadow: none !important;">
    <!-- Brand Logo -->
    <a href="{{ route('profile') }}" class="brand-link">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light"><b>gs.ujkz</b></span>
    </a>
    @auth
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    {{-- llien de profile --}}
                    @if (Route::currentRouteName() === 'profile' || Route::currentRouteName() === 'mesinfos')
                        <li class="nav-item">
                            <a href="{{ route('profile') }}" class="nav-item nav-link active"><i
                                    class="fa-solid fa-user"></i><span>Mon profile</span></a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('pagedemandes') }}" class="nav-item nav-link">
                                <i class="fas fa-paper-plane"></i>
                                <p>soumettre demande</p>
                            </a>
                        </li>
                    @endif
                    {{-- lien sur les ajout d'utilisateur --}}

                    @if (Route::currentRouteName() === 'ajouterutilisateur' || Route::currentRouteName()=== 'tableau_de_bord')
                        <li class="nav-item">
                            <a href="{{ route('tableau_de_bord') }}" class="nav-item nav-link"><i
                                    class="fa-solid fa-users"></i><span>Les
                                    utilisateurs</span></a>

                        </li>
                        <li class="nav-item">
                            <a href="{{ route('ajouterutilisateur') }}" class="nav-item nav-link"><i
                                    class="fa-solid fa-address-card"></i><span>Ajouter un
                                    utilisateur</span></a>
                        </li>
                    @endif
                    {{-- liens de demandes validées et refusées et en cours --}}
                    @if (Route::currentRouteName() === 'liste_demandevalidee' ||
                            Route::currentRouteName() === 'liste_demanderefusee' ||
                            Route::currentRouteName() === 'liste_demandeencour')
                        <li class="nav-item">
                            @can('view', App\Models\Demandes::class)
                                <a class="nav-link active " aria-current="page" href="{{ route('total_demande') }}"
                                    aria-disabled="true" style="font-size: 20px; text-decoration: none;color:black">
                                    <i class="fas fa-badge-check"></i>
                                    <p>les utilisateur</p>
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view', App\Models\Demandes::class)
                                <a class="nav-link" href="{{ route('liste_demandevalidee') }}">
                                    <i class="fas fa-check-circle"></i>
                                    <p>Demandes validées</p>
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view', App\Models\Demandes::class)
                                <a class="nav-link" href="{{ route('liste_demanderefusee') }}">
                                    <i class="fas fa-times-circle text-danger"></i>
                                    <p>Demandes refusées</p>
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view', App\Models\Demandes::class)
                                <a class="nav-link" href="{{ route('liste_demandeencour') }}">
                                    <i class="fas fa-spinner text-warning"></i>
                                    <p>Demandes en cour</p>
                                </a>
                            @endcan
                        </li>
                    @endif

                    {{-- lien des liste_salles --}}
                    @if (Route::currentRouteName() === 'liste_salles' || Route::currentRouteName() === 'liste_salles_occupee')
                        <li class="nav-item">
                            @can('view', App\Models\Salles::class)
                                <a class="nav-link" href="{{ route('tableau_salles') }}"> <i class="fas fa-table"></i> </p>
                                    Salles</p> </a>
                            @endcan

                        </li>
                    @endif

                    @if (Route::currentRouteName() === 'salles_tableau' ||
                            Route::currentRouteName() === 'pages_salles' ||
                            Route::currentRouteName() === 'pagedemandes')
                        <li class="nav-item">
                            @can('view', App\Models\Salles::class)
                                <a class="nav-link" href="{{ route('liste_salles_dipsonible') }}"><i
                                        class="fas fa-door-open"></i>
                                    <p>Salles disponibles</p>
                                </a>
                            @endcan
                        </li>

                        <li class="nav-item">
                            @can('view', App\Models\Salles::class)
                                <a class="nav-link" href="{{ route('liste_salles_occupee') }}"> <i
                                        class="fas fa-door-closed"></i>
                                    <p>Salles occupées</p>
                                </a>
                            @endcan

                        </li>

                        <li class="nav-item">
                            @can('view', App\Models\Salles::class)
                                <a class="nav-link" href="{{ route('liste_salles') }}"><i class="fas fa-table"></i>
                                    <p>les salles</p>
                                </a>
                            @endcan
                        </li>

                        <li class="nav-item">
                            @can('create', App\Models\Salles::class)
                                <a class="nav-link" href="{{ route('pages_salles') }}"> <i class="fas fa-circle-plus"></i>
                                    <p>Ajouter une salle</p>
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('create', App\Models\Demandes::class)
                                <a class="nav-link" href="{{ route('pagedemandes') }}"> <i
                                        class="fas fa-calendar-check"></i>
                                    <p>Réservation</p>
                                </a>
                            @endcan

                        </li>
                    @endif

                    {{-- lien de verifier demande --}}

                    @if (Route::currentRouteName() === 'Verifie_demande' ||
                            Route::currentRouteName() === 'mes_demande' ||
                            Route::currentRouteName() === 'notifiation')
                        <li class="nav-item">
                            @can('view', App\Models\Demandes::class)
                                <a class="nav-link" href="{{ route('Verifie_demande') }}" style="color: black">
                                    <i class="fa-solid fa-file"></i>
                                    <p>Mes demandes</p>
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view', App\Models\Demandes::class)
                                <a href="{{ route('Verifie_demande') }}" class="nav-item nav-link"><i
                                        class="fas fa-search"></i>
                                    <p>verifier demandes</p>
                                </a>

                                </a>
                            @endcan
                        </li>
                    @endif

                    {{-- lien du cote soumission de demande --}}

                    @if (Route::currentRouteName() === 'pagedemandes')
                        {{-- <li class="nav-item">
                            @can('voirmesdemandes', App\Models\Demandes::class)
                                <a href="{{ route('Verifie_demande') }}" class="nav-item nav-link"> <i
                                        class="fas fa-search"></i>
                                    <p>verifier demandes</p>
                                </a>
                            @endcan
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('mesinfos') }}" class="nav-item nav-link "><i class="fas fa-user"></i>
                                <p>mes infos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @can('view', App\Models\Demandes::class)
                                <a href="{{ route('deatilsdemandes') }}" class="nav-item nav-link"> <i
                                        class="fas fa-trash"></i>
                                    <p>supprimer demande</p>
                                </a>
                            @endcan
                        </li>
                    @endif

                    {{-- lien de mes demandes --}}

                    @if (Route::currentRouteName() === 'mes_demande' || Route::currentRouteName() === 'Verifie_demande' || Route::currentRouteName() === 'demandeAttente')
                        <li class="nav-item">
                            <a href="{{ route('pagedemandes') }}" class="nav-item nav-link">
                                <i class="fas fa-paper-plane"></i>
                                <p>soumettre demande</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('demandeAttente') }}" class="nav-item nav-link">
                                <i class="nav-icon fas fa-clock"></i>
                                <p>Démande encours</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('mes_demande') }}" class="nav-item nav-link"><i
                                    class="fas fa-pie-chart"></i>
                                <p>Mes demandes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('Verifie_demande') }}" class="nav-item nav-link"><i
                                    class="fas fa-search"></i>
                                <p>verifier demande</p>
                            </a>
                        </li>
                    @endif

                    {{-- liens de demande details --}}

                    @if (Route::currentRouteName() === 'deatilsdemandes')
                        <li class="nav-item">
                            @can('viewAny', App\Models\Salles::class)
                                <a class="nav-link" href="{{ route('tableau_salles') }}" style="color: black">
                                    <i class="fa-solid fa-landmark"></i>
                                    <p>Salles</p>
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('view', App\Models\Demandes::class)
                                <a class="nav-link" href="{{ route('liste_demande') }}" style="color: black">
                                    <i class="fa-regular fa-envelope"></i>
                                    <p>Les demandes</p>
                                </a>
                            @endcan
                        </li>
                        <li class="nav-item">
                            @can('create', App\Models\Demandes::class)
                                <a class="nav-link" href="{{ route('creer_demande') }}">
                                    <i class="fa-solid fa-landmark"></i>
                                    <p>Réservations</p>
                                </a>
                            @endcan
                        </li>
                    @endif
                    {{-- liens de liste demandes --}}

                    @if (Route::currentRouteName() === 'total_demande' || Route::currentRouteName() === 'liste_demande')
                        <li class="nav-item">
                            <a href="{{ route('liste_demandeencour') }}" class="nav-link">
                                <i class="nav-icon fas fa-clock"></i>
                                <p>Demandes en attente</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('liste_demanderefusee') }}" class="nav-link">
                                <i class="nav-icon fas fa-times-circle"></i>
                                <p>Demandes refusées</p>
                            </a>
                        </li>

                        <li class="nav-item" @if (Route::currentRouteName() != 'deatilsdemandes') style="display: none;" @endif>
                            <a href="{{ route('liste_demandevalidee') }}" class="nav-link">
                                <i class="nav-icon fas fa-check-circle"></i>
                                <p>Demandes validées</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            @can('view', App\Models\Demandes::class)
                                <a href="{{ route('liste_demandeencour') }}" class="nav-link">
                                    <i class="nav-icon fas fa-tasks"></i>
                                    <p>Traiter les demandes</p>
                                </a>
                            @endcan

                        </li>
                    @endif

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-phone"></i>
                            <p>Contact</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link text-danger">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Déconnexion</p>
                        </a>
                    </li>
                    <div class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-item nav-link dropdown-toggle user-action"
                            style="color: black"> {{ Auth::user()->nom }} <b class="caret"></b></a>
                        <br>
                        {{-- <h5 class="nav-item" >{{ Auth::user()->cnib }}</h5> --}}
                        <div class="dropdown-menu">
                            {{-- <div class="px-4">
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div> --}}

                            <a href="{{ route('mesinfos') }}" class="dropdown-item"><i class="fa fa-calendar-o"></i> mes
                                infos</a>
                            <a href="#" class="dropdown-item"><i class="fa fa-sliders"></i> parametre</a>
                            <a href="#" class="dropdown-item"><i class="fas fa-key"></i> changer mot depasse</a>
                            <div class="divider dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                                @csrf

                                <div class="deconnecter">
                                    <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                        class="dropdown-item deconnecter">
                                        <i class="fa-solid fa-hospital-user"></i> Deconnexion
                                    </x-responsive-nav-link>
                                </div>
                            </form>
                            {{-- <a href="#" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a> --}}
                        </div>
                    </div>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    @endauth

    <!-- Sidebar -->

    <!-- /.sidebar -->
</aside>
