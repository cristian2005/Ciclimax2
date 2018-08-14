<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css"
   integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
   crossorigin=""/>
   <style>
   #mapid { height: 300px; }
   </style>
  <!-- CSS Files -->
  <link href="<?php echo base_url();?>assets/css/dropzone.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url();?>assets/demo/demo.css" rel="stylesheet" />
  <script
  src="https://code.jquery.com/jquery-2.2.0.js"
  integrity="sha256-oYqpLeqZe9cetUDV+TFiBZHp3uJ+X4F5eLs4W6uSTSE="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="<?php echo base_url();?>assets/css/material-kit.min.css" rel="stylesheet" />  

<form action="<?php echo base_url('Eventos/Agregar_Eventos');?>" method="post">
  <div class="row">
    <div class="col">
      <input type="text" id="lat" name="lat" class="form-control" readonly placeholder="Latitud">
    </div>
    <div class="col">
      <input type="text" id="long" name="long" class="form-control" readonly placeholder="Longitud">
    </div>
  </div>
  <div class="row">
  <div class="col">
  <br>
  <div id="mapid"></div>
  </div>
  </div>
  <br>
  <div class="row">
  <div class="col">
  <input type="text"  name="lugar" class="form-control"  placeholder="Lugar">
  </div>
  <div class="col">
  <select  name="tipo" class="form-control">
  <option disabled selected>Tipo</option>
        <option>Ruta</option>
        <option>Mtb</option>
        </select>
  </div>
  </div>
  <br>

    <div class="row">
  <div class="col">
  <input type="text"  name="nombre" class="form-control"  placeholder="Titulo">
  </div>
  <div class="col">
  <input type="text"  name="descripcion" class="form-control"  placeholder="Descripcion">
  </div>
  </div>
  <br>
  
  <!-- input with datetimepicker -->
<div class="form-group">
    <label class="label-control">Fecha del evento</label>
    <input type="text" class="form-control datetimepicker" value="10/05/2016"/>
</div>

</form>
   <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  

<script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js"
   integrity="sha512-tAGcCfR4Sc5ZP5ZoVz0quoZDYX5aCtEm/eu1KhSLj2c9eFrylXZknQYmxUssFaVJKvvc0dJQixhGjG2yXWiV9Q=="
   crossorigin=""></script>
   
   <script>
    

   //Creando el mapa
   var mymap = L.map('mapid').setView([18.479772,-69.942484], 13);
   	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox.streets',
    accessToken: 'pk.eyJ1IjoiY3Jpc3RpYW4yMDA1IiwiYSI6ImNqa3J1cmFtazI5MWIzcHM3ZDJpemJ6cDMifQ.AdpoZ2g7dHQ1v29o25ltLQ'
}).addTo(mymap);
//Agregando un icono predeterminado
var myIcon = L.icon({
    iconUrl: 'https://png.icons8.com/material/24/34495e/cycling-road.png',
    popupAnchor: [-3, -76],
    shadowSize: [68, 95],
    shadowAnchor: [22, 94]
});
//Creando el marcador
var marker = L.marker([18.479772,-69.942484], {icon: myIcon,draggable:true}).addTo(mymap);
marker.on('dragend', onMapMove);

function onMapMove(e)
{
  var lat=e.target.getLatLng().toString();
   var log=e.target.getLatLng().toString();
   lat=lat.substring(lat.indexOf(',')+1).replace(')','');
   log=log.substring(log.indexOf('(')+1,log.indexOf(','));
    $('#lat').val(log);
    $('#long').val(lat);
}

   </script>
