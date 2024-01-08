@extends('Dossier_admins.master')

@section('title')
   Ajouter catégorie
@endsection

@include('Dossier_admins.sidebar')


@section('main')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Catégorie</h1>

                        @if (Session :: has("status"))
                            <div class="alert alert-success" >
                                {{Session::get("status")}}
                            </div>
                        @endif

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{'admin'}}">Accueil</a></li>
                            <li class="breadcrumb-item active">Catégorie </li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"> Ajouter une catégorie</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->



                            <form action="{{route('SaveCategorie')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nom de catégorie</label>
                                        <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Entrer catégorie" required>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                                    <input type="submit" class="btn btn-primary" value="Sauvegarder" >
                                </div>
                            </form>

                        </div>

                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

