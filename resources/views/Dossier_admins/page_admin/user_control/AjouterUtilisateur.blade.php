@extends('Dossier_admins.master')

@section('title')
    Ajouter des Employés
@endsection

@section('navitem')
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        @if(Auth::user()->role === 'admin')
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{'admin'}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="{{asset('page_dashboards/img/En_aparté_2021.png')}}" alt="" style="width: 100px;">
                </div>

            </a>
        @elseif(Auth::user()->role === 'user')
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{'user'}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="{{asset('page_dashboards/img/En_aparté_2021.png')}}" alt="" style="width: 100px;">
                </div>

            </a>
        @endif


        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{'admin'}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Tableau de bard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            ADMINISTRER
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Gestion paramètre site</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">paramètre du site:</h6>
                    <a class="collapse-item" href="{{'Slider'}}">Liste des sliders</a>
                    <a class="collapse-item" href="{{'addSlider'}}">Ajouter slider</a>
                    <a class="collapse-item" href="{{'Categorie'}}">Liste des categories</a>
                    <a class="collapse-item" href="{{'addCategorie'}}">Ajouter Catégorie</a>
                    <a class="collapse-item" href="{{'product'}}">Liste des produits</a>
                    <a class="collapse-item" href="{{'addproduct'}}">Ajouter produits</a>
                </div>
            </div>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{'order'}}">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span>Gestion des commandes </span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{'userGestion'}}">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>Gestion des Utilisateurs </span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>


    </ul>
    <!-- End of Sidebar -->
@endsection

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
