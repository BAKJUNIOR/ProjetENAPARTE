
<!-- Start Main Top -->
<div class="main-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="custom-select-box">
                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                        <option>¥ JPY</option>
                        <option>$ USD</option>
                        <option>€ EUR</option>
                    </select>
                </div>
                <div class="right-phone-box">
                    <p>Appelez-nous :- <a href="#"> +225 0789999981</a></p>
                </div>
                <div class="our-link">

                    <ul>
                        <li><a href="https://maps.app.goo.gl/QsyXfA7LMm2B5Cxr6"><i class="fas fa-location-arrow"></i> NOTRE EMPLACEMENT</a></li>
                        <li><a href="tel:+225 0789999981"><i class="fas fa-headset"></i>CONTACTEZ-NOUS</a></li>
                    </ul>
                </div>
            </div>


            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">


                <div class="login-box ">
                    <li class=" mr-2" ><a href="{{route('auth')}}" style="font-size: 18px  ; color: white"><i class="fas fa-sign-in-alt "></i> Admin</a></li>

                    @if (Session :: has('client'))
                        <li><a href="{{url('logout')}}" style="font-size: 18px  ; color: white"><i class="fa fa-user s_color" ></i> Se déconnecter</a></li>
                    @else
                        <li><a href="{{url('connexion')}}" style="font-size: 18px  ; color: white"><i class="fa fa-user s_color"></i> Se Connecter </a></li>
                    @endif
                </div>


                <div class="text-slid-box">
                    <div id="offer-box" class="carouselTicker">
                        <ul class="offer-box">
                            <li>
                                <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT80
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                            </li>
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Off 50%! Shop Now
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT30
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Off 50%! Shop Now
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Top -->

<!-- Start Main Top -->
<header class="main-header">
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
                <a class="navbar-brand" href="index.html"><img src="" class="logo" alt=""></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="nav-item {{request()->is('/') ? 'active' : '' }}"><a class="nav-link" href="{{url('/')}}">Accueil</a></li>
                    <li class="nav-item {{request()->is('boutique') ? 'active' : '' }}">
                        <a href="{{url('/boutique')}}" class="nav-link">BOUTIQUE</a>
                    </li>
                    <li class="nav-item {{request()->is('SoinsBeaute') ? 'active' : '' }}">
                        <a href="{{url('/SoinsBeaute')}}" class="nav-link">NOS SOINS DE BEAUTE</a>
                    </li>
                    <li class="nav-item {{request()->is('SoinsBeaute') ? 'active' : '' }}">
                    <a href="{{route('priseRDV')}}" class="nav-link"> Prendre rdv en ligne</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                    <li class="side-menu">
                        <a href="">
                            <i class="fa fa-shopping-bag"></i>
                            <span class="badge">{{Session :: has('cart') ? Session :: get('cart') -> totalQty : 0}}</span>
                            <p>Mon panier</p>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->
        </div>
        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <li class="cart-box">
                <ul class="cart-list">

                    @if (Session::has('topCart'))

                        @foreach (Session::get('topCart') as $product)

                            <li>
                                <a href="#" class="photo"><img src="{{asset('storage/product_images/'.$product["product_image"])}}" class="cart-thumb" alt="" /></a>
                                <h6><a href="#">{{$product["product_name"]}}</a></h6>
                                <p>{{$product["qty"]}}x - <span class="price">{{$product["product_price"]}} FCFA</span></p>
                            </li>


                        @endforeach

                    @endif


                    <li class="total">
                        <a href="{{url('/panier')}}" class="btn btn-default hvr-hover btn-cart">VOIR PANIER</a>
                        <span class="float-none"><strong>Total</strong>:{{Session:: has('cart') ? Session::get('cart')->totalPrice : 0}} FCFA</span>
                    </li>
                </ul>
            </li>
        </div>
        <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Main Top -->

<!-- Start Top Search -->
<form>
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
</form>
<!-- End Top Search -->
