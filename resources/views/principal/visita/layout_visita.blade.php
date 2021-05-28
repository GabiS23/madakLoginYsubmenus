<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
        <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="visita/css/bootstrap.min.css"/>
        <!-- Slick -->
        <link type="text/css" rel="stylesheet" href="visita/css/slick.css"/>
        <link type="text/css" rel="stylesheet" href="visita/css/slick-theme.css"/>
        <!-- nouislider -->
        <link type="text/css" rel="stylesheet" href="visita/css/nouislider.min.css"/>
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="visita/css/font-awesome.min.css">
        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="visita/css/style.css"/>
</head>
<body>
    @include('principal.visita.header')
    <div>
        @yield('content')
    </div>
    <script src="{{URL::asset('visita/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('visita/js/slick.min.js')}}"></script>
    <script src="{{URL::asset('visita/js/main.js')}}"></script>
    <script src="{{URL::asset('visita/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('visita/js/nouislider.min.js')}}"></script>
    <script src="{{URL::asset('visita/js/jquery.zoom.min.js')}}"></script>
</body>
</html>
