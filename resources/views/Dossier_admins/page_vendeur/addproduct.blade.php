
@extends('Dossier_admins.master')

@section('title')
    Ajouter produits
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
            <h1>Ajouter des produits</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{'admin'}}">Accueil</a></li>
              <li class="breadcrumb-item active">Produits</li>
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
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title"> Ajouter Produit</h3>
              </div>
              <!-- /.card-header -->


                      <!-- /.card-header -->
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                        <li >{{$error}}</li>
                        @endforeach

                      </ul>
                    </div>
                    @endif

                    @if (Session :: has("status"))
                    <div class="alert alert-success">
                      {{Session::get("status")}}
                    </div>
                    @endif


              <!-- form start -->
              <form id="quickForm" action="{{route('SaveProduct')}}" method="POST" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nom Produit</label>
                    <input type="text" required name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter product name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Prix Produit</label>
                    <input type="number" required name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Enter product price" min="1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1"> detaille Produit</label>
                    <input type="text" required name="product_detaille" class="form-control" id="exampleInputEmail1" placeholder="Enter product detaille" min="1">
                  </div>
                  <div class="form-group">
                    <label>Produit Catégirie</label>
                    <select name="product_categorie"  required class="form-control select2" style="width: 100%;">
                      <option selected="selected" value="">Sélectionner la catégorie</option>

                      @foreach ($categories as $categorie)
                      <option>{{$categorie->categorie_name}}</option>
                      @endforeach


                    </select>
                  </div>
                  <label for="exampleInputFile">image Produit</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="product_image" required class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choisir Image</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                  <input type="submit" class="btn btn-warning" value="Sauvegarder">
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
