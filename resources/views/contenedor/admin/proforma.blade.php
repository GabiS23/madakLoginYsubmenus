@extends('principal.admin.layout_admin')
@section('content')
<br><br>
<div class="">
	<form method="POST" id="form1" name="form1" action="{{ route('guardar_proforma') }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="row  justify-content-center">
            <div class="col-md-1"></div>
            <!-- inicio form cliente -->
			<div class="col-sm-3">
				<div class="row">
					<div class="col-xs-12 col-sm-12" style="padding-right:10px; border-right: 1px solid #D10024;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row-fluid"> 
                                    <div class="span6 pull-left"> 
                                        <h3>Datos del cliente</h3> 
                                    </div> 
                                    <div class="span6 pull-right"> 
                                        <a href="javascript:;" onclick="guardar();" class="d-none btn btn-sm btn-primary shadow-sm"><i class="fa fa-save"></i> Generar proforma</a>
                                        <a href="javascript:;"  onclick ="document.getElementById('form1').reset();" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fa fa-eraser"></i> Limpiar</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
						<div class="form-group">
							<label for="">CI:</label>
							<input type="text"  class="form-control" id="ci" name="ci" required autocomplete="off" >
							<div id="countryList"></div>
						</div>
						<div class="form-group">
							<label for="">Cliente:</label>
							<input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
						</div>
						<div class="form-group">
							<label for="">Telefono/Celular:</label>
							<input type="text" class="form-control" id="celular_telefono" name="celular_telefono">
						</div>
						<div class="form-group">
							<label for="">Direccion:</label>
							<textarea type="text" class="form-control" id="direccion_cliente" name="direccion_cliente" > </textarea> 
						</div>
                        <div class="table-responsive">
                            <table class="table table-hover" id="clientes" name="clientes">
                                <thead>
                                    <tr>
                                        <th hidden="hide" >Id detalle_proforma</th>
                                        <th>Cliente</th>
                                        <th>Fecha</th>
                                        <th>Nro</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ultimos_clientes as $p)
                                    <tr>
                                        <td hidden="hide">{{$p->id_detalle_proforma}}</td>
                                        <td>{{$p->nombre_completo}}</td>
                                        <td>{{$p->fecha}}</td>
                                        <th>{{$p->nro_proforma}}</th>
                                        <td>  
                                        <!-- dropdown -->
                                            <ul>    
                                                <li class="dropdown">
                                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-print fa-sm"></i>
                                                    </a>
                                                    <ul class="dropdown-menu" style="background:white;">
                                                        <li><a target="_blank" href="{!! route('pdfproforma',['download'=>'pdf','id_detalle_proforma'=> $p->id_detalle_proforma,'codigo_moneda' => 'BS' ]) !!}">Bs</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a target="_blank" href="{!! route('pdfproforma',['download'=>'pdf','id_detalle_proforma'=> $p->id_detalle_proforma,'codigo_moneda' => 'USD' ]) !!}">$US</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        <!-- dropdown -->
                                        <!--<a  id="descargar" name="descargar" href="{!! route('pdfproforma',['download'=>'pdf','id_detalle_proforma'=> $p->id_detalle_proforma ]) !!}"  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> </a> -->
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
					    </div>
                    </div>
				</div>
			</div>
            <!-- end form cliente -->
			<!-- inicio productos -->
			<div class="col-sm-7" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="row-fluid"> 
                            <div class="span6"> 
                            </div> 
                            <div class="span6 pull-right" style="text-align:right"> 
                                <select  onchange="ftipo_precio();" id="tipo_precio" name="tipo_precio" class="btn-sm btn-primary " searchable="Search" aria-haspopup="true" aria-expanded="false">
                                <option class="btn btn-sm bottom-primary" value="">Tipo Precio</option>
                                
                                @if ($rol=='admin')
                                        <option class="btn btn-sm bottom-primary" value="mayor">Precio por mayor</option>
                                        <option class="btn btn-sm bottom-primary" value="menor">Precio por menor</option>
                                    @endif
                                    @if ($rol=='vendedor')
                                        <option class="btn btn-sm bottom-primary" value="menor">Precio por menor</option>
                                    @endif
                                </select>
                            </div> 
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <h2>Lista de productos</h2>
                        <table class="table table-hover " id="tproformas" name="tproformas">
                            <thead>
                                <tr>
                                    <th hidden="hide" >Id producto</th>
                                    <th>Nro</th>
                                    <th>Codigo</th>
                                    <th>Stock</th>
                                    <th>Producto</th>
                                    <th>Marca</th>
                                    <th>Descripcion</th>
                                    <th>Categoria</th>
                                    <th>Almacen</th>
                                    <th class="menorc">Precio</th>
                                    <th class="mayorc">Precio</th>
                                    <th>Moneda</th>
                                    <th>Cantidad</th>
                                    <th hidden="true">
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbodyid">
                                <?php $nro=0; ?>
                                @foreach($proforma as $p)
                                <?php $nro++; ?>
                                <tr onclick="chekar({{$p->id_producto}},{{$p->stock}})">
                                    <td hidden="hide">{{$p->id_producto}}</td>
                                    <td>{{$nro}}</td>
                                    <td>{{$p->codigo_producto}}</td>
                                    <td>{{$p->stock}}</td>
                                    <td>{{$p->nombre_producto}}</td>
                                    <td>{{$p->nombre_marca}}</td>
                                    <td>{{$p->descripcion}}</td>
                                    <td>{{$p->nombre_categoria}}</td>
                                    <td>{{$p->nombre_almacen}}</td>
                                    <td class="menorc">
                                        <input id="{{'pre_'.$p->id_producto}}" class="form-control menor" placeholder="Precio unitario" value="  {{$p->precio_venta}}" name="{{'pre_'.$p->id_producto}}">
                                    </td>
                                    <td class="mayorc">
                                        <input id="{{'prema_'.$p->id_producto}}" class="form-control mayor"  placeholder="Precio x mayor" value="  {{$p->precio_mayor}}" name="{{'prema_'.$p->id_producto}}">
                                    </td>
                                    <td>{{$p->codigo_moneda}}</td>
                                    <td><input class="form-control" type="number" min="1" max="{{$p->stock}}" id="{{'cant_'.$p->id_producto}}" placeholder="Cantidad" value="1" name="{{'cant_'.$p->id_producto}}"></td>
                                    <td hidden="true"> <input  type="checkbox" id="{{'check_'.$p->id_producto}}" name="{{'check_'.$p->id_producto}}" onclick="Select({{$p->id_producto}},{{$p->stock}})"> </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
			
		</div>
	</form>

