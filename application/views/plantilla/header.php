<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/img/apple-icon.png">
  <!--     Icono de la pagina    -->
  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/bike.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Ciclimax
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url();?>assets/css/material-kit.css?v=2.0.4" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/css/dropzone.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url();?>assets/demo/demo.css" rel="stylesheet" />

    <script src="<?php echo base_url();?>assets/js/core/jquery.min.js" type="text/javascript"></script>

</head>

<body class="index-page sidebar-collapse">
  <nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
    <div class="container">
    <div class="navbar-translate">
        <a class="navbar-brand"  href="<?php echo base_url();?>" style="width:40px; ">
       <span style="position:relative; top:-10px;">Ciclimax</span>
       <span style="position:relative; left:10px;" class="logoanimate"></span>
       
         </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              Categor&iacute;a
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="<?php echo base_url('Menu/Categoria/Bicicleta');?>" class="dropdown-item">
                <i class="material-icons">motorcycle</i> Bicicletas(<?php echo(isset($Num_categoria_anuncios[0]->Num_categorias))? $Num_categoria_anuncios[0]->Num_categorias:0?>)
              </a>
              <a href="<?php echo base_url('Menu/Categoria/Accesorios');?>" class="dropdown-item">
                <i class="material-icons">build</i>Accesorios(<?php echo(isset($Num_categoria_anuncios[1]->Num_categorias))? $Num_categoria_anuncios[1]->Num_categorias:0?>)
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="" rel="tooltip" title="" data-placement="bottom" href="" target="_blank" data-original-title="Acerca nosotros" >
              <span>Nosotros</span>
              <span style="position:relative;"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" href="<?php echo base_url('Menu/Noticias');?>" title="" data-placement="bottom" href=""  data-original-title="Ver las noticias">
              Noticias
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" title="" data-placement="bottom" href="<?php echo base_url('Menu/Eventos');?>" data-original-title="Crear un nuevo evento">
              Eventos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  rel="tooltip" title="" onclick="scrollToIniciarSesion();" data-placement="bottom" href="" data-toggle="modal" data-target="#myModal" data-original-title="Inicia sesi&oacute;n para publicar tu anuncio">
              <span>Login</span>
              <span id="login" style="position:relative;"></span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" rel="tooltip" id='aregistro' title="" data-placement="bottom" style="cursor:pointer;"  data-original-title="¿A&uacute;n no te has registrado?">
              Registro
            </a>
          </li>
          <li class="dropdown nav-item">
            <a href="#" class="<?php echo (isset($_SESSION["Tipo_usuarios"]))? 'dropdown-toggle ':""; ?>nav-link" data-toggle="dropdown">
            <?php
            echo (isset($_SESSION["Tipo_usuarios"]))?$_SESSION["Apodo"]:"Visitante";
            ?>
            </a>
            <?php if(isset($_SESSION["Apodo"])){?>
            <div class="dropdown-menu dropdown-with-icons">

             <?php if ($_SESSION["Tipo_usuarios"]=="admin"): ?>
              <a href="<?php echo base_url('Admin');?>" class="dropdown-item">
                <i class="material-icons">settings</i> Dashboard
              </a>
             <?php endif ?>

              <a href="<?php echo base_url('Pagina_Principal/Cerrar_Sesion');?>" class="dropdown-item">
                <i class="material-icons">lock</i> Cerrar sesi&oacute;n
              </a>
            </div>
            <?php }?>
          </li>
          <li class="nav-item">
          <button rel="tooltip" title="" data-placement="bottom" href="" target="_blank" data-original-title="Publicar un anuncio" onclick="SubirAnuncios();" class="btn btn-primary btn-fab btn-fab-mini btn-round">
  <i class="material-icons">cloud_upload</i>
</button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="page-header header-filter clear-filter purple-filter " data-parallax="true"  style="background-image: url('<?php echo base_url('assets/img/bici2.jpg');?>');">
  <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h1>Ciclimax</h1>
            <h3>D&oacute;nde puedes p&uacute;blicar anuncios del ciclismo y m&aacute;s...</h3>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="main main-raised">
    <div class="section section-basic">
      <div class="container">
      
     