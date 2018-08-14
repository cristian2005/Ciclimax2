<?php $map = directory_map('./assets/img/img_banners/'); $contador = 0; $contador2 = 0;?> 
<h2>Espacio publicitaria</h2>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

  <ol class="carousel-indicators">
    <?php foreach ($map as $value): ?>
      <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $contador2;?>"></li>
      <?php $contador2++;?>
    <?php endforeach ?>    
  </ol>

  <div class="carousel-inner">

<?php foreach ($map as $img): ?>
      <div class="carousel-item <?php echo ($contador == 0) ? "active" : "" ;?>">
         <img class="d-block w-100" src="<?php echo base_url('assets/img/img_banners/').$img;?>" alt="banner">
    </div>
    <?php $contador++;?>
<?php endforeach ?>

  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>

</div>
