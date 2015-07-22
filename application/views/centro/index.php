	<?php $this->load->view('layouts/doctype.php');	 ?>	
	

    <div class="wrapper">
	
	<?php $this->load->view('layouts/header.php');	 ?>	
	<?php $this->load->view('layouts/menu.php');	 ?>	
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Centro Médico Docente <span class="text-green"> LAS COCUIZAS </span> <small> C.A</small>
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
                 <form method="post" name="form_clinica" id="form_clinica" onsubmit="return checkSubmit()" action="<?php echo base_url(); ?>centro_medico/actualizar">  
				 
				<?php if(is_array($clinica) && count($clinica) ) {
						foreach($clinica as $row){ ?>	
                  <div class="box-body">
				   <div class="form-group">
                      <?php									
							if ($permisos[$editar]['status'] == 1 ){ 
							?>
							 <button type="button" class="btn btn-info pull-right" onclick="habilitar_form()">Editar datos</button>							

							<?php	
								}else{
							?>
							<button type="button" class="btn btn-info pull-right" onclick="editar_permiso()">Editar datos</button>

							<?php	
								}
							?>	
                    </div>

                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" class="form-control" name="nombre" id="nombre" disabled value="<?php echo $row['nombre'];?>" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                      <label>Télefono</label>
                      <input type="text" class="form-control" name="tlf" id="tlf" disabled value="<?php echo $row['tlf'];?>" placeholder="Télefono" data-inputmask='"mask": "(9999) 999.99.99"' data-mask>
                    </div>
					 <div class="form-group">
                      <label>RIF</label>
                      <input type="text" class="form-control" name="rif" id="rif" disabled value="<?php echo $row['rif'];?>" >
                    </div>
					<div class="form-group">
                      <label>Estado</label>
                      <input type="text" class="form-control" name="estado" id ="estado" disabled value="<?php echo $row['estado'];?>">
                    </div>
					 <div class="form-group" id="fromEmail">
                      <label>Ciudad</label>
                      <input type="text" class="form-control" name="ciudad" id="ciudad" disabled value="<?php echo $row['ciudad'];?>">
				   </div>
				   <div class="form-group" id="fromEmail">
                      <label>Dirección</label>
                      <input type="text" class="form-control" name="direccion" id="direccion" disabled value="<?php echo $row['direccion'];?>">
				   </div>
				   <div class="form-group" id="fromEmail">
                      <label>Zona postal</label>
                      <input type="text" class="form-control" name="postal" id="postal" disabled value="<?php echo $row['postal'];?>">
				   </div>
				     <div class="form-group" id="fromEmail">
                      <label>Lema</label>
                      <input type="text" class="form-control" name="lema" id="lema" disabled value="<?php echo $row['lema'];?>">
				   </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer" id="editar" style="display:none">
                    <button type="submit" class="btn btn-success pull-right">Guardar cambios</button>
                  </div>
                
				<input type="hidden" name="id" value="<?php echo $row['id'];?>">  

				<?php }  } ?>	
				
				</form>
				
              </div><!-- /.box -->
          </div>
		  </div>
		  
        </section><!-- /.content -->
		
	            <div class="modal modal-warning" id="warning_edit_modal" role="dialog">
              <div class="modal-dialog"  role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Permisos</h4>
                  </div>
                  <div class="modal-body">
                    <p>No tiene permiso para editar los datos cel Centro Médico</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-dismiss="modal">Ok</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
		
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
  
  <!-- InputMask -->
    <script src="<?=base_url()?>assets/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
	
  <!-- SlimScroll -->
    <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=base_url()?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/app.min.js" type="text/javascript"></script>

  <!-- all -->
    <script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
	<script src="<?=base_url()?>assets/js/scripts_form.js" type="text/javascript"></script>
	
<script>

	$(function () {
	$("[data-mask]").inputmask();
	});
	
	function editar_permiso(){ 			
			$('#warning_edit_modal').modal('show');			
		};	

	function habilitar_form(){
	document.getElementById("nombre").disabled = false;
	document.getElementById("tlf").disabled = false;
	document.getElementById("rif").disabled = false;
	document.getElementById("estado").disabled = false;	
	document.getElementById("ciudad").disabled = false;	
	document.getElementById("direccion").disabled = false;
	document.getElementById("postal").disabled = false;
	document.getElementById("lema").disabled = false;
	document.getElementById("editar").style.display = "block";
	}
</script>

  </body>
</html>

