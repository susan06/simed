<!DOCTYPE html>
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?Php echo $page_title; ?> | <?Php echo $system_title; ?></title>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?=base_url()?>assets/bootstrap/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?=base_url()?>assets/bootstrap/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_url()?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url()?>assets/css/header.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?=base_url()?>assets/dist/css/skins/skin-green-light.min.css" rel="stylesheet" type="text/css" />

	<!-- <link rel="icon" type="image/ico" href="assets/dist/img/favicon.ico">-->
	
	<link href="<?=base_url()?>favicon.ico" rel="shortcut icon" type="image/ico" /> 
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body class="skin-green-light">

  <header>
    <nav class="frame" role="navigation">
        <div class="container-fluid">
            <a href="#" class="brand">
                <img src="<?=base_url()?>assets/dist/img/logo_cmd.fw.png" class="logo" alt="logo"/>
                <small class="text-muted hidden-xs">CENTRO MÉDICO DOCENTE LAS COCUIZAS, C.A.</small>
            </a>
            <div class="buttons pull-right">
              
            </div>
        </div><!-- /.container -->
    </nav><!--/.navbar-->
</header>

<div class="lockscreen">

    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
      <div class="lockscreen-logo">
        <a href="<?=base_url()?>">si<b>MED</b></a>
      </div>
      <!-- User name -->
      <div class="lockscreen-name"><?= $this->session->flashdata('nick'); ?></div>
	  
      <!-- START LOCK SCREEN ITEM -->
      <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
                <?php if($this->session->flashdata('rol') == 1 ){ ?>
                  <img src="<?=base_url()?>assets/dist/img/admin.jpg" alt="User Image"/>
				<?php } ?>  
				<?php if($this->session->flashdata('rol') == 2 && $this->session->flashdata('sexo') == "F"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/enfermera.jpg" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->flashdata('rol') == 2 && $this->session->flashdata('sexo') == "M"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/enfermero.jpg" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->flashdata('rol') == 3 && $this->session->flashdata('sexo') == "F"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/doctora.jpg"  alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->flashdata('rol') == 3 && $this->session->flashdata('sexo') == "M"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/doctor.jpg" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->flashdata('rol') == 4 && $this->session->flashdata('sexo') == "F"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/terapista.jpg" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->flashdata('rol') == 4 && $this->session->flashdata('sexo') == "M"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/terapeuta.jpg"  alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->flashdata('rol') == 5 ){ ?>
                  <img src="<?=base_url()?>assets/dist/img/secretaria.jpg" alt="User Image"/>
				<?php } ?> 
        </div>
        <!-- /.lockscreen-image -->

        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials" action="<?=base_url()?>login/process" method="POST" id="form_login" novalidate>
			<input type="hidden" name="token" value="<?php echo $token; ?>">
			<input type="hidden" name="nick" value="<?= $this->session->flashdata('nick'); ?>">
			<input type="hidden" name="url_actual" value="<?= $this->session->flashdata('url_actual'); ?>">
				  <div class="input-group">
					<input type="password" class="form-control" placeholder="contraseña" name="clave">
					<div class="input-group-btn">
					  <button class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
					</div>
				  </div>
        </form><!-- /.lockscreen credentials -->

      </div><!-- /.lockscreen-item -->
      <div class="help-block text-center">
        Introduzca su clave para retomar su sesión
      </div>
      <div class='text-center'>
        <a href="<?=base_url()?>login">Entrar con una cuenta diferente</a>
      </div>
      <div class='lockscreen-footer text-center'>
        Copyright &copy; 2014-2015 <b>siMED</b><br>
      </div>
    </div><!-- /.center -->
	
 </div>
 
    <!-- jQuery -->
    <script src="<?=base_url()?>assets/plugins/jQuery/jquery-1.11.3.min.js"></script>	 
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	
  </body>
  
</html>