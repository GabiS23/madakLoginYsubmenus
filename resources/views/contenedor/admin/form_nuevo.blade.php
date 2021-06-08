@extends('principal.admin.layout_admin')
@section('content')
<br><br>
<form method="POST" id="nuevo_producto" name="nuevo_producto" action="{{ route('nuevo_producto') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-2"></div>
        <!-- inicio formulario -->
        <div class="col-sm-8" >
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
        <h2>Nuevo Producto</h2>
            <form>
                <div class="row">
                    <!-- gestion -->
                    <div class="form-group col-md-4">
                        <label for="inputState">Gestion</label>
                        <select id="id_gestion" name="id_gestion" class="form-control">
                            <option value="0">Elegir</option>
                            @foreach($lista_gestion as $g)
                                @if($id_gestion >= $g->id_gestion)
                                    <option value="{{$g->id_gestion}}" selected>{{$g->nombre_gestion}}</option>
                                @else
                                    <option value="{{$g->id_gestion}}">{{$g->nombre_gestion}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                     <!-- cantidad -->
                     <div class="form-group col-md-4">
                        <label>Cantidad</label>
                        <input type="numb" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad" value="{{$cantidad}}">
                    </div>
                    <!-- departamento -->
                    <div class="form-group col-md-4">
                        <label for="inputState">Departamento</label>
                        <select id="id_departamento" name="id_departamento" class="form-control" onchange="cargar_sucursal();">
                            <option value="0">Elegir</option>
                            @foreach($lista_departamento as $d)
                                @if($id_departamento >= $d->id_departamento)
                                    <option value="{{$d->id_departamento}}" selected>{{$d->nombre_departamento}}</option>
                                @else
                                    <option value="{{$d->id_departamento}}">{{$d->nombre_departamento}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                   
                </div>
                <div class="row">
                    <!-- categoria -->
                    <div class="form-group col-md-4">
                        <label for="inputState">Categoria</label>
                        <select id="id_categoria" name="id_categoria" class="form-control">
                            <option value="0">Elegir</option>
                            @foreach($lista_categoria as $c)
                                @if($id_categoria >= $c->id_categoria)
                                    <option value="{{$c->id_categoria}}" selected>{{$c->nombre_categoria}}</option>
                                @else
                                    <option value="{{$c->id_categoria}}">{{$c->nombre_categoria}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <!-- tipo de moneda -->
                    <div class="form-group col-md-4">
                        <label for="inputState">Tipo de moneda</label>
                        <select id="id_moneda" name="id_moneda" class="form-control">
                            <option value="0">Elegir</option>
                            @foreach($lista_moneda as $mo)
                                @if($id_moneda >= $mo->id_moneda)
                                    <option value="{{$mo->id_moneda}}" selected>{{$mo->codigo_moneda}}</option>
                                @else
                                    <option value="{{$mo->id_moneda}}">{{$mo->codigo_moneda}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <!-- sucursal -->
                    <div class="form-group col-md-4">
                        <label for="inputState">Sucursal</label>
                        <select id="id_sucursal" name="id_sucursal" class="form-control" onchange="cargar_almacen();">
                            <option value="0">Elegir</option>
                            @foreach($lista_sucursal as $s)
                                @if($id_sucursal >= $s->id_sucursal)
                                    <option value="{{$s->id_sucursal}}" selected>{{$s->nombre_sucursal}}</option>
                                @else
                                <option value="{{$s->id_sucursal}}">{{$s->nombre_sucursal}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>              
                </div>
                <div class="row">
                    <!-- nombre -->
                    <div class="form-group col-md-4">
                        <label>Nombre de producto</label>
                        <input type="numb" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Modelo"value="{{$nombre_producto}}">
                    </div>
                    <!-- precio de compra -->
                    <div class="form-group col-md-4">
                        <label>Precio de compra</label>
                        <input type="numb" class="form-control" id="precio_compra" name="precio_compra" placeholder="Precio compra" value="{{$precio_compra}}">
                    </div>
                     <!-- almacen -->
                     <div class="form-group col-md-4">
                        <label for="inputState">Almacen</label>
                        <select id="id_almacen" name="id_almacen" class="form-control">
                            <option value="0">Elegir</option>
                            @foreach($lista_almacen as $a)
                                @if($id_almacen >= $a->id_almacen)
                                    <option value="{{$a->id_almacen}}" selected>{{$a->nombre_almacen}}</option>
                                @else
                                    <option value="{{$a->id_almacen}}">{{$a->nombre_almacen}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <div class="row">
                    <!-- marca -->
                    <div class="form-group col-md-4">
                        <label for="inputState">Marca</label>
                        <select id="id_marca" name="id_marca" class="form-control">
                            <option value="0">Elegir</option>
                            @foreach($lista_marca as $m)
                                @if($id_marca >= $m->id_marca)
                                    <option value="{{$m->id_marca}}" selected>{{$m->nombre_marca}}</option>
                                @else
                                    <option value="{{$m->id_marca}}">{{$m->nombre_marca}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <!-- mayor -->
                    <div class="form-group col-md-4">
                        <label>Precio de venta por mayor</label>
                        <input type="numb" class="form-control" id="precio_mayor" name="precio_mayor" placeholder="Precio venta por mayor" value="{{$precio_mayor}}">
                    </div>
                    
                </div>
                <div class="row">
                    <!-- codigo -->
                    <div class="form-group col-md-4">
                        <label>Codigo</label>
                        <input type="text" class="form-control" id="codigo_producto" name="codigo_producto" placeholder="Codigo de producto" value="{{$codigo_producto}}">
                    </div>
                     <!-- venta por menor -->
                     <div class="form-group col-md-4">
                        <label>Precio de venta por menor</label>
                        <input type="numb" class="form-control" id="precio_venta" name="precio_venta" placeholder="Precio venta por menor" value="{{$precio_venta}}">
                    </div>
                    
                </div>
                <div class="row">
                    <!-- descripcion -->
                    <div class="form-group col-md-4">
                        <label>Descripcion</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripcion">{{$descripcion}}</textarea>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="exampleFormControlFile1">Ficha tecnica</label>
                        <textarea class="ckeditor form-control" name="ficha_tecnica" id="ficha_tecnica"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="exampleFormControlFile1">Accesorios</label>
                        <textarea class="ckeditor form-control" name="accesorios" id="accesorios"></textarea>
                    </div> 
                    
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('producto_index') }}" class="d-none btn btn-sm btn-danger">Cancelar</a>
                        <!-- <button type="submit" class="btn btn-danger">Cancelar</button> -->
                    </div>
                </div>
            </form>
        </div> 
        <!-- fin formulario -->
        <div class="col-md-2"></div>
    </div>
</form>
<!-- <script type = "text/javascript">  
              $(function () {  
                  $('#fecha').datetimepicker();  
              });  
</script>  -->
<script>
cargar_sucursal();
cargar_almacen();
function cargar_sucursal() {
    //console.log(document.getElementById('id_departamento').value);
    //como recupera imputs en js
    var param={id_departamento:document.getElementById('id_departamento').value};
    var url="{{route('cargar_sucursal')}}";
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
                $("#id_sucursal").empty().append('<option value="0">Elegir</option>');
                for (var i = 0; i < rcdata["lista_sucursal"].length; i++) {
                    var id=rcdata["lista_sucursal"][i].id_sucursal;
                    var nombre=rcdata["lista_sucursal"][i].nombre_sucursal;
                    $("#id_sucursal").append('<option value="'+id+'" onchange="cargar_almacen();">'+nombre+'</option>'); 
                }
            }
            });
}
function cargar_almacen(){
    var param={id_sucursal:document.getElementById('id_sucursal').value};
    var url="{{route('cargar_almacen')}}";
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
                console.log('almacenes',rcdata["lista_almacen"]);
                
                $("#id_almacen").empty().append('<option value="0">Elegir</option>');
                for (var i = 0; i < rcdata["lista_almacen"].length; i++) {

                    
                    var id=rcdata["lista_almacen"][i].id_almacen;
                    var nombre=rcdata["lista_almacen"][i].nombre_almacen;
                    $("#id_almacen").append('<option value="'+id+'">'+nombre+'</option>'); 
                }
                
            }
            });
}
</script> 
@stop