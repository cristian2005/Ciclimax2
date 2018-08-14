<link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
<ul class="nav nav-pills nav-pills-rose">
  <li class="nav-item"><a class="nav-link active" href="#pill1" data-toggle="tab">Anuncio</a></li>
  <li class="nav-item"><a class="nav-link" href="#pill2" data-toggle="tab">Anunciante</a></li>
</ul>
<div class="tab-content tab-space">
    <div class="tab-pane active" id="pill1">
    <div class="container">
<div class="container gallery-container">
  <div class="box-group">
  <h3 class=""><?php echo $anuncios->Titulo;?></h3><button style="position:abosulte; top:-40px;" class="btn pull-right btn-info btn-sm">$ <?php echo $anuncios->Precio;?></button>
  </div>
    <div class="tz-gallery">
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="card">
                <?php 
                foreach ($imagenes as  $value) {
                    if($value->Id_anuncio==$anuncios->idanuncios)
                    {
              $image= substr($value->Url,strrpos($value->Url,"/"));
                ?>
                    <a class="lightbox" href="<?php echo base_url('assets/img/img_anuncios'.$image);?>">
                    <img height="200"  src="<?php echo base_url('assets/img/img_anuncios'.$image);?>" alt="Park" class="card-img-top">
                    </a>
                    <div class="row">
                    <?php break;}}?>
                    <?php
                    $mostrar_primera=true;
                    for ($i=0; $i <count($imagenes) ; $i++) { 
                        if($imagenes[$i]->Id_anuncio==$anuncios->idanuncios)
                        {
                       $image= substr($imagenes[$i]->Url,strrpos($imagenes[$i]->Url,"/"));
                       if(!$mostrar_primera){
                    ?>
                    
                    <div class="col-4">
                    <a class="lightbox" href="<?php echo base_url('assets/img/img_anuncios'.$image);?>">
                    <img src="<?php echo base_url('assets/img/img_anuncios'.$image);?>" alt="Park" class="card-img-top">
                    </a>
                    </div>
                        <?php }$mostrar_primera=false;}}?>
                    </div>
                </div>
            </div>
            <div class="col-8">
            <div style="padding:20px;" class="card">
            <span> <strong>Tel/cel.: </strong><?php echo $anuncios->Telefono;?></span>
            <span> <strong>Marca: </strong><?php echo $anuncios->Marca;?></span>
            <span> <strong>Modelo: </strong><?php echo $anuncios->Modelo;?></span>
            <span> <strong>Precio: </strong><?php echo $anuncios->Precio;?></span>
            <span> <strong>Accesorios: </strong><?php echo $anuncios->Accesorio;?></span>
            <span> <strong>Tama&ntilde;o de aro: </strong><?php echo $anuncios->aro;?></span>
            <span> <strong>Tipo: </strong><?php echo $anuncios->Tipo;?></span>
            <span><strong>Fecha emisi&oacute;n: </strong><?php echo $anuncios->Fecha_emision;?></span>
            <span><strong>Fecha de vencimiento: </strong><?php echo $anuncios->Fecha_vencimiento;?></span>
            </div>
            </div>
            </div>
            <div class="row">
               <strong>Descripci&oacute;n </strong>
               <span> <?php echo $anuncios->Descripcion;?> </span>
            </div>
        </div>
    </div>
  
</div>
 
</div>
    <div class="tab-pane" id="pill2">
    <div class="info">
	<div class="icon icon-primary">
		<i class="material-icons">person</i>
	</div>
	<h4 class="info-title"><?php echo $anuncios->Apodo;?></h4>
	<p><?php echo $anuncios->Apodo;?> se hizo miembro a ciclimax el <?php echo date("d/m/Y",strtotime($anuncios->Fecha_registro))?></p>
</div>
    </div>
   
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>