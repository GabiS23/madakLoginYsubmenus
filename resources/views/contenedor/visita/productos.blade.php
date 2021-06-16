@extends('principal.visita.layout_visita')
@section('content')
 <!-- SECTION -->
 <div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Productos disponibles</h3>
							<div class="section-nav">
							DISTRIBUIDOR OFICIAL DE DAS AUDIO Y YAMAHA AUDIO PRO
								<!-- <ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab1">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab1">Accessories</a></li>
								</ul> -->
							</div>
						</div>
					</div>
					<!-- /section title -->
				</div>

				<div class="row">
					@foreach($lista_producto as $p)
					<div class="col-md-3">
						<div class="product">
							<div class="product-img">
								<img src="{{URL::asset('imagenes/productos/'.($p->foto!='' ?$p->foto:'default_producto.jpg'))}}" style="height:250px; width:262px;object-fit:cover;" alt="">
								<div class="product-label">
									<!-- <span class="sale">-30%</span> -->
									<span class="new">Nuevo</span>
								</div>
							</div>
							<div class="product-body">
								<p class="product-category">{{$p->nombre_categoria}}</p>
								<h3 class="product-name"><a href="#">{{$p->nombre_producto}}</a></h3>
								<h4 class="product-price">{{$p->precio_venta.' '.$p->codigo_moneda}}</h4>
							</div>
							<div class="add-to-cart">
								
								<!-- <button class="add-to-cart-btn"><i class="fa fa-eye"></i>Ver detalles</button> -->
								<a class="add-to-cart-btn btn" href="{{route('producto_detalle',$p->id_producto)}}" ><i class="fa fa-eye" style="text-align:center;padding:0;"></i>ficha tecnica</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
	<!-- /SECTION -->
@stop