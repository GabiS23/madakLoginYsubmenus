@extends('principal.admin.layout_admin')
@section('content')
<br>
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-1">
        </div>
        <div class="col-md-3">
            <div class="row">
                <form method="POST" id="form2" name="form2" action="{{ route('nuevo_imagen_producto') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                    <?php for($i = 0; $i < count($lista_errores); $i++){ ?>
                            <div class="alert alert-danger" role="alert" >
                            <?php echo($lista_errores[$i]); ?>
                            </div>
                        <?php } ?>
                        <?php if($validacion_correcta==1){ ?>
                            <div class="alert alert-success" role="alert" >
                            Registrado correctamente
                            </div>
                        <?php } ?>
                    <!-- imagen -->
                    <h2>Añadir imageness</h2>
                    <div class="row">
                        <div class="col-md-10">
                            <label for="exampleFormControlFile1">Imagen de producto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                    </div>
                    <!-- tipo de moneda -->
                    <br>
                    <div class="row">
                        <div class="col-md-5">
                            <label for="inputState">Mostrar en catalogo</label>
                            <select id="mostrar_catalogo" name="mostrar_catalogo" class="form-control">
                                <option value="no">No</option>
                                <option value="si">Si</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-7">
                            <input hidden="hide" type="text" class="form-control-file" id="id_producto" name="id_producto" value="{{$id_producto}}">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-12">
                <h2>Lista de Imagenes</h2>
                <table class="table table-hover" id="timagenes" name="timagenes">
                    <thead>
                        <tr>
                            <th hidden="hide" >Id imagen</th>
                            <th>Nro</th>
                            <th>Mostrar catalogo</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyid">
                        <?php $nro=0; ?>
                        @foreach($lista_imagen as $i)
                        <?php $nro++; ?>
                    
                        <tr>
                            <td hidden="hide">{{$i->id_imagen_producto}}</td>
                            <td>{{$nro}}</td>
                            <td>{{$i->mostrar_catalogo}}</td>
                            <td>
                            <!-- concatenar en php . -->
                            @if($i->foto=="")
                                <img src="{{URL::asset('imagenes/productos/default_producto.jpg')}}" style="height:50px; width:50px;object-fit:cover;">
                            @else
                                <img src="{{URL::asset('imagenes/productos/'.$i->foto)}}" style="height:50px; width:50px;object-fit:cover;">
                            @endif
                            </td>
                            <td>
                                <!-- Button -->
                                <ul>    
                                    <li>
                                        <a href="#" class="btn btn-sm btn-danger shadow-sm fa fa-trash-o" aria-hidden="true" onclick="eliminar_imagen({{$i->id_imagen_producto}})"></a>
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
</div>
<script type="text/javascript">
    function eliminar_imagen(id_imagen_producto){ 
        var param={id_imagen:id_imagen_producto};
        var url="{{route('eliminar_imagen')}}";
        if (confirm("Esta seguro de liminar el registro!")) {
            $.ajax({   
                type: "post",
                url:url,
                data:{dato: param },
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                success: function(rcdata){ 
                    if(rcdata==""){
                        window.location.href = '{{url("imagen_producto",$id_producto)}}';
                    }
                    else{
                        alert(rcdata);
                    }
                }
            });
        }
    }
    var validacion='{{$validacion_correcta}}';
    if (validacion==1) {
        window.location.href = '{{url("imagen_producto",$id_producto)}}';
    }
</script>

@stop