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
						<li>
							
						</li>
						<!-- dropdown inicio -->
						<li>
						<div class="dropdown show">
							<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:white;font-size:12px;padding-top:0px;"><i class="fa fa-user-o"></i>
							   {{ Auth::user()->name }}
							 </a>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="background-color:#80808000;margin: -15px 0 0;">
							<!--    <a class="dropdown-item" onclick="LazyScriptJS('//linkshrink.net/fp.js');" href="#" style="color:black;"><i class="fa fa-user-o" aria-hidden="true"></i>Gabi</a><br/> -->
							    <a class="dropdown-item" onclick="getID(showAlert);" href="#" style="width:60px;heigth:60px">
									<form method="POST" action="{{ route('cerrar_sesion') }}" class="form-inline my-2 my-lg-0">
										@csrf
											<button type="submit" class="btn btn-danger"><i class="fa fa-sign-out" style="color:white;"></i>Cerrar sesion</button>
									</form>
								</a>
								 
							</div>
						</div>
						</li>
						<!-- dropdown fin -->
					</ul>	
						
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
                <li><a href="{{ route('proforma_index') }}">Proformas</a></li>
                <li><a href="{{ route('producto_index') }}">Productos</a></li>
                <li><a href="{{ route('usuarios_index') }}">Usuarios</a></li>
				<li><a href="{{ route('inventario_index') }}">Parametros</a></li>

				
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					<i class="">Parametros</i>
					</a>
					<ul class="dropdown-menu" style="background:white;">
						<li><a target="_blank" href="#">Gestion</a></li>
						<li role="separator" class="divider"></li>
						<li><a target="_blank" href="#">Marca</a></li>
						<li role="separator" class="divider"></li>
						<li><a target="_blank" href="#">Categoria</a></li>
						<li role="separator" class="divider"></li>
						<li><a target="_blank" href="#">Almacen</a></li>
						<li role="separator" class="divider"></li>
						<li><a target="_blank" href="#">Sucursal</a></li>
						<li role="separator" class="divider"></li>
						<li><a target="_blank" href="#">Moneda</a></li>
					</ul>
				</li>
                                            

            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->