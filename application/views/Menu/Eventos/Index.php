<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css"
   integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
   crossorigin=""/>
   <style>
   #mapid { height: 300px; }
   </style>
   <div class="card mb-3">
   <div id="mapid"></div>
  <div class="card-body">
    <h4 class="card-title">Eventos del ciclismo</h4>
    <p class="card-text">Aqu&iacute; apareceran todos los eventos de <b>ciclimax</b>.</p>
    <p class="card-text"><small class="text-muted">Actualizado el <?php echo date("d/m/y h:i", strtotime($Eventos[count($Eventos)-1]->Publicado));?></small></p>
  </div>
</div>
<div id="modaleventos" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eventos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="card" style="width: 20rem;">
      <h5 style="padding-left:10px;" id="eventoslugar">Eventos</h5>
      <h5 style="padding-left:10px;" id="eventosfecha">Fecha</h5>
  <img class="card-img-top" width="80px" height="180px" id="imgeventos" src="https://images.unsplash.com/photo-1517303650219-83c8b1788c4c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=bd4c162d27ea317ff8c67255e955e3c8&auto=format&fit=crop&w=2691&q=80" alt="Card image cap">
  <div class="card-body">
    <p class="card-text" id="descripcioneventos">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
      </div>
    </div>
  </div>
</div>
	 <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js"
   integrity="sha512-tAGcCfR4Sc5ZP5ZoVz0quoZDYX5aCtEm/eu1KhSLj2c9eFrylXZknQYmxUssFaVJKvvc0dJQixhGjG2yXWiV9Q=="
   crossorigin=""></script>
   <script type="text/javascript">
   	var mymap = L.map('mapid').setView([18.479772,-69.942484], 13);
   	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiY3Jpc3RpYW4yMDA1IiwiYSI6ImNqa3J1cmFtazI5MWIzcHM3ZDJpemJ6cDMifQ.AdpoZ2g7dHQ1v29o25ltLQ'
}).addTo(mymap);
var eventos=JSON.parse('<?php print_r(json_encode($Eventos));?>');
var myIcon = L.icon({
    iconUrl: 'https://png.icons8.com/material/24/34495e/cycling-road.png',
    popupAnchor: [-3, -76],
    shadowSize: [68, 95],
    shadowAnchor: [22, 94]
});
for (let index = 0; index < eventos.length; index++) {
    var marker = L.marker([eventos[index].lat,eventos[index].long], {icon: myIcon}).addTo(mymap);
marker.on('click', onMapClick);
marker.bindTooltip("<b>"+eventos[index].nombre+"</b><br>"+eventos[index].descripcion).openTooltip();
}

function onMapClick(e) {
   var lat=e.target.getLatLng().toString();
   var log=e.target.getLatLng().toString();
   lat=lat.substring(lat.indexOf(',')+1).replace(')','');
   log=log.substring(log.indexOf('(')+1,log.indexOf(','));
    for (let index = 0; index < eventos.length; index++) {
        if(log==eventos[index].lat)
        {
            $('#modaleventos').modal('show');
            $('#modaleventos .modal-title').html(eventos[index].nombre);
            $('#modaleventos #eventoslugar').html("<b>Lugar: </b>"+eventos[index].lugar);
            $('#modaleventos #eventosfecha').html("<b>Fecha: </b>"+eventos[index].fecha);
            $('#modaleventos #imgeventos').attr('src','<?php echo base_url();?>'+eventos[index].imagen.substring(2));
            $('#descripcioneventos').html(eventos[index].descripcion);
        }
    }
    
}
   </script>