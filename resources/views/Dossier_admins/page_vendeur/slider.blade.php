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

                    </div>
                    <div>
                        <a href="{{route('addSlider')}}" class="text-decoration-none text-white mr-5">
                            <button type="button" class="btn btn-primary btn-icon-text btn-rounded">
                                <i class="ti-plus btn-icon-prepend"></i>Ajouter slider sur le site
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
                <h6 class="m-0 font-weight-bold text-primary"> Liste des sliders</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Num.</th>
                            <th>Picture</th>
                            <th>Description one</th>
                            <th>Description Two</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($sliders as $slider)


                            <tr>
                                <td>{{$increment}}</td>
                                <td>
                                    <img src="{{asset('storage/slider_images/'.$slider->image) }}" style="height : 50px; width : 50px" class="img-circle elevation-2" alt="User backend/dist">
                                </td>
                                <td>
                                    {{$slider->description1}}
                                </td>
                                <td>
                                    {{$slider->description2}}
                                </td>
                                <td>
                                    <div class="d-flex"  >

                                    @if ($slider->status == 1)

                                        <form action="{{url('/DesactiverSlider/'.$slider->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="submit"  class="btn btn-success mr-2" value="Desactiver">
                                        </form>

                                    @else
                                        <form action="{{url('/activerSlider/'.$slider->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <input type="submit"  class="btn btn-warning mr-2" value="Activer">
                                        </form>
                                    @endif

                                        <strong>
                                            <a href="{{url('/editeSlider/'.$slider->id)}}" class="btn btn-primary mr-2"><i class="nav-icon fas fa-edit"></i></a>
                                        </strong>

                                    <form onsubmit=" return confirmSuppression(event)" action="{{url('/deleteSlider/'.$slider->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" id="delete" value="Supprimer " class="btn btn-danger mr-2">
                                    </form>

                                    </div>

                                </td>
                            </tr>
                            {{$increment++}}

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
