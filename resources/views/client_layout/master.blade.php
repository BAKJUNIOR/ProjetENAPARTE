<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>@yield('title')</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="fontend/images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="fontend/images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="fontend/css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="fontend/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="fontend/css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="fontend/css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

{{-- START header--}}

@include('client_layout.header')

{{-- END heard--}}


    {{-- START CONTENU--}}

     @yield('content') <!-- Appel le contenu (content) dynamique depuit home grace a la fonction section-->

     {{-- END CONTENU--}}



{{-- START footer--}}

@include('client_layout.footer')

{{-- END footer--}}


</body>

</html>
