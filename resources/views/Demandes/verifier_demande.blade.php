@extends('layouts.navbar3')
<title>verification</title>
<link rel="icon" type="image/png" href="images/logo.png" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
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
        @if (@session()->has('message'))
            <p style="color: red">{{ session('message') }}</p>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">nom</th>
                    <th scope="col">motif</th>
                    <th scope="col">etat</th>
                    <th scope="col">date de soumission</th>
                    <th scope="col">details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($demandes as $demande)
                    <tr>
                        <th scope="row">{{ $demande->id }} </th>
                        {{-- <th scope="row">{{ $loop->iteration }} </th> --}}
                        <td>{{ $demande->nom }}</td>
                        <td>{{ $demande->motif }}</td>
                        <td>{{ $demande->etat }}</td>
                        <td>{{ $demande->created_at }}</td>
                        <td>
                            <a href="{{ route('ma_demande_detail', ['id' => $demande->id]) }}" style="color: red">
                                <i class="fa-solid fa-eye-slash"></i>
                            </a>
                            @if ($demande->etat === 'Validée')
                                <a href="{{ route('quittance', $demande) }}" style="color: green">
                                    <i class="fas fa-download" style="text: green; "></i>
                                    telecharger
                                </a>
                            @endif

                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    @endsection
</div>
