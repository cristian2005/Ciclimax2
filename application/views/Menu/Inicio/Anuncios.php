<div class="row">
<div class="col-8">
<h2>Anuncios</h2>
</div>
<div class="col-4">
<div class="input-group">
    <input type="search" class="form-control" id="buscador" placeholder="Buscar anuncios">
    <div class="input-group-prepend">
      <span class="input-group-text" style="cursor:pointer;" onclick="BuscarAnuncios();">
          <i class="material-icons">search</i>
      </span>
    </div>
  </div>
  </div>
  </div>
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
    <?php
    $this->load->view('Menu/Inicio/Obtener_anuncios');
    ?>
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
<script>

function BuscarAnuncios()
{
    $('.bd-example-modal-sm').modal('show');
    setTimeout('Irajax_buscar()',3000);
}
function Irajax_buscar()
{
    $.ajax({
       url:"<?php echo base_url('Pagina_Principal/Index');?>",
       type:"get",
       data:{buscador:$('#buscador').val()},
       beforeSend:function()
       {
       $('#titulo').text('Espere un momento por favor...');
         lottie.setSpeed(5,$('#logoanimado'));
       },
       success:function(resp)
       {
        lottie.setSpeed(1,$('#logoanimado'));
        $('.bd-example-modal-sm').modal('hide');
        $('#dashboard-1').html(resp);
       }
   });
}
</script>