</div>

<script >
    ftipo_precio();
    const proformas = {!! json_encode($proforma) !!};
    function chekar(id,stock){
        var dato1='check_'+id;
        var inputCheck = document.getElementById(dato1);
        inputCheck.checked =!inputCheck.checked;
        Select(id,stock);
    }
    function Select(id,stock){
        var dato1='check_'+id;
        var dato2='cant_'+id;
        var dato3='pre_'+id;
        var dato4='prema_'+id;
        if(document.getElementById('tipo_precio').value=='0'){
            document.getElementById(dato1).checked = false;
            swal("Alerta!",
                "Seleccione el tipo de precio",
                "error");
        }
        else{
            let indice = proformas.findIndex(producto => producto.id_producto == id);
            console.log("El elemento buscado está en el índice ", indice);
            if( parseInt(document.getElementById(dato2).value)>0 && parseInt(document.getElementById(dato2).value)<=parseInt(stock) )  {
                var checkbox2 = document.getElementById(dato1);
                if (checkbox2.checked==true){
                    document.getElementById(dato2).readOnly = true;
                    document.getElementById(dato3).readOnly = true;
                    document.getElementById(dato1).checked = true;
                    document.getElementById(dato4).readOnly = true;
                    proformas[indice].precio_venta=document.getElementById(dato3).value;
                    proformas[indice].cantidad_compra=document.getElementById(dato2).value;
                    proformas[indice].bandera_compra=document.getElementById(dato1).checked;
                    proformas[indice].precio_mayor=document.getElementById(dato4).value;
                } else {
                    document.getElementById(dato2).readOnly = false;
                    document.getElementById(dato3).readOnly = false;
                    document.getElementById(dato1).checked = false;
                    document.getElementById(dato4).readOnly = false;
                    proformas[indice].bandera_compra=false;
                }
            }
            else{
                if(parseInt(document.getElementById(dato2).value)<=0){
                    alert("Error!! Cantidad de compra invalida");
                }
                else{
                    alert("Error!! cantidad insuficiente en stock");
                }
                
                document.getElementById(dato1).checked = false;
            }
        }
        if(document.getElementById('tipo_precio').value=='mayor'){
            $('.menor').attr('readonly', true);
        }
        if(document.getElementById('tipo_precio').value=='menor'){
            $('.mayor').attr('readonly', true);
        }
    }
    function guardar(){
        if(document.getElementById('ci').value.trim()=='' ){
            swal("Alerta!",
                "Ingrese la cedula de idendidad del cliente",
                "error");
        }
        else{
            if(document.getElementById('nombre_completo').value.trim()=='' ){
               swal("Alerta!",
                "Ingrese el nombre del cliente",
                "error");
            }
            else{
                if(document.getElementById('celular_telefono').value.trim()=='' ){
                   swal("Alerta!",
                    "Ingrese el numero de celular del cliente",
                    "error");
                }
                else{
                   document.getElementById('form1').submit();   
                }
            }
        }
    }
    function loading(){
        //$('.loader').show();
       // setTimeout(() => {  $('.loader').hide(); }, 5000);
    }
    var arrayProperties = new Array();
    function clienteBusq(posiccion){
        $('#countryList').html('');
        document.getElementById('ci').value=arrayProperties[posiccion].ci;
        document.getElementById('nombre_completo').value=arrayProperties[posiccion].nombre_completo;
        document.getElementById('celular_telefono').value=arrayProperties[posiccion].celular_telefono;
        document.getElementById('direccion_cliente').value=arrayProperties[posiccion].direccion_cliente;
       
    }
    function vaciarClientes(){
        //document.getElementById('ci').value='';
        document.getElementById('nombre_completo').value='';
        document.getElementById('celular_telefono').value='';
        document.getElementById('direccion_cliente').value='';
    }
    function ftipo_precio(){
      
        $('.menor').attr('readonly', false);
        $('.mayor').attr('readonly', false);
        $('.menorc').hide();
        $('.mayorc').hide();
        if(document.getElementById('tipo_precio').value=='mayor'){
            $('.menor').attr('readonly', true);
            $('.mayorc').show();
        }
        if(document.getElementById('tipo_precio').value=='menor'){
            $('.mayor').attr('readonly', true);
            $('.menorc').show();
        }
    }
