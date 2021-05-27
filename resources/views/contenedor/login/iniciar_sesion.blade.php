@extends('principal.login.layout_login')

@section('content')
<div class="card-body">
    <form method="POST" action="{{ route('iniciar_sesion') }}">
    @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Usuario</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Usuario email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Recordarme</label>
        </div>
        <button type="submit" class="btn btn-primary" href="{{ url('inicioAdmin_index') }}">Primary</button>
        <a  class="btn" href="{{ url('inicio_index') }}">Volver</a>
    </form>
</div>
@stop