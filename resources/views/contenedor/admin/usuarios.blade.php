@extends('principal.admin.layout_admin')
@section('content')
<br>
<br>
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
                                <a href="{{ route('form_nuevo_usuario') }}" class="d-none btn btn-sm btn-primary shadow-sm">Agregar usuario</a>
                            </div> 
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <h2>Lista de usuarios</h2>
                        <table class="table table-hover" id="tusuarios" name="tusuarios">
                            <thead>
                                <tr>
                                    <th hidden="hide" >Id usuario</th>
                                    <th>Nro</th>
                                    <th>Nombre de usuario</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                    <th>Sucursal</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyid">
                                <?php $nro=0; ?>
                                @foreach($lista_usuarios as $u)
                                <?php $nro++; ?>
                                <tr>
                                    <td hidden="hide">{{$u->id}}</td>
                                    <td>{{$nro}}</td>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>{{$u->nombre_rol}}</td>
                                    <td><?php  echo $u->sucursal; ?></td>
                                    <td>
                                        <!-- Button -->
                                        <ul>    
                                            <li>
                                                <a href="{{ route('form_editar_usuario',$u->id) }}" class="btn btn-sm btn-primary shadow-sm fa fa-edit" aria-hidden="true" ></a>
                                                <a href="#" class="btn btn-sm btn-danger shadow-sm fa fa-trash-o" aria-hidden="true" onclick="eliminar_usuario({{$u->id}})"></a>
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
            <div class="col-md-1">
            </div>
		</div>
	</form>
</div>
<script type="text/javascript">
    function eliminar_usuario(id){ 
        var param={id_usuario:id};
        var url="{{route('eliminar_usuario')}}";
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
                        window.location.href = '{{url("usuarios_index")}}';
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
    var table = $('#tusuarios').DataTable({
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