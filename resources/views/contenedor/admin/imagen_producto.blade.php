@extends('principal.admin.layout_admin')
@section('content')
<br>
<div class="container">
    <div class="row">
        <form method="POST" id="form2" name="form2" action="{{ route('nuevo_imagen_producto') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
            <!-- imagen -->
            <div class="form-group col-md-4">
                <div class="form-group">
                    <label for="exampleFormControlFile1">Imagen de producto</label>
                    <input type="file" class="form-control-file" id="foto" name="foto">
                </div>
            </div>
            <!-- tipo de moneda -->
            <div class="form-group col-md-4">
                <label for="inputState">Mostrar en catalogo</label>
                <select id="mostrar_catalogo" name="mostrar_catalogo" class="form-control">
                    <option value="no">No</option>
                    <option value="si">Si</option>
                </select>
            </div>
            <input hidden="hide" type="text" class="form-control-file" id="id_producto" name="id_producto" value="{{$id_producto}}">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
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
                        <img src="{{URL::asset('imagenes/productos/'.$i->foto)}}" width="50px" height="50px">
                        </td>
                        <td>
                            <!-- Button -->
                            <ul>    
                                <li>
                                    <a href="{{ route('form_editar') }}" class="btn btn-sm btn-primary shadow-sm fa fa-edit" aria-hidden="true"></a>
                                    <a href="#" class="btn btn-sm btn-danger shadow-sm fa fa-trash-o" aria-hidden="true" onclick="eliminar_producto({{$i->id_producto}})"></a>
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
@stop