<aside class="main-sidebar sidebar-light-primary elevation-4 bg-white" style="background-color: #fff !important;">
    <!-- Brand Logo -->
    <a href="{{ route('profile') }}" class="brand-link">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light"><b>gs.ujkz</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                {{-- lien pour les salles --}}
                @if (Route::currentRouteName() === 'salles_tableau')
                    <li class="nav-item">
                        @can('view', App\Models\Salles::class)
                            <a class="nav-link" href="{{ route('liste_salles_dipsonible') }}">Salles disponibles</a>
                        @endcan
                    </li>

                    <li class="nav-item">
                        @can('view', App\Models\Salles::class)
                            <a class="nav-link" href="{{ route('liste_salles_occupee') }}">Salles occupées</a>
                        @endcan

                    </li>

                    <li class="nav-item">
                        @can('view', App\Models\Salles::class)
                            <a class="nav-link" href="{{ route('liste_salles') }}">mes salles</a>
                        @endcan
                    </li>

                    <li class="nav-item">
                        @can('create', App\Models\Salles::class)
                            <a class="nav-link" href="{{ route('pages_salles') }}">Ajouter une salle</a>
                        @endcan
                    </li>
                    <li class="nav-item">
                        @can('create', App\Models\Demandes::class)
                            <a class="nav-link" href="{{ route('pagedemandes') }}">Réservation</a>
                        @endcan

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

                @if (Route::currentRouteName() === 'total_demande')
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
                        <a href="{{ route('liste_demandeencour') }}" class="nav-link">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>Traiter les demandes</p>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Contact</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link text-danger">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Déconnexion</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
