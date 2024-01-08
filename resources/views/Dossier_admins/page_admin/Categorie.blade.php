@extends('Dossier_admins.master')

@section('title')
    Liste des catégorie
@endsection

@include('Dossier_admins.sidebar')



@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">


        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0 ml-5">Liste des catégories</h4>
                    </div>
                    <div>
                        <a href="{{'addCategorie'}}" class="text-decoration-none text-white mr-5">
                            <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                                <i class="ti-plus btn-icon-prepend"></i>Ajouter une catégorie
                            </button></a>
                    </div>
                </div>
            </div>
        </div><br>


        @if (Session :: has("status"))
            <div class="alert alert-success">
                {{Session::get("status")}}
            </div>
        @endif

        <input type="hidden" {{$increment =1}}>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"> Liste des commandes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Numéro</th>
                            <th>Nom Catégorie</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                        <tbody >
                        @foreach ($categories as $category)

                            <tr>
                                <td>{{$increment}}</td>
                                <td>{{$category->categorie_name}}
                                </td>
                                <td>
                                    <a href="{{url('/editeCategorie/'.$category->id)}}" class="btn btn-primary"><i class="nav-icon fas fa-edit"></i></a>

                                    <form onsubmit=" return confirmSuppression(event)" action="{{url('/deleteCategorie/'.$category->id)}}" method="POST"  class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <!-- <a href="#" id="delete" class="btn btn-danger" ><i class="nav-icon fas fa-trash"></i></a> -->
                                        <input type="submit" id="delete" class="btn btn-danger" value="Supprimer">
                                    </form>

                                </td>
                            </tr>
                            <input type="hidden" {{$increment++}}>
                        @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmSuppression(event){
        event.preventDefault(); // Menghentikan form dari pengiriman langsung

        Swal.fire({
            title: 'Êtes-vous sûr de vouloir supprimer des données ?',
            text: "Les données supprimées ne peuvent pas être restaurées !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Confirmer',
            cancelButtonText: 'Annuler'
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {
                event.target.submit(); // Melanjutkan pengiriman form
            } else {
                swal('Votre fichier imaginaire est en sécurité !');
            }
        });
    }
</script>
