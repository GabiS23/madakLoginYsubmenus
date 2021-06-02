<!DOCTYPE html>
<html lang="es">
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
        <!--maps-->
        <style>
         #mimapa {height: 600px;}
        </style>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="crossorigin=""/>
        <!-- maps -->
        <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
</head>
<body >
    @include('principal.visita.header')
    <div>
        @yield('content')
    </div>
    @include('principal.visita.footer')
    <script src="{{URL::asset('visita/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('visita/js/slick.min.js')}}"></script>
    <script src="{{URL::asset('visita/js/main.js')}}"></script>
    <script src="{{URL::asset('visita/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('visita/js/nouislider.min.js')}}"></script>
    <script src="{{URL::asset('visita/js/jquery.zoom.min.js')}}"></script>  
</body>
</html>
