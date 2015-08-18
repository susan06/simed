	<?php $this->load->view('layouts/doctype.php');	 ?>	
	
  <body class="skin-green-light sidebar-mini">
    <div class="wrapper">
	
	<?php $this->load->view('layouts/header.php');	 ?>	
	<?php $this->load->view('layouts/menu.php');	 ?>	
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Citas Médicas <small>- Programar cita</small>
          </h1>
        </section>
		
		<span class="ir-arriba"><i class="fa fa-level-up"></i></span>
		
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

		<div class="col-md-7">
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-body">
                  <form method="post" name="form_cita" id="form_cita" action="<?php echo base_url(); ?>citas/guardar_cita">  
				  
				  <div class="row">
                    <!-- text input -->
                    <div class="form-group col-xs-8">
                      <label>Paciente</label>
                      <input type="text" class="form-control" id="pacientes" placeholder="Escriba aqui para buscar"/>
					  <input type="hidden" class="form-control" name="pacientes_id" id="pacientes_id" required />
                    </div>
					 <div class="form-group col-xs-4">
						<label>Cédula</label>
						<div class="row">				 
						<div class="col-xs-12">
						  <input type="text" class="form-control" id="cedula" disabled />						  
						</div> 
						</div>
					</div> 
					</div> 
					
					<div class="row">
	                 <div class="form-group col-xs-6">
                      <label>Doctor</label>
					  <div class="row">	
					  <div class="col-xs-12">
						<select class="form-control" name="doctores_id" id="doctor" required onChange="cargar_lista_especialidad(this.value);">
								  <option value="">Seleccione doctor</option>
						<?php if(is_array($doctores) && count($doctores) ){
						foreach($doctores as $row){ ?>		  
								  <option value="<?=  $row['id']; ?>">DR. <?=  $row['pnombre']; ?> <?= $row['papellido']; ?></option>
						<?php }}else{ ?>
								<option value="">No hay registro</option>
						<?php } ?>
						</select>
						</div>
						</div>
                    </div>  
					</div> 
					
					<div class="row">
					 <div class="form-group col-xs-6">
                      <label>Especialidad</label>
                      <div class="row">	
					  <div class="col-xs-12">
						<select class="form-control" name="especialidades_id" required id="especialidades_id">
							<option value="">Seleccione primero el doctor</option>
						</select>
						</div>
						</div>
                    </div> 
					</div> 
					
					<div class="row">
					<div class="form-group col-xs-4">
						<label>Fecha</label>
						<div class="row">				 
						<div class="col-xs-10">
						  <input type="text" name="fecha" class="form-control" id="fecha" value="<?= date('d-m-Y'); ?>" readonly />
						</div> 
						</div>
					</div>
					<div class="form-group col-xs-4">
                      <label>Turno</label>
                      	<div class="row">	
							<div class="col-xs-10">
							<select class="form-control" name="turno" required id="turno">
								<?Php if(date('a') =='am'){; ?>
								<option value="1" selected>Mañana</option>
								<?Php }else{ ?>
								<option value="2" selected >Tarde</option>
								<?Php } ?>
							</select>
							</div>
						</div>
                    </div> 		
					 <div class="form-group col-xs-4">
                      <label>Hora de llegada</label>
                     	<div class="row">	
							<div class="col-xs-10">
							<select class="form-control" name="hora" required id="hora_id">
								<option value="<?= date('h:i a'); ?>" selected><?= date('h:i a'); ?></option>
							</select>
							</div>
						</div>
                    </div> 
					</div> 
					
				</div><!-- /.box-body -->
				   <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right">Guardar cita</button>
					<button type="reset" class="btn btn-warning pull-left" onclick="location.href='<?= base_url(); ?>sala_espera/consultas'">Volver a sala de espera</button>
                  </div>
				  </form>
              </div><!-- /.box -->
         </div><!--/.col (right) -->
	  
		  
          </div><!-- ./row -->
		  
		  
        </section><!-- /.content -->
		
		<div class="modal" id="modalPacDialog" role="dialog">
		  <div class="modal-dialog"  role="document" style="width: 40%;">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Resumen de cita creada</h4>
				</div>
						<div class="modal-body" id="pac-body">
						</div>
			 <div class="modal-footer">
			 <?php if($this->session->flashdata('cita_paciente') != ''): ?>	
				<button type="button" class="btn btn-default pull-left" onclick="location.href='<?= base_url(); ?>citas/paciente/<?= $this->session->flashdata('cita_paciente'); ?>'">Ver todas las citas</button>
			<?php endif;?>
				<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
			  </div>
			</div>
			<!-- /.modal-content --> 
		  </div>
		  <!-- /.modal-dialog --> 
		</div>	

		
      </div><!-- /.content-wrapper -->
	  
	  <?php $this->load->view('layouts/footer.php');	 ?>
	
	 
	 
    </div><!-- ./wrapper -->

   <!-- jQuery -->
    <script src="<?=base_url()?>assets/plugins/jQuery/jquery-1.11.3.min.js"></script>
	<!-- jQuery UI 1.11.2 -->
    <script src="<?=base_url()?>assets/plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>	
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=base_url()?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/app.min.js" type="text/javascript"></script>

	<script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
	
	   <!-- Form -->
    <script src='<?=base_url()?>assets/plugins/jQuery_validate/lib/jquery.form.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/jquery.validate.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/additional-methods.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/localization/messages_es.js'></script>
	
	<script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
	<script src="<?=base_url()?>assets/js/scripts_form.js" type="text/javascript"></script>
	
		<script type="text/javascript">	
		
		$(document).ready(function(){					
		
	
			$("#pacientes").autocomplete({
					source: '<?= base_url(); ?>pacientes/autocomplete',
					minlength:2,
					html:true,
					select: function(event, ui) {								
								event.preventDefault();
								$(this).val(ui.item.label);
								$("#pacientes_id").val(ui.item.id);
								$("#cedula").val(ui.item.ci);
							}
			});			
			
		});			
		<!--Funcion que llena un select dependiente (especialidad)-->
			function cargar_lista_especialidad(doctor){ 
				
				$.get("<?= base_url(); ?>doctores/get_especialidades",
					{ id: doctor },
					function(data) {
						$('#especialidades_id').empty();
						$('#especialidades_id').append($('<option></option>').text('Seleccione Especialidad').val(''));
						
						$.each(data, function(i) {
							$('#especialidades_id').append("<option value='" + data[i].id + "'>" + data[i].name + "</option>");
						});
				}, "json");
   
			 } 
			   
		
		</script>	

  </body>
</html>

