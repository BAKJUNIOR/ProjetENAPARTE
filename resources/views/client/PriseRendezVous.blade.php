@extends('client_layout.master')  <!-- Hérite tout ce qui est dans le dossier client_layout.master-->

@section('title')
    Boutique
  @endsection

@section('content')  <!-- Le contenu dynamique-->

<div class="container mt-5" style="font-size: 18px" >
    <h1>Prise de Rendez-vous</h1>

    @if (Session::has('status'))
        <div class="alert alert-success">
            {{Session::get('status')}}
        </div>

    @endif

    <form action="{{route('AddPriseRendezVous')}}" method="post">
        @csrf <!-- Ajoutez cette ligne pour la protection CSRF dans Laravel -->

        <div class="form-group">
            <label for="service">Service :</label>
            <select class="form-control" id="service" name="service" onchange="updateServiceAmount()">
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }} - {{ $service->price }} €</option>
                @endforeach
                <!-- Ajoutez d'autres options en fonction de vos services avec les prix correspondants -->
            </select>

        </div>

        <div >
            <label for="employe_id">Choisissez votre Esthéticienne :</label>
            <select name="employe_id" id="employe_id">
                @foreach($employes as $employe)
                    <option value="{{ $employe->id }}">{{ $employe->fullname }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="heure">Nom & prénom :</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required>
        </div>

        <div class="form-group">
            <label for="heure">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>

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




@endsection

