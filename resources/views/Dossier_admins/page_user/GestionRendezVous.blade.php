@extends('Dossier_admins.master')

@section('title')
    Gestion des rendez-vous
@endsection

@include('Dossier_admins.sidebar')


@section('main')
    <div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Validation de Rendez-Vous</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Nom du client</th>
                            <th>Service</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Statut</th>
                            <th >Décision</th>
                        </tr>
                        </thead>
                        <tbody >
                        @foreach ($appointment as $appointments)
                            <tr>
                                <td>{{ $appointments->client->nom }} {{ $appointments->client->prenom }}</td>
                                <td>{{ $appointments->service->name }}</td>
                                <td>{{ $appointments->date }}</td>
                                <td>{{ $appointments->heure }}</td>
                                <td>{{ $appointments->status }}</td>
                                <td>
                                    <!-- Ajoutez ici des boutons pour la confirmation et l'annulation -->
                                    <button onclick="confirmerRendezVous({{ $appointments->id }})"class="btn btn-success btn-circle" ><i class="fa fa-check" aria-hidden="true"></i>
                                    </button>
                                    <button onclick="cancelRendezVous({{ $appointments->id }})">Annuler</button>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
<!-- Ajoutez ce script dans votre vue ou un fichier JavaScript séparé -->

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    function confirmerRendezVous(appointmentId) {
        $.ajax({
            url: '/confirmerRendezVous/' + appointmentId,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                alert(response.message);
                // Actualiser la liste des rendez-vous en attente après la confirmation
                refreshAppointments();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    function cancelRendezVous(appointmentId) {
        $.ajax({
            url: '/cancelRendezVous/' + appointmentId,
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                alert(response.message);
                // Actualiser la liste des rendez-vous en attente après l'annulation
                refreshAppointments();
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    function refreshAppointments() {
        // Actualiser la liste des rendez-vous en attente sans recharger la page
        $.ajax({
            url: '/employee/appointments',
            type: 'GET',
            dataType: 'html',
            success: function(data) {
                $('tbody').html(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
</script>
