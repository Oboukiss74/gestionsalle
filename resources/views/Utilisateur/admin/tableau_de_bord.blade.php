@extends('layouts.navbaradmin')

@section('navabar')
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="{{ route('profile') }}"
            style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; font-size: 30px;">
            <img src="{{ asset('images/logo.png') }}" width="30" height="30" alt="Logo"
                class="d-inline-block align-top">
            <b style="color: rgb(57, 209, 115)"> E.Gestion des Salles</b>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav mr-auto ml-4">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('profile') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('liste_demande') }}">Les demandes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('liste_salles') }}">Les salles</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <h2 style="font-size: 12px;">
                            << {{ Auth::user()->nom }}>>
                        </h2>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('profile') }}">Mon profil</a>
                        <a class="dropdown-item" href="#">Paramètres</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('logout') }}">Déconnexion</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <style>
        body {
            background-image: url('{{ asset('images/uo.jpg') }}');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: -1;
        }

        .content-wrapper {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .card {
            border-radius: 12px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .btn-primary {
            border-radius: 20px;
        }

        .table thead {
            background-color: #f4f6f9;
        }
    </style>
@endsection

@section('contenue')
    <div class="container">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid my-2">
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <h1 class="text-dark">Gestion des utilisateurs</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="{{ route('ajouterutilisateur') }}" class="btn btn-primary">
                                <i class="fas fa-user-plus"></i> Ajouter un utilisateur
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header d-flex justify-content-end">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2" type="search" placeholder="Rechercher"
                                    aria-label="Search">
                                <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><i
                                        class="fas fa-search"></i></button>
                            </form>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Téléphone</th>
                                        <th>Sexe</th>
                                        <th>Profil</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->nom }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->telephone ?? '-' }}</td>
                                            <td>{{ $user->sexe }}</td>
                                            <td>{{ $user->profile }}</td>
                                            <td>
                                                <a href="#" class="text-primary mr-2" title="Modifier"><i
                                                        class="fas fa-edit"></i></a>
                                                <a href="{{ route('profile.destroy') }}" class="text-danger"
                                                    title="Supprimer"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="card-footer clearfix d-flex justify-content-between align-items-center">
                            <span>Page {{ $pagination->currentPage() }} sur {{ $pagination->lastPage() }}</span>
                            <ul class="pagination mb-0">
                                <li class="page-item {{ $pagination->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $pagination->previousPageUrl() }}">Précédent</a>
                                </li>
                                <li class="page-item active">
                                    <span class="page-link">{{ $pagination->currentPage() }}</span>
                                </li>
                                <li class="page-item {{ !$pagination->hasMorePages() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $pagination->nextPageUrl() }}">Suivant</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
