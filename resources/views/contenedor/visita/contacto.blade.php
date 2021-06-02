@extends('principal.visita.layout_visita')

@section('content')
<div id="mimapa"></div>
<script>
    var mymap = L.map('mimapa').setView([-17.3988084,-66.1543936], 19 );

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    maxZoom: 25,
    attribution: 'Datos del mapa de &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a>, ' + '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' + 'Imágenes © <a href="https://www.mapbox.com/">Mapbox</a>', 
    id: 'mapbox/streets-v11'
}).addTo(mymap);
var marker = L.marker([-17.3988084,-66.1543936]).addTo(mymap);
var marcador = L.icon({
        iconUrl:'images/marcador.png',
        iconSize: [60, 85]
});
</script>
@stop