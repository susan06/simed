	<?php $this->load->view('layouts/doctype.php');	 ?>	

    <div class="wrapper">
	
	<?php $this->load->view('layouts/header.php');	 ?>	
	<?php $this->load->view('layouts/menu.php');	 ?>	
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Perfil <small>- Usuario</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
				
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
				
          <div class='row'>
              <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Informaci&oacute;n del Usuario</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                 <form method="post" name="form_usu" id="form_usuario" onsubmit="return checkSubmit(form_usuario)" action="<?php echo base_url(); ?>usuarios/actualizar" novalidate>  
				 
				<?php if(is_array($usuario_editar) && count($usuario_editar) ) {
						foreach($usuario_editar as $row){ ?>
						
                  <div class="box-body">
                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" class="form-control" name="pnombre" value="<?php echo $row['pnombre'];?>" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                      <label>Apellido</label>
                      <input type="text" class="form-control" name="papellido" value="<?php echo $row['papellido'];?>" placeholder="Apellido">
                    </div>
					 <div class="form-group">
                      <label>Usuario</label>
                      <input type="text" class="form-control" disabled value="<?php echo $row['nick'];?>" >
                    </div>
					<div class="form-group">
                      <label>Rol</label>
                      <input type="text" class="form-control" disabled value=" <?= $this->crud_model->get_name_rol($row['roles_id']); ?>">
                    </div>
					 <div class="form-group" id="fromEmail">
                      <label>Email</label>
                      <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" placeholder="Email" onBlur="validar_email(this.value)">
					<span id="mnj_email"></span>
					 <input type="hidden" id="emailOld" value="<?php echo $row['email'];?>">
				   </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right">Guardar cambios</button>
                  </div>
                
				<input type="hidden" name="id" value="<?php echo $row['id'];?>">  

				<?php }  } ?>	
				
				</form>
				
              </div><!-- /.box -->
          </div>
		  </div>
		  
        </section><!-- /.content -->		

		
      </div><!-- /.content-wrapper -->
	  
	  <?php $this->load->view('layouts/footer.php');	 ?>
	
	 
	 
    </div><!-- ./wrapper -->

   <!-- jQuery -->
    <script src="<?=base_url()?>assets/plugins/jQuery/jquery-1.11.3.min.js"></script>
	<!-- jQuery UI 1.11.2 -->
    <script src="<?=base_url()?>assets/plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>	
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   
   <!-- Form -->
    <script src='<?=base_url()?>assets/plugins/jQuery_validate/lib/jquery.form.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/jquery.validate.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/additional-methods.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/localization/messages_es.js'></script>

  <!-- SlimScroll -->
    <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=base_url()?>assets/plugins/fastclick/fastclick.min.js'></script>
        <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/app.min.js" type="text/javascript"></script>
	
	<script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
	<script src="<?=base_url()?>assets/js/scripts_form.js" type="text/javascript"></script>
	
 <script type="text/javascript">
 
function validar_email(email){ 
var email2= document.getElementById("emailOld").value;
				$.ajax({ 
						url:'<?php echo base_url(); ?>cuenta/validar_email2',
						type:'POST',
						data:{email: email, email2: email2},
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
</script>			 
  </body>
</html>