</script>
<script >
    $(document).ready(function(){
        $('.mayorc').hide();
        $('.menorc').hide();
        $('#ci').keyup(function(){ 
                var token = '{{csrf_token()}}';
                var param={ci:document.getElementById('ci').value};
                var url="{{ route('cliente_busqueda') }}";
                console.log('prueba',token);
                $.ajax({   
                type: "post",
                url:url,
                data:{dato: param },
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                success: function(data){ 
                    console.log('prueba23',data);
                    vaciarClientes();
                    arrayProperties = new Array();
                    var datos='<ul class="list-group">';
                    for (var i = 0;  i < data.clientes.length ; i++) {
                        
                        var cliente = new Object();
                        cliente.ci=data.clientes[i].ci;
                        cliente.nombre_completo=data.clientes[i].nombre_completo;
                        cliente.celular_telefono=data.clientes[i].celular_telefono;
                        cliente.direccion_cliente=data.clientes[i].direccion_cliente;
                        datos += '<li class="list-group-item" ><a id="link" onClick="clienteBusq('+i+');" href="#">'+data.clientes[i].ci+'</a></li>';
                        arrayProperties.push(cliente);
                    }
                    datos+='</ul>';
                    $('#countryList').html(datos);
                }
                });
        });
        var table = $('#tproformas').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
            },
        });
        var table = $('#clientes').DataTable({
            // "paging":   false,
            pageLength : 3,
            // lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
            "bLengthChange": false,
            "ordering": false,
            "info":     false,
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
            },
        });
    });
</script>
@stop