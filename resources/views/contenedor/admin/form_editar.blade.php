  <!--Import jQuery before export.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!--Data Table-->
<script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"  src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<!--Export table buttons-->
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js" ></script>
<script type="text/javascript"  src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
<!--Export table button CSS-->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
@extends('principal.admin.layout_admin')
@section('content')
<br><br>
<form method="POST" id="editar_producto" name="editar_producto" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">
        <div class="col-md-2"></div>
        <!-- inicio formulario -->
        <div class="col-sm-8" >
        <h2>Editar producto</h2>
            <form>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Codigo</label>
                        <input type="text" class="form-control" id="codigo" placeholder="Codigo de producto">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Cantidad</label>
                        <input type="numb" class="form-control" id="cantidad" placeholder="Cantidad">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nombre de producto</label>
                        <input type="numb" class="form-control" id="cantidad" placeholder="Modelo">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Marca</label>
                        <select id="inputState" class="form-control">
                            <option selected>Elegir</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Detalle</label>
                        <input type="numb" class="form-control" id="cantidad" placeholder="Detalle">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Categoria</label>
                        <select id="inputState" class="form-control">
                            <option selected>Elegir</option>
                            <option>...</option>
                        </select>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">Departamento</label>
                        <select id="inputState" class="form-control">
                            <option selected>Elegir</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputState">Sucursal</label>
                        <select id="inputState" class="form-control">
                            <option selected>Elegir</option>
                            <option>...</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Imagen de producto</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                </div>
                
               
            </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="submit" class="btn btn-danger">Cancelar</button>
                </div>
            </form>
        </div>
        <!-- fin formulario -->
        <div class="col-md-2"></div>
    </div>
</form>
<script src="{{URL::asset('visita/js/jquery.min.js')}}"></script>

@stop