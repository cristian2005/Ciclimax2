<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="<?php echo base_url();?>" class="simple-text logo-normal">
          Ciclimax Board
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">

              <li class="nav-item <?php echo ($pagina_actual=='Noticias')?'active':'';?> ">
                <a class="nav-link" href="<?php echo base_url('admin/');?>">
                  <i class="material-icons">dashboard</i>
                  <p>Noticias</p>
                </a>
              </li>
              <li class="nav-item <?php echo ($pagina_actual=='Eventos')?'active':'';?> ">
                <a class="nav-link" href="<?php echo base_url('admin/eventos');?>">
                  <i class="material-icons">event</i>
                  <p>Eventos</p>
                </a>
              </li>
              <li class="nav-item <?php echo ($pagina_actual=='Banners')?'active':'';?> ">
                <a class="nav-link" href="<?php echo base_url('admin/banners');?>">
                  <i class="material-icons">attach_money</i>
                  <p>Banners</p>
                </a>
              </li>
              <li class="nav-item <?php echo ($pagina_actual=='Usuarios')?'active':'';?> ">
                <a class="nav-link" href="<?php echo base_url('admin/usuarios');?>">
                  <i class="material-icons">person</i>
                  <p>Usuarios</p>
                </a>
              </li>

        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#"><?php echo "Panel de ".$pagina_actual;?></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="<?php echo base_url();?>">
                  <i class="material-icons">swap_horiz</i>
                    Volver a pagina de inicio
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">