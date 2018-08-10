<div id="accesorio">
<form id="accesorios" action="<?php echo base_url('Pagina_Principal/Publicar_Anuncio');?>" method="post"><div class="row">
<div class="col-4">
<div class="form-group">
<label for="txttelefono">Telefono</label>
<input type="text" name="telefono" class="form-control" id="txttelefono" placeholder="809-000-0000">
</div></div><div class="col-4"><div class="form-group">
<label for="txtmodelo">Modelo</label>
<input type="text" name="modelo" class="form-control" id="txtmodelo" ></div>
</div>
<div class="col-4"><div class="form-group">
<label for="txtmarca">Marca</label><input name="marca" type="text" class="form-control" id="txtmarca" >
</div></div></div><div class="row">
<div class="col-6"><div class="form-group"><label for="txtaccesorio">Accesorio</label>
<input type="text" name="accesorio" class="form-control" id="txtaccesorio" >
</div></div><div class="col-6"><div class="form-group"><label for="txtprecio">Precio</label>
<input type="number"name="precio" class="form-control" id="txtprecio"></div></div></div>
<div class="row"><div class="col-4"><div class="form-group">
<label for="txttiulo">Titulo del anuncio</label>
<input type="text" class="form-control" name="titulo" id="txttitulo"></div></div>
<div class="col-8"><div class="form-group">
<label for="txtdescripcion">Descripcion</label><textarea name="descripcion" class="form-control" id="txtdescripcion" rows="3"></textarea></div></div></div>
</form>
</div>