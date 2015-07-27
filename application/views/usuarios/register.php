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

		<link href="<?=base_url()?>favicon.ico" rel="shortcut icon" type="image/ico" /> 
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
		height:18%;
		width:98%;
		margin-bottom:60%;
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
		
					 <div class="register-box" style="width:80%">
						 <div class="register-logo">
						<a href="#"><b>Si</b>MED</a>
						</div>
					  <div class="register-box-body">
						<p class="login-box-msg">Registro de Usuario.</p>
	
						<form action="<?php echo base_url();?>cuenta/guardar_usuario" method="POST" id="form_usuario" onsubmit="return checkSubmit()" novalidate>
						  
						  <div class="row">
						  
						  <div class="form-group has-feedback col-xs-4">						
							<label>Nombre</label>
							<input type="text" name="pnombre" class="form-control" placeholder="Nombre">
						  </div>
						  <div class="form-group has-feedback col-xs-4">
							<label>Apellido</label>
							<input type="text" name="papellido" class="form-control" placeholder="Apellido">							
						  </div>
						   <div class="form-group has-feedback col-xs-4" id="fromUsuario">
						  <label>Usuario</label>
							<input type="text" name="nick" class="form-control" placeholder="Nombre de Usuario" id="usuario" onBlur="validar_usuario(this.value)">	
							<span id="mnj_nick"></span>							
						  </div>
						  </div>
						  
						  <div class="row">
						  <div class="form-group has-feedback col-xs-6">
							<label>Contraseña</label>						  
							<input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña">
						  </div>

						  <div class="form-group has-feedback col-xs-6">
							<label>Confirmar Contraseña</label>	
							<input type="password" name="clave2" class="form-control" placeholder="Confirmar contraseña">							
						  </div>
						  </div>
						  
						  <div class="row">
						  <div class="form-group has-feedback col-xs-6">
							<label>Pregunta de seguridad</label>	
								<select class="form-control" name="pregunta_secreta" required>
								  <option value="">Seleccione una pregunta</option>
								  <option value="1">¿Libro favorito?</option>
								  <option value="2">¿Película favorita?</option>
								  <option value="3">¿Comida favorita?</option>
								  <option value="4">¿Primera mascota?</option>
								  <option value="5">¿Cantante favorito?</option>
								  <option value="6">¿Equipo de fútbol favorito?</option>
								  <option value="7">¿Personaje de pelicula?</option>
								</select>
							</div>

						  <div class="form-group has-feedback col-xs-6">
							<label>Respuesta de Seguridad</label>	
							<input type="text" name="respuesta_secreta" class="form-control" placeholder="Respuesta de seguridad">							
						  </div>
						  </div>
						  <div class="row">
						  <div class="form-group has-feedback col-xs-4" id="fromEmail">
							<label>Email</label>	
							<input type="email" name="email" class="form-control" placeholder="Email" onBlur="validar_email(this.value)">
							<span id="mnj_email"></span>								
						  </div>
						<div class="form-group has-feedback col-xs-4">
							<label>Rol</label>	
								<select class="form-control" name="sexo" required>
								  <option value="">Seleccione sexo</option>
								  <option value="F">Femenino</option>
								  <option value="M">Masculino</option>
								</select>
							</div>
						  <div class="form-group has-feedback col-xs-4">
							<label>Rol</label>	
								<select class="form-control" name="rol" required onchange="usuario_doctor(this.value)">
								  <option value="">Seleccione su rol</option>
								  <option value="2">Enfermera</option>
								  <option value="3">Doctor</option>
								  <option value="4">Terapista</option>
								  <option value="5">Secretaria</option>
								</select>
							</div>
						  </div>
						   <div class="row" id="showDoctor" style="display:none">
						  <div class="form-group has-feedback col-xs-4">
							<label>Cédula - Doctor</label>	
							<input type="text" name="cedula" class="form-control" placeholder="Cédula de Doctor">
							</div>
							<div class="form-group has-feedback col-xs-4">
							<label>RIF - Doctor</label>	
								<input type="text" name="rif" class="form-control" placeholder="RIF de Doctor">
							</div>
							<div class="form-group has-feedback col-xs-4">
							<label>MPPS - Doctor</label>	
								<input type="text" name="mpps" class="form-control" placeholder="MPPS de Doctor">
							</div>
						  </div>
						  
						  <div class="row">
							<div class="pull-right col-xs-4">
							  <button type="submit" class="btn btn-success btn-block btn-flat" id="boton_submit">Registrarse</button>
							</div><!-- /.col -->
						  </div>
						  
						</form>  
						
						<a href="<?php echo base_url();?>login">Regresar a login</a>						
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
	<script src="<?=base_url()?>assets/js/scripts_form.js" type="text/javascript"></script>
	<script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
	
	 <script type="text/javascript">
	 
	function validar_usuario(nick){ 
				$.ajax({ 
						url:'<?php echo base_url(); ?>cuenta/validar_usuario',
						type:'POST',
						data:'nick='+nick,
						success: function(mnj){
							if(mnj==true){
							
							$('#fromUsuario').removeClass('has-success').addClass('has-error');							
							$('#mnj_nick').html("Usuario no disponible").removeClass('text-green').addClass('text-red');	
							document.getElementById("boton_submit").disabled = true;
							
							}else{
								
							$('#fromUsuario').removeClass('has-error').addClass('has-success');	
							$('#mnj_nick').html("Usuario válido").removeClass('text-red').addClass('text-green');	
							document.getElementById("boton_submit").disabled = false;
							}
							if(nick==""){
							$('#mnj_nick').html("");
							$('#fromUsuario').removeClass('has-success').addClass('has-error');	
							document.getElementById("boton_submit").disabled = false;
							}
						}
				   })
			 } 	

		function validar_email(email){ 
				$.ajax({ 
						url:'<?php echo base_url(); ?>cuenta/validar_email',
						type:'POST',
						data:'email='+email,
						success: function(mnj){
							if(mnj==true){
							
							$('#fromEmail').removeClass('has-success').addClass('has-error');							
							$('#mnj_email').html("Este Email ya es de otro usuario").removeClass('text-green').addClass('text-red');	
							document.getElementById("boton_submit").disabled = true;
							
							}else{
								
							$('#fromEmail').removeClass('has-error').addClass('has-success');	
							$('#mnj_email').html("Email válido").removeClass('text-red').addClass('text-green');	
							document.getElementById("boton_submit").disabled = false;
							}
							if(nick==""){
							$('#mnj_email').html("");
							$('#fromEmail').removeClass('has-success').addClass('has-error');	
							document.getElementById("boton_submit").disabled = false;
							}
						}
				   })
			 } 	
		
		function usuario_doctor(rol){
			if(rol == 3){
			document.getElementById("showDoctor").style.display="block";
			}
		}	
	</script>
	
  </body>
</html>