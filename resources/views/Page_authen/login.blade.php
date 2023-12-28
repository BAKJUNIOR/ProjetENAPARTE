<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('page_auth/images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('page_auth/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('page_auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('page_auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('page_auth/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('page_auth/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('page_auth/vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('page_auth/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('page_auth/vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('page_auth/')}}css/util.css">
    <link rel="stylesheet" type="text/css" href="{{asset('page_auth/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body style="background-color: #666666;">



<div class="limiter">
    <div class="container-login100">

        <div class="wrap-login100">





            <form action="{{route('auth')}}" method="POST" class="login100-form validate-form"  >

                <a href="{{'/'}}" ><i class="fa fa-arrow-left" aria-hidden="true" style="font-size: 20px ; padding-bottom: 60px"> Retour</i></a>

                @csrf
					<span class="login100-form-title p-b-43">
						Connectez-vous pour administrer
					</span>

                @if($errors->any())

                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $item)
                                <li> {{$item}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(Session::get('success'))

                    <div class="alert alert-success alert-dismissible fade show">
                        <ul>
                            <li>{{Session::get('success')}}</li>
                        </ul>
                    </div>
                @endif




                <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" {{old('email')}}>
                    <span class="focus-input100"></span>
                    <span class="label-input100">E-mail</span>
                </div>


                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Mot de passe</span>
                </div>

                <div class="flex-sb-m w-full p-t-3 p-b-32">
                    <div class="contact100-form-checkbox">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                        <label class="label-checkbox100" for="ckb1">
                            Souviens-toi de moi
                        </label>
                    </div>
                    <br>
                    <div>
                        <a href="#" class="txt1">
                            Mot de passe oublié?
                        </a>
                    </div>
                </div>


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Se connecter
                    </button>
                </div>
                <br>

               <div class="text-center p-t-46 p-b-20">
						<span class="txt2">
						<a href="{{route('inscription')}}" class="text-primary">S'inscrire</a> ou inscrivez-vous en utilisant
						</span>
                </div>
                <!--
                                <div class="login100-form-social flex-c-m">
                                    <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                                        <i class="fa fa-facebook-f" aria-hidden="true"></i>
                                    </a>

                                    <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                </div>-->

            </form>

            <div class="login100-more" style="background-image: url({{asset('page_auth/images/bg-01.jpg')}});">
            </div>
        </div>
    </div>
</div>





<!--===============================================================================================-->
<script src="{{asset('page_auth/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('page_auth/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('page_auth/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('page_auth/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('page_auth/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('page_auth/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('page_auth/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('page_auth/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('page_auth/js/main.js')}}"></script>

</body>
</html>
