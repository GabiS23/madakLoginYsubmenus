@extends('principal.admin.layout_admin')
@section('content')
<br><br>
<div class="">
	<form method="GET" id="form2" name="form2" action="{{ route('producto_index') }}" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="row  justify-content-center">
            <div class="col-md-1"></div>
           
			<!-- inicio productos -->
			<div class="col-sm-10" >
            <div class="row">
                            <div class="col-md-12">
                                <div class="row-fluid"> 
                                    <div class="span10 pull-right"> 
                                        <a href="{{ route('form_nuevo') }}" class="d-none btn btn-sm btn-primary shadow-sm">Agregar producto</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <h2>Lista de productos</h2>
                        <table class="table table-hover" id="tproformas" name="tproformas">
                            <thead>
                                <tr>
                                    <th hidden="hide" >Id producto</th>
                                    <th>Nro</th>
                                    <th>Codigo</th>
                                    <th>Stock</th>
                                    <th>Producto</th>
                                    <th>Marca</th>
                                    <th>Descripcion</th>
                                    <th>List. Imagenes</th>
                                    <th>Categoria</th>
                                    <th>Almacen</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyid">
                                <?php $nro=0; ?>
                                @foreach($lista_producto as $p)
                                <?php $nro++; ?>
                                <!-- <tr onclick="chekar({{$p->id_producto}},{{$p->stock}})"> -->
                                <tr>
                                    <td hidden="hide">{{$p->id_producto}}</td>
                                    <td>{{$nro}}</td>
                                    <td>{{$p->codigo_producto}}</td>
                                    <td>{{$p->stock}}</td>
                                    <td>{{$p->nombre_producto}}</td>
                                    <td>{{$p->nombre_marca}}</td>
                                    <td>
                                        <a href="#" data-toggle="collapse" data-target="#demo<?php echo $p->id_producto;?>" style="color:#286090;">Ver descripcion</a>
                                        <div id="demo<?php echo $p->id_producto;?>" class="collapse">
                                        {{$p->descripcion}}
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <a href="{{ route('imagen_producto',$p->id_producto) }}">Agregar imagen</a>
                                    </td>
                                    <td>{{$p->nombre_categoria}}</td>
                                    <td>{{$p->nombre_almacen}}</td>
                                    <td>
                                        <!-- Button -->
                                        <ul>    
                                            <li>
                                                <a href="{{ route('form_editar') }}" class="btn btn-sm btn-primary shadow-sm fa fa-edit" aria-hidden="true"></a>
                                                <a href="#" class="btn btn-sm btn-danger shadow-sm fa fa-trash-o" aria-hidden="true" onclick="eliminar_producto({{$p->id_producto}})"></a>
                                            </li>
                                        </ul>
                                        <!-- Button -->
                                    </td>
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
<script type="text/javascript">
    function eliminar_producto(id_producto){ 
        var param={id_producto:id_producto};
        var url="{{route('eliminar_producto')}}";
        if (confirm("Esta seguro de liminar el registro!")) {
            $.ajax({   
                type: "post",
                url:url,
                //envia parametros
                data:{dato: param },
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                success: function(rcdata){ 
                    //recibe parametros
                //    console.log(rcdata);
                //    document.form2.submit();
                    if(rcdata==""){
                        window.location.href = '{{url("producto_index")}}';
                    }
                    else{
                        alert(rcdata);
                    }
                }
            });
            // alert("You pressed OK!");
        }
        
    }
</script>
<script>
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
</script>
@stop