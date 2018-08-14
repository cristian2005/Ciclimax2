
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Banners publicitarios</h4>
                
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-primary">                     
                      <tr><th>Estado</th>
                      <th>ID</th>
                      <th>Anunciante</th>
                      <th>Costo</th>
                      <th>Registro</th>
                      <th>Detalle</th>
                      <th>Acciones</th>                     
                    </tr></thead>
                    <tbody>
                      <?php foreach ($banners as $value): ?>
                     <tr>
                        <td>
                             <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="checkbox" value="" checked="">
                                  <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                </label>
                              </div>
                        </td>
                        <td><?php echo $value["idbanners"]; ?></td>
                        <td><?php echo $value["anunciante"]; ?></td>
                        <td><?php echo $value["costo"]; ?></td>
                        <td><?php echo $value["registro"]; ?></td>
                        <td><?php echo $value["detalle"]; ?></td>
                        <td>
                             <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Eliminar definitivo">
                                <i class="material-icons">close</i>
                              </button>
                        </td>
                     </tr>
                      <?php endforeach ?>                    
                    </tbody>
                  </table>
                  <a href="#" class="btn btn-primary btn-round pull-right" data-toggle="modal" data-target="#loginModal">Agregar banner<div class="ripple-container"></div></a>
                </div>
              </div>



<div class="modal fade" id="loginModal" tabindex="-1" role="">
    <div class="modal-dialog modal-login" role="document">
       
                <div class="modal-content">
                    <form class="form" method="POST" enctype="multipart/form-data">
                      <br>
                        <p class="description text-center">Agregar nuevo banner</p>
                        <div class="card-body">

                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                      
                                    <input type="text" name="anunciante" class="form-control" placeholder="Anunciante...">
                                </div>
                            </div>

                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                            
                                    <input type="numeric" name="costo" class="form-control" placeholder="Costo...">
                                </div>
                            </div>

                            <div class="form-group bmd-form-group">
                                <div class="input-group">
                                    <input type="text" name="detalle" placeholder="Detalles..." class="form-control">
                                </div>
                            </div>

                             
                                <div class="input-group">
                                    <input type="file" name="imagen" class="form-control">
                                </div>
                            
                        </div>
                         <div class="modal-footer justify-content-center">
                          <button class="btn btn-wd btn-lg btn-round btn-outline-success" type="submit">Guardar</button>
                        </div>
                    </form>
                </div>

         
    </div>
</div>
           

