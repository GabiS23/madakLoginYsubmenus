<!-- HEADER -->
<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +591-76505765</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> juanFernandez@gmail.com</a></li>
						<li><a href="https://www.google.com/maps/place/Madak+Music/@-17.3988137,-66.1566071,17z/data=!3m1!4b1!4m5!3m4!1s0x93e373a234f3bb6d:0xd246bdc0a61746b6!8m2!3d-17.3988084!4d-66.1543936" target="_blank"><i class="fa fa-map-marker"></i> Calle 25 de mayo N° 780</a></li>
					</ul>
					<ul class="header-links pull-right">
						<!-- <li><a href="{{route('login')}}"><i class="fa fa-user-o"></i> Iniciar sesion</a></li> -->
						<form method="POST" action="{{ route('cerrar_sesion') }}" class="form-inline my-2 my-lg-0">
    @csrf
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
		    @if (Auth::guest())
				
			@else
				{{ Auth::user()->name }}
			@endif
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
           <button type="submit" class="btn btn-primary">cerrar sesion</button>
          </div>
      </li>
    </form>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img style="with:80px !important; height:80px;" src="{{URL::asset('visita/img/logoEmpresa.jpg')}}" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">Categorias</option>
										<option value="1">Category 01</option>
										<option value="1">Category 02</option>
									</select>
									<input class="input" placeholder="Buscar productos">
									<button class="search-btn">Buscar</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-envelope"></i>
										<span>Ver mensajes</span>
										<!-- <div class="qty">3</div> -->
									</a>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="{{ route('inicioAdmin_index') }}">Inicio</a></li>
                <li><a href="{{ route('inventario_index') }}">Inventario</a></li>
                <li><a href="{{ route('proforma_index') }}">Proformas</a></li>
                <li><a href="{{ route('producto_index') }}">Productos</a></li>
                <li><a href="{{ route('usuarios_index') }}">Usuarios</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->