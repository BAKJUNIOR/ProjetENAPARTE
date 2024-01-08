@extends('Dossier_admins.master')

@section('title')
    Ajouter des Employés
@endsection

@include('Dossier_admins.sidebar')


@section('main')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Ajouter un Employer </h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="forms-sample" method="POST" action="/AjouterUtilisateur" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nom et prénom </label>
                        <input type="text" class="form-control" id="name" placeholder="Konan Exemple"
                            name="fullname" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Adresse mail</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email"
                            name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Mot de passe</label>
                        <input type="password" class="form-control" id="exampleInputEmail3" placeholder="Password"
                            name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary me-2">Ajouter</button>
                    <a href="/userGestion" class="btn btn-light">Retour</a>
                </form>
            </div>
        </div>
    </div>
@endsection
