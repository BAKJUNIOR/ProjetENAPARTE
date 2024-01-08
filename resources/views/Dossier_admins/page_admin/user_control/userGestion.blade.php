@extends('Dossier_admins.master')

@section('title')
    Gestion des Employés
@endsection

@include('Dossier_admins.sidebar')
        @section('main')
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="font-weight-bold mb-0 ml-5">Gestion des Utilisateurs </h4>
                        </div>
                        <div>
                            <a href="{{ route('AjouterUtilisateur')}}" class="text-decoration-none text-white mr-5">
                                <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                                    <i class="ti-plus btn-icon-prepend"></i>Ajouter un Employer
                                </button></a>
                        </div>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire(
                            'Sukses',
                            '{{ Session::get('success') }}',
                            'success'
                        );
                    });
                </script>
            @endif
            <div class="col-lg-12 grid-margin stretch-card mt-3">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">TABLEAU DE COMPTE </h4>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        Image
                                    </th>
                                    <th>
                                       Nom complet
                                    </th>
                                    <th>
                                        Rôle
                                    </th>
                                    <th>
                                        Email
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                @foreach ($uc as $item)
                                    <tbody>
                                    <td class="py-1">
                                        <img src="{{ asset('picture/accounts') }}/{{ $item->image }}" alt="image" height="50" width="50"/>
                                    </td>
                                    <td>
                                        {{ $item->fullname }}
                                    </td>
                                    @if ($item->role === 'admin')
                                        <td style="color:rgb(0, 255, 0); font-weight: bold;">
                                            {{ $item->role }}</td>
                                    @else
                                        <td>{{ $item->role }}</td>
                                    @endif
                                    <td>{{ $item->email }}</td>
                                    @if ($item->role === 'admin')
                                        <td style="color:rgb(0, 255, 0); font-weight: bold;">Utilisateur administrateur </td>
                                    @else
                                        <td>
                                            <form onsubmit="return confirm('Etes-vous sûr de vouloir désigner  {{ $item->fullname }} comme ADMIN?')"
                                                  class="d-inline" action="/uprole/{{ $item->id }}" method="POST">
                                                @csrf
                                                <input type="submit"
                                                       class="btn-sm text-decoration-none border border-warning text-warning"
                                                       value="UP">
                                            </form>
                                            &nbsp;<a href="/editUtilisateur/{{ $item->id }}"
                                                     class="btn-sm btn-warning text-decoration-none">Modifier</a>

                                            <form onsubmit="return confirmDelete(event)" class="d-inline"
                                                  action="/deleteUtilisateur/{{ $item->id }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn-sm btn-danger btn-sm">Supprimer</button>
                                            </form>
                                            @endif
                                        </td>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endsection


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmDelete(event) {
        event.preventDefault(); // Menghentikan form dari pengiriman langsung

        Swal.fire({
            title: 'Êtes-vous sûr de vouloir supprimer des donnée?',
            text: "Les données supprimées ne peuvent pas être restaurées!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Supprimer',
            cancelButtonText: 'Annuler'
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {
                event.target.submit(); // Melanjutkan pengiriman form
            } else {
                swal('Votre fichier imaginaire est en sécurité!');
            }
        });
    }
</script>




