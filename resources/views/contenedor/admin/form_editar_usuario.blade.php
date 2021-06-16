@extends('principal.admin.layout_admin')
@section('content')
<br><br>
<form method="POST" id="nuevo_usuario" name="nuevo_usuario" action="{{ route('editar_usuario',$id_usuario) }}" enctype="multipart/form-data">

    {{ csrf_field() }}
    <input type="hidden" id="id_usuario" name="id_usuario" value="{{$id_usuario}}">
    <div class="row">
        <div class="col-md-2"></div>
        <!-- inicio formulario -->
            <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="row-fluid">     
                                    <div class="span6 pull-left"> 
                                        <h3>Editar usuario</h3> 
                                    </div> 
                                    <div class="span6 pull-right"> 
                                        <a class="btn btn-sm btn-danger btn-block" href="{{ url('usuarios_index') }}"><i class="fa fa-reply "></i>&nbsp;&nbsp;Atras</a>
                                    </div> 
                                </div>
                            </div>
                        </div>
                <?php for($i = 0; $i < count($lista_errores); $i++){ ?>
                    <div class="alert alert-danger" role="alert" >
                    <?php echo($lista_errores[$i]); ?>
                    </div>
                <?php } ?>
                <?php if($validacion_correcta==1){ ?>
                    <div class="alert alert-success" role="alert" >
                    Editado correctamente
                    </div>
                <?php } ?>
                <br>
            <form>
                <div class="row">
                    <!-- Usuario -->
                    <div class="form-group col-md-4">
                        <label>Usuario</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Usuario" value="{{$name}}"  >
                    </div>
                </div>
                <div class="row">
                    <!-- contraseña -->
                    <div class="form-group col-md-4">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="contraseña">
                    </div>
                </div>
                <div class="row">
                    <!-- contraseña -->
                    <div class="form-group col-md-4">
                        <label>Repetir contraseña</label>
                        <input type="password" class="form-control" id="password_repeat" name="password_repeat" placeholder="contraseña">
                    </div>
                </div>
                <div class="row">
                    <!-- email -->
                    <div class="form-group col-md-4">
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$email}}">
                    </div>
                </div>
                <div class="row">
                    <!-- rol -->
                    <div class="form-group col-md-4">
                        <label for="inputState">Rol</label>
                        <select id="id_rol" name="id_rol" class="form-control" >
                            <option value="0">Elegir</option>
                            @foreach($lista_rol as $s)
                                @if($id_rol == $s->id_rol)  
                                    <option value="{{$s->id_rol}}" selected>{{$s->nombre_rol}}</option>
                                @else
                                <option value="{{$s->id_rol}}">{{$s->nombre_rol}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>   
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="inputState">Sucursal</label>
                        <select id="id_sucursal" name="id_sucursal[]" class="js-example-basic-multiple" multiple="multiple"  style="width:100%;">
                            <option value="0">Elegir</option>
                            @foreach($lista_sucursal as $s) 
                                <?php  $bandera=0; ?>
                                <?php for($i = 0; $i < count($sucursales_seleccionados); $i++){ ?>
                                    <?php if($sucursales_seleccionados[$i]==$s->id_sucursal){ ?>
                                        <?php  $bandera=1; ?>
                                        <option value="{{$s->id_sucursal}}" selected>{{$s->nombre_sucursal}}</option>
                                    <?php } ?>
                                <?php } ?>
                                    <?php if($bandera==0){ ?>
                                        <option value="{{$s->id_sucursal}}">{{$s->nombre_sucursal}}</option>
                                    <?php } ?>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('usuarios_index') }}" class="d-none btn btn-sm btn-danger">Cancelar</a>
                        <!-- <button type="submit" class="btn btn-danger">Cancelar</button> -->
                    </div>
                </div>
            </form>
        </div> 
            </div>
        <!-- fin formulario -->
        <div class="col-md-2"></div>
    </div>
</form>
<script type="text/javascript">
$(".js-example-basic-multiple").select2();
</script>
@stop