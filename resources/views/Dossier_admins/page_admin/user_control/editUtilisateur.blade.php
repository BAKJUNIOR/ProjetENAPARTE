@extends('Dossier_admins.master')

@section('title')
   Modifier des Employés
@endsection

@include('Dossier_admins.sidebar')

@section('main')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Modifier l'employer </h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @foreach ($uc as $item)
                    <form class="forms-sample" method="POST" action="/editUtilisateur" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <div class="p-2">
                                <img src="{{ asset('picture/accounts/') }}/{{ $item->image }}" alt="Image"
                                    style="width: 50px; height: 50px;">
                            </div>
                            <input class="form-control" type="file" id="image" name="image">
                        </div>
                        <div class="form-group">
                            <label for="fullname">Nom & prénomm</label>
                            <input type="text" class="form-control" id="nama" placeholder="Konan Exemple"
                                name="fullname" value="{{ $item->fullname }}">
                        </div>
                        <input type="hidden" name="password" value="{{ $item->password }}">
                        <button type="submit" class="btn btn-primary me-2">Modifier</button>
                        <a href="/userGestion" class="btn btn-light">Retour</a>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
