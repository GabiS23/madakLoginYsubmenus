<style>
/***

/* Tabs panel */
.tabbable-panel {
  border:1px solid #eee;
  padding: 10px;
}
/* Default mode */
.tabbable-line > .nav-tabs {
  border: none;
  margin: 0px;
}
.tabbable-line > .nav-tabs > li {
  margin-right: 2px;
}
.tabbable-line > .nav-tabs > li > a {
  border: 0;
  margin-right: 0;
  color: #737373;
}
.tabbable-line > .nav-tabs > li > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open, .tabbable-line > .nav-tabs > li:hover {
  border-bottom: 4px solid #fbcdcf;
}
.tabbable-line > .nav-tabs > li.open > a, .tabbable-line > .nav-tabs > li:hover > a {
  border: 0;
  background: none !important;
  color: #333333;
}
.tabbable-line > .nav-tabs > li.open > a > i, .tabbable-line > .nav-tabs > li:hover > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open .dropdown-menu, .tabbable-line > .nav-tabs > li:hover .dropdown-menu {
  margin-top: 0px;
}
.tabbable-line > .nav-tabs > li.active {
  border-bottom: 4px solid #f3565d;
  position: relative;
}
.tabbable-line > .nav-tabs > li.active > a {
  border: 0;
  color: #333333;
}
.tabbable-line > .nav-tabs > li.active > a > i {
  color: #404040;
}
.tabbable-line > .tab-content {
  margin-top: -3px;
  background-color: #fff;
  border: 0;
  border-top: 1px solid #eee;
  padding: 15px 0;
}
.portlet .tabbable-line > .tab-content {
  padding-bottom: 0;
}
/* Below tabs mode */
.tabbable-line.tabs-below > .nav-tabs > li {
  border-top: 4px solid transparent;
}
.tabbable-line.tabs-below > .nav-tabs > li > a {
  margin-top: 0;
}
.tabbable-line.tabs-below > .nav-tabs > li:hover {
  border-bottom: 0;
  border-top: 4px solid #fbcdcf;
}
.tabbable-line.tabs-below > .nav-tabs > li.active {
  margin-bottom: -2px;
  border-bottom: 0;
  border-top: 4px solid #f3565d;
}
.tabbable-line.tabs-below > .tab-content {
  margin-top: -10px;
  border-top: 0;
  border-bottom: 1px solid #eee;
  padding-bottom: 15px;
}
</style>
@extends('principal.visita.layout_visita')
@section('content')
<br>  
<div class="container">
    <div class="row">
      <div class="col-md-12">
          <div class="tabbable-panel">
            <div class="tabbable-line">
              <ul class="nav nav-tabs ">
                <li class="active">
                  <a href="#tab_default_1" data-toggle="tab">
                  Descripción </a>
                </li>
                <li>
                  <a href="#tab_default_2" data-toggle="tab">
                  Ficha técnica </a>
                </li>
                <li>
                  <a href="#tab_default_3" data-toggle="tab">
                  Accesorios </a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="tab_default_1">
                  <div class="row">
                    <div class="col-md-6">
                      <!-- slider inicio -->
                  <div id="myCarousel" class="carousel slide" data-ride="carousel"  style="height:500px; width:500px; object-fit:cover;" >
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      <li data-target="#myCarousel" data-slide-to="1"></li>
                      <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                      <?php $contador=0; ?>
                        @foreach($lista_imagen_producto as $ip)
                          <?php $contador++; ?>
                          <?php if($contador==1){ ?>
                            <div class="item active">
                              <!-- <div class="item"> -->
                              <img src="{{URL::asset('imagenes/productos/'.$ip->foto)}}" style="height:100%; width:100%; object-fit:cover;" alt="Yamaha">
                            </div>
                          <?php }else{ ?>
                            <!-- <div class="item active"> -->
                            <div class="item">
                              <img src="{{URL::asset('imagenes/productos/'.$ip->foto)}}" style="height:100%; width:100%; object-fit:cover;" alt="Yamaha">
                            </div>
                          <?php } ?>
                        @endforeach
                    </div>
                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                    </a>

                    
                  </div>
                  <!-- slider fin -->
                    </div>
                    <div class="col-md-6">
                     <h3>Descripcion</h3>
                      @foreach($lista_producto as $p)
                          <?php echo $p->descripcion; ?>
                      @endforeach
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="tab_default_2">
                                @foreach($lista_producto as $p)
                                    <?php echo $p->ficha_tecnica; ?>
                                @endforeach
                </div>
                <div class="tab-pane" id="tab_default_3">
                    <div class="row">
                      @foreach($lista_producto as $p)
                          <?php echo $p->accesorios; ?>
                      @endforeach
                    </div>
                </div>
              </div>
            </div>
          </div>
          <br>
          <a class="btn btn-danger text-uppercase" href="{{ url('producto_visita') }}"><i class="fa fa-reply"></i>&nbsp;&nbsp;Atras</a>
          <br>
         
        </div>
	</div>
</div>
<br>
<br>
<br>
<br><br>
@stop