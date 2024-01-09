@extends('Dossier_admins.master')

@section('title')
    Gestion des commandes
@endsection

@include('Dossier_admins.sidebar')



@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Gestion des commandes</h1>

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
                            <th>Date</th>
                            <th>Nom Client</th>
                            <th>Commande</th>
                            <th>Adresse</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($orders as $order)

                            <tr>
                                <td>{{$order->created_at}}</td>
                                <td>{{$order->names}}</td>
                                <td>

                                    @foreach ($order->panier->items as $item)
                                        {{$item['product_name']." , "."Quantité : " .$item['qty']."  "}} <br>
                                    @endforeach

                                </td>

                                <td>{{$order->adress}}</td>
                                <td>
                                    <a href="{{url ('VoirCommande' , [$order->id])}}" target="_blank" class="btn btn-primary"><i class="nav-icon fas fa-eye"></i></a>
                                </td>

                            </tr>

                        @endforeach


                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
