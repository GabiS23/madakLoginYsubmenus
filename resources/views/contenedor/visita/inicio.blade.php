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
							<h3 class="title">Productos	disponibles</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Parlantes</a></li>
									<li><a data-toggle="tab" href="#tab1">Microfonos</a></li>
									<li><a data-toggle="tab" href="#tab1">Guitarras</a></li>
									<li><a data-toggle="tab" href="#tab1">Baterias</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="{{URL::asset('visita/img/product01.png')}}" alt="">
												<div class="product-label">
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Categoria</p>
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<!-- <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4> -->
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Ver detalle</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="{{URL::asset('visita/img/product02.png')}}" alt="">
												<div class="product-label">
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Categoria</p>
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<!-- <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4> -->
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Ver detalle</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="{{URL::asset('visita/img/product03.png')}}" alt="">
												<div class="product-label">
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Categoria</p>
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<!-- <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4> -->
												
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Ver detalle</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="{{URL::asset('visita/img/product04.png')}}" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">Categoria</p>
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<!-- <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4> -->
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Ver detalle</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="{{URL::asset('visita/img/product05.png')}}" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">Categoria</p>
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<!-- <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4> -->
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Ver detalle</button>
											</div>
										</div>
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
	<!-- /SECTION -->
@stop
