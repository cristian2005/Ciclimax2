
<div class="progress">

</div>
<h4>Publicar anuncio</h4>
<div class="row">
	<div class="col-md-6">
		<div style="background-color: #fff3cd;
    border-color: #ffeeba;" class="alert alert-warning alert-dismissible fade show" role="alert">
 <span style="color: #856404;"> Cada anuncio tendrá una vigencia de</span> <strong style="color:#856404;">45 días.</strong>
  <button style="color:#856404;" type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span  aria-hidden="true">&times;</span>
  </button>
</div>
	</div>
</div>
<!--Categoria-->
<div class="contener-anuncio" id="contener-categoria">
<div class="form-group">
    <label for="exampleFormControlSelect1">Categor&iacute;as</label>
    <select class="form-control selectpicker" data-style="btn btn-link" id="selectcategoria">
      <option selected disabled value="0">Seleccione una categor&iacute;a</option>
      <option value="1">Bicicletas</option>
      <option value="2">Accesorios</option>
    </select>
  </div>
  <div class="form-group">
    <label for="selectsubcategoria">Sub-categor&iacute;a</label>
    <select class="form-control selectpicker" data-style="btn btn-link" id="selectsubcategoria">
    	 <option selected disabled value="0">Seleccione una sub-categor&iacute;a</option>
    </select>
  </div>
</div>
<!--Categoria-->


<!--detalles-->
<div class="contener-anuncio" style="display:none;" id="contener-detalle">
<?php $this->load->view('Menu/PublicarAnuncio/Bicicletas');?>
<?php $this->load->view('Menu/PublicarAnuncio/Accesorios');?>
<div class="row">
<div class="col-12">
<form action="<?php echo base_url('Pagina_Principal/upload_imagen');?>" id="myDrop" class="dropzone">
<input type="file" name="file" >
</form>
</div>
</div>
</div>
<!--detalless-->

<button type="button" id="siguiente" class="btn btn-primary pull-right" onclick="Siguiente();">Siguiente</button>

<script>
$(document).ready(function(){
 Dropzone.options.myDrop={
  uploadMultiple:true,
  maxFileSize:2,
  acceptedFiles:'image/*',
  init:function init()
  {
    this.on('error',function(){
      alert('error al subir el archivo')
    });
  }
}
$('#selectcategoria').change(function(){
  $.ajax({
    url:"<?php echo base_url('Pagina_Principal/Publicar_Anuncio');?>",
    type:"get",
    data:{categoria:this.value},
    dataType:'json',
    beforeSend:function()
    {
      $('.bd-example-modal-sm').modal('show');
      $('#titulo').text('Cargando..');
      lottie.setSpeed(3,$('#logoanimado'));
    },
    success:function(resp)
    {
      $('.bd-example-modal-sm').modal('hide');
      for (let index = 0; index < resp.length; index++) {
        $("#selectsubcategoria").append("<option value="+resp[index].idsubcategorias+">"+resp[index].Nombre_subcategoria+"</option>");
      }
    },
    error:function()
         {
           alert("ocurrio un error inesperado");
           $('.bd-example-modal-sm').modal('hide');
         }
  });
});
});
var valor=0;
var categoria=0;
function Siguiente()
 {
   switch (valor) {
     case 0:
       $('.contener-anuncio').css('display','none');
       $('#contener-detalle').css('display','block');
       $('.progress').append('<div class="progress-bar  bg-info" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>');
       valor=1;
       $('#siguiente').text('Finalizar');
       categoria=$('#contener-categoria #selectcategoria').val();
       if(categoria==1)
       {
       $('#accesorios').css('display','none');
       }
       else if(categoria==2)
       $('#bicicleta').css('display','none');
       break;
       case 1:
       var r=confirm("¿Estás seguro que desea publicar este anuncio?");
       if(r)
       {
       $('.progress').append('<div class="progress-bar  bg-success" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>');
       $('.contener-anuncio').css('display','none');
       $('#contener-vista').css('display','block');
       $('.bd-example-modal-sm').modal('show');
       $('#siguiente').text('Publicando..');
       setTimeout('Publicar_Anuncio()',3000);
       }
       break;
     default:
       break;
   }
 }
 function Publicar_Anuncio()
 {
   var form=(categoria==1)?"bici":"accesorios";
   var sub=$('#selectsubcategoria').val();
  $.ajax({
         url:"<?php echo base_url('Pagina_Principal/Publicar_Anuncio');?>",
         type:'post',
         data:$('#'+form).serialize()+"&Id_categoria="+categoria+"&Id_subcategoria="+sub,
         beforeSend:function()
         {
          $('#titulo').text('Espere un momento por favor..');
          lottie.setSpeed(5,$('#logoanimado'));
         },
         success:function(resp)
         {
          setTimeout('terminaranimacion()',3000);
         },
         error:function()
         {
           alert("ocurrio un error al publicar el anuncio");
           $('.bd-example-modal-sm').modal('hide');
         }
       });
 }
 function terminaranimacion()
 {
  lottie.setSpeed(1,$('#logoanimado'));
  $('#titulo').text('Publicado con exito!');
 $('#logoanimado').css('display','none');
 CrearLottie($('#check'),'<?php echo base_url();?>assets/json/checked_done.json');
 setTimeout("$('.bd-example-modal-sm').modal('hide'); window.location='<?php echo base_url('')?>';",1000)
 }
</script>