<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('inicioAdmin_index') }}">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('inventario_index') }}">Inventario</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('proforma_index') }}">Proforma</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('config_index') }}">Producto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('usuarios_index') }}">Usuarios</a>
      </li>
    </ul>
    
    <form method="POST" action="{{ route('cerrar_sesion') }}" class="form-inline my-2 my-lg-0">
    @csrf
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
           <button type="submit" class="btn btn-primary">cerrar sesion</button>
          </div>
      </li>
    </form>
  </div>
</nav>