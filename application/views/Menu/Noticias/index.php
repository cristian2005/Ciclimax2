
<?php
foreach ($Noticias as $value) {
?>
<div class="row">
<div class="col-md-6">
<div class="card mb-3">
  <img class="card-img-top"  height="230px" src="<?php echo base_url(str_replace("./","",$value->imagen));?>" alt="<?php echo $value->titulo?>">
  <div class="card-body">
    <h4 class="card-title"><?php echo $value->titulo?></h4>
    <p class="card-text"><?php echo $value->descripcion?></p>
    <p class="card-text"><small class="text-muted">Publicado por <b><?php echo $value->apodo;?></b> el <?php echo date("d/m/y h:i",strtotime($value->fecha))?></small></p>
  </div>
</div>
</div>
</div>
<?php }?>