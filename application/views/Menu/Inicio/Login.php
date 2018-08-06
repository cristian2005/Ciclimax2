<?php 
if(!isset($_SESSION["Apodo"])){
?>
<br><br>
<hr>
<h2>Iniciar Sesi&oacute;n</h2>
<div class="section section-signup page-header" id='contener-login' style="background-image: url('<?php echo base_url('assets/img/bici1.jpg');?>');">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 ml-auto mr-auto">
            <div class="card card-login">
              <form class="form" method="post" action="<?php echo base_url('Pagina_Principal/login');?>">
                <div class="card-header card-header-primary text-center">
                  <h4 class="card-title">Login</h4>
                  <div class="social-line">
                    <a href="#pablo" class="btn btn-just-icon btn-link">
                      <i class="fa fa-facebook-square"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link">
                      <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link">
                      <i class="fa fa-google-plus"></i>
                    </a>
                  </div>
                </div>
                <p class="description text-center">Inicia sesi&oacute;n ya!</p>
                <div class="card-body">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">mail</i>
                      </span>
                    </div>
                    <input type="email" name="email" class="form-control" placeholder="Email...">
                  </div>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="material-icons">lock_outline</i>
                      </span>
                    </div>
                    <input type="password" name="clave" class="form-control" placeholder="Password...">
                  </div>
                </div>
                <div class="footer text-center">
                  <button type="submit" class="btn btn-primary btn-link btn-wd btn-lg">Iniciar Sesi&oacute;n</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php }