<div class="row">
      <?php
      
      foreach ($anuncios["Anuncios"] as  $value) {
          if($value->Id_categoria==2){
      ?>
      <div class="col-md-6">
      
      <div class="card">
          <div class="card-header card-header-text card-header-primary">
            <div class="card-text">
              <h4 class="card-title"><?php echo $value->Titulo?></h4>
            </div>
          </div>
          <div class="card-body">
          
          <div class="row">
          <div class="col-md-4">
          <?php 
          $image="Imagen";
          foreach ($anuncios["Imagenes"] as  $value1) {
              if($value1->Id_anuncio==$value->idanuncios){
              $image= substr($value1->Url,strrpos($value1->Url,"/"));
          ?>
          <img src="<?php echo base_url('assets/img/img_anuncios'.$image);?>" height="100px" width="100px" alt="<?php echo $image;?>">
          </div>
          <?php break; }}?>
          <div class="col-md-8">
          <i class="material-icons">category</i> <span><?php echo $value->Nombre_subcategoria?></span>
          <i class="material-icons">person</i> <span><?php echo $value->Apodo?></span>
          <i class="material-icons">access_time</i> <span><?php echo date("h:i",strtotime($value->Fecha_emision));?></span>
          <i class="material-icons">attach_money</i> <span><?php echo $value->Precio?></span>
          </div>
          </div>
          <div class="row">
          <div class="col-md-12">
            <p><?php echo $value->Descripcion?></p>
          </div>
          </div>
          <a href="<?php echo base_url('Menu/Anuncios/VerAnuncio/'.$value->idanuncios);?>" class="btn btn-primary btn-sm pull-right">Ver</a>
          </div>
      </div>
  </div>
      <?php }}?>
      </div>
    </div>