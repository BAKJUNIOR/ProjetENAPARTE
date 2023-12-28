@extends('Dossier_admins.master')

@section('title')
    Liste des catégorie
@endsection


@if(Auth::user()->role === 'admin')
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
@elseif(Auth::user()->role === 'user')
    @section('navitem')
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{'user'}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="{{asset('page_dashboards/img/En_aparté_2021.png')}}" alt="" style="width: 100px;">
                </div>

            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{'user'}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de bard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                   aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                   aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="{{'listeEtudiant'}}">ListeEtudiants</a>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
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
@endif

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
