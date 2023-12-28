@extends('client_layout.master')  <!-- Hérite tout ce qui est dans le dossier client_layout.master-->

@section('title')
    Boutique
  @endsection

@section('content')  <!-- Le contenu dynamique-->

<div class="container mt-5" style="font-size: 18px" >
    <h1>Prise de Rendez-vous</h1>
    <form action="/submit-appointment" method="post">
        @csrf <!-- Ajoutez cette ligne pour la protection CSRF dans Laravel -->

        <div class="form-group">
            <label for="service">Service :</label>
            <select class="form-control" id="service" name="service" onchange="updateServiceAmount()">
                <option value="1" data-price="20.00">Soins de visage - 20.00 $</option>
                <option value="2" data-price="30.00">Soins Capillaire - 30.00 $</option>
                <!-- Ajoutez d'autres options en fonction de vos services avec les prix correspondants -->
            </select>
        </div>

        <div class="form-group">
            <label for="heure">Nom & prénom :</label>
            <input type="text" class="form-control" id="fullname" name="fulname" required>
        </div>

        <div class="form-group">
            <label for="date">Date du Rendez-vous :</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>

        <div class="form-group">
            <label for="heure">Heure du Rendez-vous :</label>
            <input type="time" class="form-control" id="heure" name="heure" required>
        </div>

        <button type="submit" class="btn btn-warning">Soumettre Rendez-vous</button>
    </form>


    <div class="mt-3">
        <h2>Temps de travail :</h2>
        <p class="text-dark">Mardi - Mercredi: 09:00–20:00</p>
        <p class="text-dark">Jeudi - Vendredi: 09:00–20:00</p>
        <p class="text-dark">Samedi - Dimanche: 09:00–20:00</p>
        <p class="text-danger">Lundi: Fermé</p>
    </div>

</div>

</div>
<br>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    $(document).ready(function() {
        // Les moments où l'utilisateur peut prendre un rendez-vous
        var momentsPermis = [
            { jour: 'mardi', debut: '09:00', fin: '20:00' },
            { jour: 'mercredi', debut: '09:00', fin: '20:00' },
            { jour: 'jeudi', debut: '09:00', fin: '20:00' },
            { jour: 'vendredi', debut: '09:00', fin: '20:00' },
            { jour: 'samedi', debut: '09:00', fin: '20:00' },
            { jour: 'dimanche', debut: '09:00', fin: '20:00' }
        ];

        // Récupère le jour actuel
        var today = new Date();
        var currentDay = today.toLocaleDateString('en-US', { weekday: 'lowercase' });

        // Récupère la plage de dates autorisées en fonction du jour actuel
        var minDate = today.toISOString().split('T')[0]; // Date d'aujourd'hui
        var maxDate = momentsPermis.find(function(moment) {
            return moment.jour === currentDay;
        }).fin;

        // Configure les attributs min et max pour le sélecteur de date
        $('#date').attr('min', minDate);
        $('#date').attr('max', maxDate);
    });
</script>



@endsection

