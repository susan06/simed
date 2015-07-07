<!DOCTYPE html>
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?Php echo $page_title; ?> | <?Php echo $system_title; ?></title>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_url()?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=base_url()?>assets/css/header.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?=base_url()?>assets/dist/css/skins/skin-green-light.min.css" rel="stylesheet" type="text/css" />

	<link rel="icon" type="image/ico" href="<?=base_url()?>assets/dist/img/centro_medico.ico">

    <style>
	
		.colum_izq {
			width:12%;
			height:100%;
			text-align:center;
			float:left;
			position: relative;
		}
		.colum_central {
			width: 74%;
			height: 100%;
			padding-top: 1%;
			padding-left: 1%;
			padding-right: 1%;
			line-height: 1.5;
			text-align:center;
			float:left;
		}
		.colum_der {
			width: 12%;
			height: 100%;
			float: right;
			text-align:center;
			position:relative;
		}
		.footer{
			clear:both;
		}	
		#img1, #img2, #img3, #img4, #img5, #img6 {
		height:22%;
		width:98%;
		margin-bottom:20%;
		}

    </style>
	
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-green-light sidebar-mini">

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

      <!-- Content Wrapper. Contains page content -->
      <div class="content">
	  
	   <section class="colum_izq">
        <img id="img1" src="<?= base_url()?>assets/dist/img/login/serv_medico1.fw.png" alt="Atenci&oacute;n M&eacute;dica">
        <img id="img2" src="<?= base_url()?>assets/dist/img/login/serv_medico2.fw.png" alt="Hematologia">
        <img id="img3" src="<?= base_url()?>assets/dist/img/login/serv_medico3.fw.png" alt="Reflexologia">
      </section>
        <!-- Main content -->
        <section class="colum_central">
		
				<?php if($this->session->flashdata('warning') != ''): ?>
					  <div class="alert alert-warning alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Advertencia!</h4>
							<?php echo $this->session->flashdata('warning'); ?>
					  </div>
				<?php endif;?>
				
				<?php if($this->session->flashdata('error') != ''): ?>
					  <div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-ban"></i> Error!</h4>
							<?php echo $this->session->flashdata('error'); ?>
					  </div>
				<?php endif;?>
				
				<?php if($this->session->flashdata('info') != ''): ?>
					  <div class="alert alert-info alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-info"></i> Información!</h4>
							<?php echo $this->session->flashdata('info'); ?>
					  </div>
				<?php endif;?>
				
					 <div class="register-box">
						 <div class="register-logo">
						<a href="#"><b>Si</b>MED</a>
						</div>
					  <div class="register-box-body">
						<p class="login-box-msg">Sistema de gestión de información médica.</p>
	
						<form action="<?php echo base_url();?>login/process" method="POST" id="form_login" novalidate>
						<input type="hidden" name="token" value="<?php echo $token; ?>">
						 
						  <div class="form-group has-feedback">						
							<span class="glyphicon glyphicon-user form-control-feedback"></span>
							<input type="text" class="form-control" name="nick" value="<?= $this->session->flashdata('nick'); ?>" placeholder="Usuario"/>
						  </div>
						  <div class="form-group has-feedback">
							<span class="glyphicon glyphicon-lock form-control-feedback"></span>
							<input type="password" class="form-control" name="clave" placeholder="Contraseña"/>							
						  </div>
						  <div class="row">
							<div class="pull-right col-xs-4">
							  <button type="submit" class="btn btn-success btn-block btn-flat">Ingresar</button>
							</div><!-- /.col -->
						  </div>
						  
						</form>  
						<a class="text-green" href="<?php echo base_url();?>cuenta/crear_usuario">Crear una cuenta de usuario</a>
						<br><a href="<?php echo base_url();?>cuenta/contrasena">¿Olvido su contraseña?</a>						
					  </div><!-- /.form-box -->
					</div><!-- /.register-box -->

        </section><!-- /.content -->
		
		<section class="colum_der">
           <img id="img4" src="<?= base_url()?>assets/dist/img/login/serv_medico4.fw.png" alt="Atenci&oacute;n M&eacute;dica">
           <img id="img5" src="<?= base_url()?>assets/dist/img/login/serv_medico5.fw.png" alt="Bienestar">
           <img id="img6" src="<?= base_url()?>assets/dist/img/login/serv_medico6.fw.png" alt="Nutrici&oacute;n"> 
     </section>
	 
      </div><!-- /.content-wrapper -->

      <footer class="footer" style="margin-left:4%; margin-right:4%;">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="<?=base_url()?>">SiMed</a>.</strong>
      </footer>
      
   
    <!-- jQuery -->
    <script src="<?=base_url()?>assets/plugins/jQuery/jquery-1.11.3.min.js"></script>	 
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
     <!-- Form -->
    <script src='<?=base_url()?>assets/plugins/jQuery_validate/lib/jquery.form.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/jquery.validate.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/additional-methods.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/localization/messages_es.js'></script>
	<!-- FastClick -->
    <script src='<?=base_url()?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- all -->
    <script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
  </body>
</html>