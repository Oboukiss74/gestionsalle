@extends('layouts.navbar3')
<div>
    @section('elements')
        <a href="{{ route('pagedemandes') }}" class="nav-item nav-link">demandes</a>
    @endsection
    @section('contenu')
        {{-- @if (!empty($demandes))
            @foreach ($demandes as $demande)
                <p>{{ $demande->nom }}</p>
            @endforeach
        @else
            <p>Aucune demande trouvée.</p>
        @endif
        <table>
            @foreach ($demandes as $demande)
                <tr>
                    <td>
                        {{ $demande->nom }}
                    </td>
                </tr>
            @endforeach
        </table> --}}
    @endsection
</div>
