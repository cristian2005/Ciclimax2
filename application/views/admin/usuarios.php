<div class="row">
<div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Tabla de usuarios</h4>
                  <p class="card-category"> Cambie los privilegios de los usuarios</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <tr><th>ID</th><th>Apodo</th><th>Clave</th><th>Correo</th><th>Privilegio</th><th>Registro</th></tr>
                      </thead>
                      <tbody>

                        <?php foreach ($usuarios as $key): ?>
                           <tr>
                          <td>
                           <?php echo $key["idusuarios"]; ?> 
                          </td>
                          <td>
                            <?php echo $key["Apodo"]; ?> 
                          </td>
                          <td>
                            <?php echo $key["Clave"]; ?> 
                          </td>
                          <td>
                            <?php echo $key["Correo"]; ?> 
                          </td>
                          <td>
                            <?php echo $key["Tipo_usuarios"]; ?> <a href="<?php echo base_url('Admin/usuarios/').$key["idusuarios"];?>"><i class="material-icons">swap_vert</i></a> 
                          </td>
                           <td>
                            <?php echo $key["Fecha_registro"]; ?> 
                          </td>
                        </tr>             
                        <?php endforeach ?>
                                                       
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            </div>
          