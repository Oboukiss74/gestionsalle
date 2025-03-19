
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout des salles</title>
    <link rel="icon" type="image/png" href="images/logo.png" />
    <link rel="stylesheet" href={{ asset('salles/ajouter_salles.css') }}>
</head>

<body>
    <div class="formbold-main-wrapper">
        <!-- Author: FormBold Team -->
        <!-- Learn More: https://formbold.com -->
        <div class="formbold-form-wrapper">
            {{-- <img src="images/logo.png"> --}}
            {{-- @session(session()->with('message'))
                {{ session('message') }}
            @endsession --}}
            <form action="{{ route('enregistrer_salles') }}" method="POST">
                @csrf
                <div class="formbold-input-flex" style="width: 950px">
                    {{-- <div style="width: 650px" class="case_saisie">

                        <select name="id_salle" id="" class="formbold-form-label">
                            @foreach ($salles as $salle)
                                <option value="" class="formbold-form-input">
                                    {{ $salles->nom }}
                                </option>
                            @endforeach
                        </select>

                    </div> --}}
                    <div style="width: 650px" class="case_saisie">
                        <label for="lastname" > nom de la salle </label>
                        <input type="text" name="nom" id="nom" placeholder="nom de la salle"
                        class="formbold-form-input"  />
                    </div>

                    <div style="width: 950px">
                        <label for="lastname" class="formbold-form-label"> code de la salle</label>
                        <input type="text" name="code" id="nom" placeholder="code de la salle"
                            class="formbold-form-input" />
                    </div>

                    <div style="width: 650px">
                        <label for="lastname" class="formbold-form-label"> nombre de place</label>
                        <input type="number" name="nombreplace" id="nombreplace" placeholder="N° de la salle"
                            class="formbold-form-input" />
                    </div>
                </div>

                <div class="formbold-input-flex">
                    <div style="width: 550px">
                        <label class="formbold-form-label">Taille de place</label>

                        <select class="formbold-form-input" name="taille" id="occupation">
                            <option value="petite" selected>choix de taille</option>
                            <option value="petite">petite</option>
                            <option value="moyenne">moyenne</option>
                            <option value="grande">grande</option>
                        </select>
                    </div>

                    <div style="width: 650px">
                        <label for="nombre_place" class="formbold-form-label"> equipements </label>
                        <input type="text" name="equipement" id="equipements" placeholder="listez les equipements"
                            class="formbold-form-input" />
                    </div>

                    <div style="width: 650px">
                        <label for="email" class="formbold-form-label">Le prix de location </label>
                        <input type="number" name="tarif" id="prix" placeholder="prix"
                            class="formbold-form-input" />
                    </div>

                </div>

                <div class="formbold-mb-3 formbold-input-wrapp" style="width: 650px">
                    <label for="phone" class="formbold-form-label"> Statut </label>
                    <input type="text" name="statut" id="phone" placeholder="statut de la salle"
                        class="formbold-form-input" />
                </div>

                <div class="formbold-mb-3" style="width: 650px">
                    <label for="age" class="formbold-form-label">Localisation</label>
                    <input type="text" name="localisation" id="lien geograpgique" class="formbold-form-input"
                        placeholder="lien geograpgique" />
                </div>
                <button class="formbold-btn">Enregistrer</button>
            </form>
        </div>
    </div>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .formbold-mb-3 {
            margin-bottom: 15px;
        }

        .formbold-main-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 48px;
        }

        .formbold-form-wrapper {
            margin: 0 auto;
            max-width: 570px;
            width: 100%;
            background: white;
            padding: 40px;
        }

        .formbold-img {
            display: block;
            margin: 0 auto 45px;
        }

        .formbold-input-wrapp>div {
            display: flex;
            gap: 20px;
        }

        .formbold-input-flex {
            display: flex;
            gap: 20px;
            margin-bottom: 15px;
        }

        .formbold-input-flex>div {
            width: 50%;
        }

        .formbold-form-input {
            width: 100%;
            padding: 18px 32px;
            border-radius: 5px;
            border: 1px solid #dde3ec;
            background: #ffffff;
            font-weight: 500;
            font-size: 16px;
            color: #536387;
            outline: none;
            resize: none;
        }

        .formbold-form-input::placeholder,
        select.formbold-form-input,
        .formbold-form-input[type='date']::-webkit-datetime-edit-text,
        .formbold-form-input[type='date']::-webkit-datetime-edit-month-field,
        .formbold-form-input[type='date']::-webkit-datetime-edit-day-field,
        .formbold-form-input[type='date']::-webkit-datetime-edit-year-field {
            color: rgba(83, 99, 135, 0.5);
        }

        .formbold-form-input:focus {
            border-color: #6a64f1;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }

        .formbold-form-label {
            color: #07074D;
            font-weight: 500;
            font-size: 14px;
            line-height: 24px;
            display: block;
            margin-bottom: 10px;
        }

        .formbold-form-file-flex {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .formbold-form-file-flex .formbold-form-label {
            margin-bottom: 0;
        }

        .formbold-form-file {
            font-size: 14px;
            line-height: 24px;
            color: #536387;
        }

        .formbold-form-file::-webkit-file-upload-button {
            display: none;
        }

        .formbold-form-file:before {
            content: 'Upload file';
            display: inline-block;
            background: #EEEEEE;
            border: 0.5px solid #FBFBFB;
            box-shadow: inset 0px 0px 2px rgba(0, 0, 0, 0.25);
            border-radius: 3px;
            padding: 3px 12px;
            outline: none;
            white-space: nowrap;
            -webkit-user-select: none;
            cursor: pointer;
            color: #637381;
            font-weight: 500;
            font-size: 12px;
            line-height: 16px;
            margin-right: 10px;
        }

        .formbold-btn {
            text-align: center;
            width: 100%;
            font-size: 16px;
            border-radius: 5px;
            padding: 14px 25px;
            border: none;
            font-weight: 500;
            background-color: #6a64f1;
            color: white;
            cursor: pointer;
            margin-top: 25px;
        }

        .formbold-btn:hover {
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
        }

        .formbold-w-45 {
            width: 45%;
        }

        .case_saisie {
            width: 450px;

        }

        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    </style>
</body>

</html>
