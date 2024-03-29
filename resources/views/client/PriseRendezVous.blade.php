@extends('client_layout.master')  <!-- Hérite tout ce qui est dans le dossier client_layout.master-->

@section('title')
    Boutique
  @endsection

@section('content')  <!-- Le contenu dynamique-->

<div class="container mt-5" style="font-size: 18px" >
    <h1 style="font-size: 35px ">Prise de Rendez-vous</h1>

    @if (Session::has('status'))
        <div class="alert alert-success">
            {{Session::get('status')}}
        </div>

    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{url('AddPriseRendezVous')}} " method="post" style="font-size: 20px">
        @csrf <!-- Ajoutez cette ligne pour la protection CSRF dans Laravel -->

        <div class="form-group">
            <label for="service">Service :</label>
            <select class="form-control" id="service" name="service_id" onchange="updateServiceAmount()">
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }} - {{ $service->price }} €</option>
                @endforeach
                <!-- Ajoutez d'autres options en fonction de vos services avec les prix correspondants -->
            </select>

        </div>

        <div>
            <label for="employe_id">Choisissez votre Esthéticienne :</label>
            <select name="employe_id" id="employe_id" style="border-radius: 7px " >
                <option value="" selected>Sans importance</option>
                @foreach($employes as $employe)
                    <option value="{{ $employe->id }}">{{ $employe->fullname }}</option>
                @endforeach
            </select>
        </div>



        <div class="form-group">
            <label for="date">Date du Rendez-vous :</label>
            <input type="date" class="form-control" id="date" name="date" onchange="checkDay()" required>
        </div>

        <div class="form-group">
            <label for="heure">Heure du Rendez-vous :</label>
            <input type="time" class="form-control" id="heure" name="heure" min="09:00" max="19:00" required>
        </div>

        <button type="submit" style="background-color: #C79843 ; border-radius: 12px " > Soumettre Rendez-vous</button>
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
<script>
    function generateEvenHours() {
        var select = document.getElementById('heure');
        select.innerHTML = '';
        for (var i = 8; i <= 16; i += 2) {
            var formattedHour = ('0' + i).slice(-2);
            var option = document.createElement('option');
            var heurSuivant = (i + 2);
            option.value = formattedHour + ':00';
            if (i === 12) {
                option.text = '';
                option.disabled = true;
            } else {
                option.text = formattedHour + ':00' + '-' + heurSuivant + ':00';
            }

            select.appendChild(option);
        }
    }

    document.getElementById('date').addEventListener('input', function (event) {
        generateEvenHours();
        hideFormOnMonday(event.target.value);
    });

    function hideFormOnMonday(selectedDate) {
        var day = new Date(selectedDate).getDay();
        var form = document.getElementById('rendezVousForm');

        if (day === 1) { // 1 corresponds à lundi
            form.style.display = 'none';
            document.getElementById('error-message').innerText = "Les rendez-vous ne sont pas disponibles le lundi.";
        } else {
            form.style.display = 'block';
            document.getElementById('error-message').innerText = '';
        }
    }

    var today = new Date();
    var todayISO = today.toISOString().split('T')[0];
    document.getElementById('date').min = todayISO;

    var maxDate = new Date(today);
    maxDate.setDate(today.getDate() + 7);
    document.getElementById('date').max = maxDate.toISOString().split('T')[0];

    function isWeekend(dateString) {
        var selectedDate = new Date(dateString);
        var day = selectedDate.getDay();
        return day === 0 || day === 6;
    }

    document.getElementById('date').addEventListener('input', function (event) {
        var selectedDate = event.target.value;
        if (isWeekend(selectedDate)) {
            event.target.value = '';
            document.getElementById('error-message').innerText = "Les rendez-vous ne sont pas disponibles le week-end.";
        } else {
            document.getElementById('error-message').innerText = '';
        }

        hideFormOnMonday(selectedDate);
    });

        function checkDay() {
        var selectedDate = new Date(document.getElementById("date").value);
        // 0 correspond à dimanche, 1 correspond à lundi, ..., 6 correspond à samedi
        if (selectedDate.getDay() === 1) {
        alert("Nous somme fermé les lundi");
        document.getElementById("date").value = "";
    }
    }
</script>


@endsection

