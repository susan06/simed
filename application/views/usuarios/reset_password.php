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

 
        <!-- Main content -->
        <section class="login-box">
		
					 <div class="register-box">
						 <div class="register-logo">
						<a href="#"><b>Si</b>MED</a>
						</div>
					  <div class="register-box-body">
						<p class="login-box-msg">Restablecer contraseña.</p>
						

						  <div class="form-group" id="fromEmail">
							<label>Introduzca su Email</label>	
							<input type="email" name="email" class="form-control" placeholder="Email" id="email">	
							<span id="mnj_email"></span>								
						  </div>
						  
						    <div class="row" id="rowBuscar">
							<div class="pull-right col-xs-4">
							  <button type="button" class="btn btn-info btn-block btn-flat" id="boton" onClick="validar_email()">Buscar</button>
							</div><!-- /.col -->
						  </div>
						  
						 
						  <div class="form-group" id="rs_pass" style="display:none">
						  
						  <div class="form-group" id="fromRs">
							<label>Pregunta secreta: <span id="pregunta" class="text-info"></span> </label>	
							<input type="text" name="rs_secreta" class="form-control" placeholder="Respuesta secreta" id="rs_secreta" onkeyup="validar_respuesta()">	
							<span id="mnj_rs"></span>
						</div>	
						
						 <form method="post" name="form_pass" id="form_pass" action="<?php echo base_url(); ?>index.php/cuenta/guardar_contrasena" novalidate> 
						 
						  <div class="form-group">
							<label>Contraseña</label>						  
							<input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña">
						  </div>

						  <div class="form-group">
							<label>Confirmar Contraseña</label>	
							<input type="password" name="clave2" id="clave2" class="form-control" placeholder="Confirmar contraseña">							
						  </div>
						  
						    <div class="row">							
							<div class="pull-right col-xs-7">
							  <button type="submit" class="btn btn-success btn-block btn-flat" id="boton_submit">Restablecer Contraseña</button>
							</div>							
							</div>
							
							<input type="hidden" name="id" id="usuario">
							
						 </div>
						 
						   </form>
						   
						<a href="<?php echo base_url();?>index.php/login">Regresar a login</a>	
						
					  </div><!-- /.form-box -->
					</div><!-- /.register-box -->

        </section><!-- /.content -->
		
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

 
	 <script type="text/javascript">
	 
		function validar_email(){
			
			$('#mnj_email').html(" ");
			
			var email = $( "#email" ).val();
			expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			 
			 if ( expr.test(email) ){
				
				$('#fromEmail').removeClass('has-error').addClass('has-success');	
				$('#mnj_email').html(" ").removeClass('text-red').addClass('text-green');	

				$.ajax({ 
						url:'<?= base_url() ?>index.php/cuenta/validar_email',
						type:'POST',
						data:'email='+email,
						success: function(mnj){
							
							if(mnj==true){ 
								$( "#rs_pass" ).show();	
								$( "#rowBuscar" ).hide();
								document.getElementById("email").disabled = true;
								document.getElementById("clave").disabled = true;
								document.getElementById("clave2").disabled = true;
								document.getElementById("boton_submit").disabled = true;
								get_pregunta(email);
								get_usuario(email);
							
							}
							else
							{
									$('#fromEmail').removeClass('has-success').addClass('has-error');							
									$('#mnj_email').html("Email no registrado").removeClass('text-green').addClass('text-red');							
							}
							if(email==""){
									$('#mnj_email').html(" ");
									$('#fromEmail').removeClass('has-success').addClass('has-error');	
							}
						}
				   })
							
			 }else{
				 
				$('#fromEmail').removeClass('has-success').addClass('has-error');							
				$('#mnj_email').html("Formato de email incorrecto").removeClass('text-green').addClass('text-red');
				
			 }
		} 	

		
					 
	function get_pregunta(email){
				$.ajax({ 						
						type:'post',
						data:'email='+email,
						url:'<?php echo base_url(); ?>index.php/cuenta/pregunta',
						success: function(mnj){
							$('#pregunta').html(mnj);													
						}
				   })
	}
	
	function get_usuario(email){
				$.ajax({ 						
						type:'post',
						data:'email='+email,
						url:'<?php echo base_url(); ?>index.php/cuenta/usuario',
						success: function(data){
							$('#usuario').val(data);														
						}
				   })
	}
	
	function validar_respuesta(){
			var rsp = $( "#rs_secreta" ).val();
			var email = $( "#email" ).val();	
			
			$('#fromRs').removeClass('has-error').addClass('has-success');	
			$('#mnj_rs').html(" ").removeClass('text-red').addClass('text-green');	
			
				$.ajax({ 
						url:'<?php echo base_url(); ?>index.php/cuenta/validar_respuesta',
						type:'POST',
						data:{rsp: rsp, email: email},
						success: function(mnj){
							if(mnj==true){ 	
								document.getElementById("clave").disabled = false;
								document.getElementById("clave2").disabled = false;
								document.getElementById("boton_submit").disabled = false;						
							}else{
								$('#fromRs').removeClass('has-success').addClass('has-error');							
								$('#mnj_rs').html("Respuesta incorrecta").removeClass('text-green').addClass('text-red');	
							}
							if(rsp==""){
								$('#mnj_rs').html(" ");
								$('#fromRs').removeClass('has-success').addClass('has-error');
								document.getElementById("clave").disabled = true;
								document.getElementById("clave2").disabled = true;
								document.getElementById("boton_submit").disabled = true;
							}
						}
				   })
	} 
			 
	</script>
	
  </body>
</html>