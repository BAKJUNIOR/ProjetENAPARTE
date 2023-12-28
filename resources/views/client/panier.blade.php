@extends('client_layout.master')

@section('title')
EN APARTÉ | Panier
@endsection


@section('content')

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Panier</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Boutique</a></li>
                    <li class="breadcrumb-item active">Panier</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">

         @if (Session::has('status'))
         <div class="alert alert-success">
            {{Session::get('status')}}
         </div>
         
         @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Images Produits</th>
                                <th>Nom Produits</th>
                                <th>Prix</th>
                                <th>Quantiéy</th>
                                <th>Total</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>

                       @if (Session::has('topCart'))

                       @foreach (Session:: get('topCart') as $product)
                           
                    <tr>
                            <td class="thumbnail-img">
                                <a href="#">
                            <img class="img-fluid" src="{{asset('storage/product_images/'.$product["product_image"])}}" alt="" />
                        </a>
                            </td>
                            <td class="name-pr">
                                <a href="#">
                                    {{$product["product_name"]}}
                        </a>
                            </td>
                            <td class="price-pr">
                                <p>{{$product["product_price"]}}</p>
                            </td>
                            <td class="quantity-box">

                          <form action="{{url('panier/modifierQte',[$product ['product_id']])}}" method="POST">
                               @csrf
                               @method('PUT') 
                            <input type="number" size="4" name="qty" value="{{$product["qty"]}}" min="1" step="1" class="c-input-text qty text">
                               <br>
                               <input type="submit" class="btn btn-dark" value="Modifier">
                            </form>
                        </td>
                            <td class="total-pr">
                                <p>{{$product["product_price"]*$product["qty"]}}</p>
                            </td>
                            <td class="remove-pr">
                                <a href="{{url('panier/supprimerItem',[$product ['product_id']])}}">
                            <i class="fas fa-times"></i>
                        </a>
                            </td>
                    </tr>

                       @endforeach
                           
                       @endif
                           
                           
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-6 col-sm-6">
                <div class="coupon-box">
                    <div class="input-group input-group-sm">
                        <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                        <div class="input-group-append">
                            <button class="btn btn-theme" type="button">Appliquer Coupon</button>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="row my-5">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12">
                <div class="order-box">
                    <h3>Récapitulatif de la commande </h3>
                    <div class="d-flex">
                        <h4>Sub Total</h4>
                        <div class="ml-auto font-weight-bold"> $ 130 </div>
                    </div>
                    <div class="d-flex">
                        <h4>Discount</h4>
                        <div class="ml-auto font-weight-bold"> $ 40 </div>
                    </div>
                    <hr class="my-1">
                    <div class="d-flex">
                        <h4>Coupon Discount</h4>
                        <div class="ml-auto font-weight-bold"> $ 10 </div>
                    </div>
                    <div class="d-flex">
                        <h4>Tax</h4>
                        <div class="ml-auto font-weight-bold"> $ 2 </div>
                    </div>
                    <div class="d-flex">
                        <h4>Shipping Cost</h4>
                        <div class="ml-auto font-weight-bold"> Free </div>
                    </div>
                    <hr>
                    <div class="d-flex gr-total">
                        <h5>Grand Total</h5>
                        <div class="ml-auto h5"> {{Session::has('cart') ? number_format(Session::get('cart')->totalPrice, 2) : 0}} FCFA </div>
                    </div>
                    <hr> </div>
            </div>
            <div class="col-12 d-flex shopping-box"><a href="{{url('/checkout')}}" class="ml-auto btn hvr-hover">Verifier & Valider la commande</a> </div>
        </div>

    </div>
</div>
<!-- End Cart -->
    

@endsection


