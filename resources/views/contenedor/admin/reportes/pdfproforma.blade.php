
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"> alert("llego"); </script>
<style type="text/css">
#id_del_div{
  position: fixed;
  z-index: 100;
   margin-left:0%; 

}
body{
  font-family: Cambria;
  font-size: 11px;
}
h4,h5,p{
  font-family: Cambria;
   font-size: 11px;
}
.titulo{
  padding-top: -3px;
  /*padding-right: 2px;*/
  padding-bottom: -3px;
  /*padding-left: 0px;*/
}
</style>
</head>

<body>
    <div id="id_del_div">
        <img src="{{asset('imagen_empresa/')}}/{{$ruta_logo}}" width="90" height="70" border="4">
    </div>
    <br><br>
    <div >
      <h6 id="titulo" class="titulo" align="center" >PROFORMA Nro. {{$nro_proforma}}</h6>
      <?php if($codigo_moneda=='BS'){  ?>
        <p id="titulo" class="titulo" align="center" >(Expresados en Bolivianos)</p>
      <?php } else{  ?>
        <p id="titulo" class="titulo" align="center" >(Expresados en Dolares)</p>
      <?php }  ?>
      <p id="titulo" class="titulo" align="center" >{{$fecha}}</p>
    </div>
    <div>
        <p align="left" >{{$rubro}}<br>
        {{$direccion}}<br>
        {{$telefono}}<br>
        {{$direccion_general}}</p>
    </div>



    <p>Cliente&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>{{$nombre_completo}} </p>

    <p>Telefono/Celular&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$celular_telefono}}</p>

    <p>Direccion&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$direccion_cliente}}</p>

 

    <table class="table table-bordered" border="1">
      <thead>
        <tr>
          <th scope="col">Nro</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Producto</th>
          <th scope="col">Marca</th>
          <th scope="col">Precio</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>

        <?php $cont=0; $neto=0 ?>

        @foreach ($detalle as $p)
        
        <tr> <?php $cont=$cont+1; $neto=$neto+$p->total ?>
          <th scope="row"><?php echo $cont; ?></th>
          <td>{{ $p->cantidad }}</td>
          <td>{{ $p->nombre_producto }}</td>
          <td>{{ $p->nombre_marca }}</td>
          <td>{{ number_format((float)$p->precio_venta, 2, '.', '')  }}</td>
          <td>{{ number_format((float)$p->total, 2, '.', '')  }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div style="float: right;margin-right: 40px;">
      <p>
        <b>Neto</b>&nbsp;&nbsp;&nbsp;&nbsp;:<?php echo number_format((float)$neto, 2, '.', '') ; ?><br>
        <b>I.V.A.</b>&nbsp;&nbsp;&nbsp;:<?php echo number_format((float)$neto*0.13, 2, '.', ''); ?><br>
        <b>Total</b>&nbsp;&nbsp;&nbsp;&nbsp;:<?php echo  number_format((float)($neto*0.13)+($neto), 2, '.', ''); ?>
      </p>
    </div>
</body>
	

<html lang="{{ app()->getLocale() }}">

