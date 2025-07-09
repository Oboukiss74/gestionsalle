<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>paiement</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}">
    <link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('css/demande/liste_demande.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    {{-- pour les entête --}}

</head>

<body class="listedemande_body">
    @include('layouts.navbarunique')

    <div class="container-xl" style=" width: 78%;  justify-content: center; margin-left: 1px; margin-right: 1px;">
       <div>
            <div class="card shadow-sm mt-5" style="max-width: 500px; margin: 0 auto; margin-top: 15%;margin-right: 15%;margin-right: 0%;width: 100%;transform: translate(0,100%);">
                <div class="card-header bg-primary text-white text-center">
                    <h4>Choisissez votre méthode de paiement</h4>
                </div>
                <div class="card-body">
                    <form id="paiementForm" action="#" method="get">
                        {{-- @csrf --}}
                        <div class="form-group">
                            <label for="methode" class="font-weight-bold">Méthode de paiement</label>
                            <select class="form-control" id="methode" name="methode" required>
                                <option value="" disabled selected>Sélectionnez la methode</option>
                                <option value="Orange">Orange</option>
                                <option value="Moov">Moov</option>
                                <option value="CorisMoney">CorisMoney</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-4">
                            Continuer <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </form>
                    <script>
                        $(document).ready(function() {
                            $('#paiementForm').on('submit', function(e) {
                                var methode = $('#methode').val();
                                if (!methode) {
                                    e.preventDefault();
                                    alert('Veuillez sélectionner une méthode de paiement.');
                                    return false;
                                }

                                // Vous pouvez personnaliser ici selon la méthode choisie
                                if (methode === 'Orange') {
                                    $('#orangeModal').modal('show');
                                    // Orange
                                    // Rediriger ou afficher un modal/processus spécifique
                                    // Exemple : window.location.href = '/paiement/orange';
                                } else if (methode === 'Moov') {
                                    $('#moovModal').modal('show');
                                    // Moov
                                    // Exemple : window.location.href = '/paiement/moov';
                                } else if (methode === 'CorisMoney') {
                                    $('#corisModal').modal('show');
                                    // CorisMoney
                                    // Exemple : window.location.href = '/paiement/corismoney';
                                }
                                // Le formulaire continue normalement (sera traité côté serveur)
                            });
                        });
                    </script>
                </div>
            </div>
       </div>
    </div>

    <!-- Modal Orange -->
<div class="modal fade" id="orangeModal" tabindex="-1" role="dialog" aria-labelledby="orangeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="orangeModalLabel">Paiement Orange</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Contenu du processus Orange -->
        <p>Processus de paiement Orange ici...</p>
        <form action="#" method="post">
            <input type="text" placeholder="entrer votre numero orange">
            <input type="number" placeholder="entrer le otp">
            <button>confirmer</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Moov -->
<div class="modal fade" id="moovModal" tabindex="-1" role="dialog" aria-labelledby="moovModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="moovModalLabel">Paiement Moov</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Contenu du processus Moov -->
        <p>Processus de paiement Moov</p>
        <form action="#" method="post">
            <input type="text" placeholder="entrer votre moov">
            <button>valider</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal CorisMoney -->
<div class="modal fade" id="corisModal" tabindex="-1" role="dialog" aria-labelledby="corisModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="corisModalLabel">Paiement CorisMoney</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Contenu du processus CorisMoney -->
        <p>Processus de paiement CorisMoney ici...</p>
        <form action="#" method="post">
            <input type="text" placeholder="entrer votre CorisMoney">
            <button>valider</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>

</html>
