@extends('layouts.navbar3')
<link rel="icon" type="image/png" href="images/logo.png"/>
<div>
    @section('elements')
        <a href="{{ route('pagedemandes') }}" class="nav-item nav-link">soumettre une demande</a>
        <a href="{{ route('Verifie_demande') }}" class="nav-item nav-link">verifier demande</a>
        <a href="#" class="nav-item nav-link">supprimer</a>
        {{-- <div class="nav-item dropdown">
            <a href="#" class="nav-item nav-link dropdown-toggle" data-toggle="dropdown">Demandes</a>
            <div class="dropdown-menu">

                <a href="#" class="dropdown-item">verifier demande</a>
                <a href="{{ route('pagedemandes') }}" class="dropdown-item">soumettre une demande</a>
                <a href="#" class="dropdown-item">modifier demande</a>
                <a href="#" class="dropdown-item">Digital Marketing</a>
            </div>
        </div> --}}
    @endsection
    @section('contenu')



    @endsection
</div>
