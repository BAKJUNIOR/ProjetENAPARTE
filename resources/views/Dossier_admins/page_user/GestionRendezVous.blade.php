@extends('Dossier_admins.master')

@section('title')
    Gestion des rendez-vous
@endsection

@include('Dossier_admins.sidebar')


@section('main')
    <div class="container-fluid">

        <input type="hidden" {{$increment =1}}>
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
                            <th>Employé</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Statut</th>
                            <th >Décision</th>
                        </tr>
                        </thead>
                        @foreach ($rendezVous as $rendezVouss)
                            <tr>

                                <td>{{ $rendezVouss->client->nom }}</td>
                                <td>{{ $rendezVouss->service->name }}</td>
                                <td>{{ $rendezVouss->user->fullname }}</td>
                                <td>{{ $rendezVouss->date }}</td>
                                <td>{{ $rendezVouss->heure }}</td>
                                <td>{{ $rendezVouss-> status  }}</td>

                                <td>
                                    <div class="d-flex"  >


                                    </div>

                                </td>
                            </tr>
                            {{$increment++}}
                            @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function actualiserContenu() {
        var tableau = document.getElementById("dataTable");
        var tbody = document.getElementById("dataTable");
        $.ajax({
            url: '/AllRendezVousUser', // L'URL de votre route Laravel
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if(document.getElementById(data[0].id) == null){
                    var nouvelleLigne = tbody.insertRow();
                    nouvelleLigne.id = `${data[0].id}`;
                    var nouvelleCellule = nouvelleLigne.insertCell(0);
                    nouvelleCellule.innerHTML = `${data[0].client['nom']} ${data[0].client['prenom']}`;
                    var nouvelleCellule = nouvelleLigne.insertCell(1);
                    nouvelleCellule.innerHTML = data[0].service['name'];
                    var nouvelleCellule = nouvelleLigne.insertCell(2);
                    nouvelleCellule.innerHTML = data[0].date;
                    var nouvelleCellule = nouvelleLigne.insertCell(3);
                    nouvelleCellule.innerHTML = data[0].start_time;
                    var nouvelleCellule = nouvelleLigne.insertCell(4);
                    // Ajout du texte dans la cellule
                    nouvelleCellule.innerHTML = data[0].status;
                    var nouvelleCellule = nouvelleLigne.insertCell(5);
                    nouvelleCellule.innerHTML  = '<button onclick="ConfirmerRendezVous('+data[0].id+')" class="btn btn-success btn-circle" ><i class="fas fa-check"></i></button> <button class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>';
                }

            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    function ConfirmerRendezVous(idRendezVous) {
        $.ajax({
            url: '/confirmerRendezVous/'+idRendezVous, // L'URL de votre route Laravel
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                alert(data);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
    window.onload = actualiserContenu;
    setInterval(actualiserContenu, 2000);
</script>
