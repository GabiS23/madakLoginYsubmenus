<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- <script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>   -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- Google font -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
        <!-- Bootstrap -->
        <link type="text/css" rel="stylesheet" href="{{URL::asset('visita/css/bootstrap.min.css')}}"/>
        <!-- Slick -->
        <link type="text/css" rel="stylesheet" href="{{URL::asset('visita/css/slick.css')}}"/>
        <link type="text/css" rel="stylesheet" href="{{URL::asset('visita/css/slick-theme.css')}}"/>
        <!-- nouislider -->
        <link type="text/css" rel="stylesheet" href="{{URL::asset('visita/css/nouislider.min.css')}}"/>
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="{{URL::asset('visita/css/font-awesome.min.css')}}">
        <!-- Custom stlylesheet -->
        <link type="text/css" rel="stylesheet" href="{{URL::asset('visita/css/style.css')}}"/>
        <!-- datatable css -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
        <!-- sweeft -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- datatable 2 -->
        <script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
        <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <!-- ckeditor -->
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <!-- select 2 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    @include('principal.admin.header')
    <div>
        @yield('content')
    </div>
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    
    <!-- datatable inicio -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    
    <!-- datatable fin -->
    <script src="{{URL::asset('visita/js/slick.min.js')}}"></script>
    <script src="{{URL::asset('visita/js/main.js')}}"></script>
    <script src="{{URL::asset('visita/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('visita/js/nouislider.min.js')}}"></script>
    <script src="{{URL::asset('visita/js/jquery.zoom.min.js')}}"></script>
</body>
</html>
