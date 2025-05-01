@extends('layouts.navbaradmin')

<!-- Navbar -->
@section('contenue')
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('profile_admin') }}" class="brand-link">
            <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">Gestion des salles</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('tableau_de_bord') }}" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Tableau de bord</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa-solid fa-circle-user"></i>
                            <p>Profile</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('tableau_salles') }}" class="nav-link">
                            <i class="fa-solid fa-landmark"></i>
                            <p>Les salles</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('total_demande') }}" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Les demandes</p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="users.html" class="nav-link">
                            <i class="nav-icon  fas fa-users"></i>
                            <p>Utilisateurs</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pages.html" class="nav-link">
                            <i class="fa-solid fa-pen-fancy"></i>
                            <p>parametres</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Utilisateurs</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="create-user.html" class="btn btn-primary">Nouveau</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <div class="input-group input-group" style="width: 250px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th width="60">ID</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Telephone</th>
                                    <th>Sexe</th>
                                    <th width="100">Profile</th>
                                    <th width="100">Actions</th>
                                </tr>
                            </thead>
                            @foreach ($users as $user)
                                <tbody>
                                    <tr>
                                        <td>5</td>
                                        <td>{{ $user->nom }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->nom }}</td>
                                        <td>{{ $user->sexe }}</td>
                                        <td>
                                            {{ $user->profile }}
                                        </td>
                                        <td>
                                            <a href="#">
                                                <svg class="filament-link-icon w-4 h-4 mr-1"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </a>
                                            <a href="#" class="text-danger w-4 h-4 mr-1">
                                                <svg wire:loading.remove.delay="" wire:target=""
                                                    class="filament-link-icon w-4 h-4 mr-1"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                    fill="currentColor" aria-hidden="true">
                                                    <path ath fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination m-0 float-right">
                            <li class="page-item"><a class="page-link" href="#">«</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">»</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@endsection
<!-- /.navbar -->
<!-- Main Sidebar Container -->
