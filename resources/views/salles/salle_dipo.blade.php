<form action="{{ route('liste_salles') }}" method="post">
    @csrf
    <label for="datedebut">Date de début :</label>
    <input type="date" name="datedebut" id="datedebut" required>

    <label for="datefin">Date de fin :</label>
    <input type="date" name="datefin" id="datefin" required>

    <button type="submit">Rechercher</button>
</form>
