<h2>Anuncios</h2>
<ul class="nav nav-pills nav-pills-icons" role="tablist">
    <!--
        color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
    -->
    <li class="nav-item">
        <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
            <i class="material-icons">add_to_photos</i>
            Nuevos
        </a>
        
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#schedule-1" role="tab" data-toggle="tab">
            <i class="material-icons">star_half</i>
           Populares
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
            <i class="material-icons">device_unknown</i>
            Aleatorio
        </a>
    </li>
</ul>
<div class="tab-content tab-space">
    <div class="tab-pane active" id="dashboard-1">
    
      <div class="row">
      <?php
      
      foreach ($anuncios["Anuncios"] as  $value) {
          
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
          <a href="<?php echo base_url('Menu/Anuncios/VerAnuncio/2');?>" class="btn btn-primary btn-sm pull-right">Ver</a>
          </div>
      </div>
  </div>
      <?php }?>
      </div>
    </div>
    <div class="tab-pane" id="schedule-1">
      Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
      <br><br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
    </div>
    <div class="tab-pane" id="tasks-1">
        Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
        <br><br>Dynamically innovate resource-leveling customer service for state of the art customer service.
    </div>
</div>