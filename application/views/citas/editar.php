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
            Citas Médicas <small>- Editar cita</small>
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

		<div class="col-md-6">
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-body">
                  <form method="post" name="form_cita" id="form_cita" onsubmit="return checkSubmit(form_cita)" action="<?php echo base_url(); ?>citas/actualizar" novalidate>  
                 
				  
			 <?php if(is_array($cita) && count($cita) ){
					foreach($cita as $row){ ?>	
					
				 <!-- text input -->
                    <div class="form-group">
                      <label>Paciente:</label>
                       <?= $row['pnombre']; ?> <?= $row['snombre']; ?> <?= $row['papellido']; ?> <?= $row['sapellido']; ?>
					   <input type="hidden" name="id" value="<?= $row['id']; ?>"/>
					   <input type="hidden" name="url_cita" value="citas/paciente/<?= $row['paciente_id']; ?>"/>
                    </div>
	                 <div class="form-group">
                      <label>Doctor</label>
					  <div class="row">	
					  <div class="col-xs-6">
						<select class="form-control" name="doctores_id" id="doctor" required onChange="cargar_lista_especialidad(this.value); hora_cita($('#turno').val(), this.value, $('#fecha').val())">
						<option value="<?=  $row['doctor_id']; ?>"> DR. <?=  $row['nombre_doc']; ?> <?=  $row['apellido_doc']; ?></option>
						<?php if(is_array($doctores) && count($doctores) ){
						foreach($doctores as $row2){ ?>	
									<?php if($row['doctor_id'] != $row2['id']){ ?>							
										<option value="<?= $row2['id']; ?>">DR. <?=  $row2['pnombre']; ?> <?= $row2['papellido']; ?></option>
								  <?php } ?>
						<?php }}else{ ?>
								<option value="">No hay registro</option>
						<?php } ?>
						</select>
						</div>
						</div>
                    </div>  
					 <div class="form-group">
                      <label>Especialidad</label>
                      <div class="row">	
					  <div class="col-xs-7">
						<select class="form-control" name="especialidades_id" required id="especialidades_id">
							<option value="<?= $row['especialidad_id']; ?>"> <?= $row['nombre']; ?></option>
						</select>
						</div>
						</div>
                    </div> 
					<div class="form-group">
						<label>Fecha</label>
						<div class="row">				 
						<div class="col-xs-4">
						  <input type="text" value="<?= $row['fecha']; ?>" name="fecha" class="form-control" id="fecha" onblur="hora_cita( $('#turno').val(), $('#doctor').val(), $('#fecha').val() )"/>
						</div> 
						</div>
					</div> 
					<div class="form-group">
                      <label>Turno</label>
                      	<div class="row">	
							<div class="col-xs-4">
							<select class="form-control" name="turno" required id="turno" onChange="hora_cita(this.value, $('#doctor').val(), $('#fecha').val())">
								<option value="<?= $row['turno']; ?>"><?Php if($row['turno']== 1){ echo 'Mañana'; }else{ echo 'Tarde';} ?></option>
								<?php if($row['turno'] != 1){ echo	'<option value="1">Mañana</option>'; }?>
								<?php if($row['turno'] != 2){ echo	'<option value="2">Tarde</option>';	 }?>
							</select>
							</div>
						</div>
                    </div> 
					 <div class="form-group">
                      <label>Hora pautada</label>
                     	<div class="row">	
							<div class="col-xs-8">
							<select class="form-control" name="hora_id" required id="hora_id">
								<option value="<?= $row['hora_id']; ?>"><?=  $row['hora_media']; ?></option>
							</select>
							</div>
						</div>
                    </div> 
					<?php }} ?>
				</div><!-- /.box-body -->
				   <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right">Guardar cambios</button>
                  </div>
				  </form>
              </div><!-- /.box -->
         </div><!--/.col (right) -->
	  
		  
          </div><!-- ./row -->
		  
		  
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
    <!-- SlimScroll -->
    <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=base_url()?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/app.min.js" type="text/javascript"></script>

	<script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
	
	<script src="<?=base_url()?>assets/js/datepicker-es.js" type="text/javascript"></script>
	
	   <!-- Form -->
    <script src='<?=base_url()?>assets/plugins/jQuery_validate/lib/jquery.form.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/jquery.validate.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/additional-methods.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/localization/messages_es.js'></script>
	
	<script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
	<script src="<?=base_url()?>assets/js/scripts_form.js" type="text/javascript"></script>
	
		<script type="text/javascript">	
			
			window.onload = function() {

				$.get("<?= base_url(); ?>doctores/get_especialidades",
					{ id: $('#doctor').val()},
					function(data) {
						$.each(data, function(i) {
							if(data[i].id != $('#especialidades_id').val()){
							$('#especialidades_id').append("<option value='" + data[i].id + "'>" + data[i].name + "</option>");
							}
						});
				}, "json");
				
				$.get("<?= base_url(); ?>citas/horas",
					{ turno:$('#turno').val(), doctor:$('#doctor').val(), fecha:$('#fecha').val() },
					function(data) {
						$.each(data, function(i) {							
							$('#hora_id').append("<option value='" + data[i].id + "'>" + data[i].hora + "</option>");							
						});
				}, "json");
				
			};	
			
		<!--Funcion que llena un select dependiente (especialidad)-->
			function cargar_lista_especialidad(doctor){ 
				
				$.get("<?= base_url(); ?>doctores/get_especialidades",
					{ id: doctor },
					function(data) {
						$.each(data, function(i) {
							$('#especialidades_id').append("<option value='" + data[i].id + "'>" + data[i].name + "</option>");
						});
				}, "json");
   
			 } 
			   
					
			<!--Funcion que llena un select de horas disponibles para cita-->
			function hora_cita(turno, doctor, fecha){ 
			
			if(doctor && fecha){
				$.get("<?= base_url(); ?>citas/horas",
					{ turno:turno, doctor:doctor, fecha:fecha },
					function(data) {
						$('#hora_id').empty();
						$('#hora_id').append($('<option></option>').text('Seleccione hora disponibles').val('')); 
						$.each(data, function(i) {
							$('#hora_id').append("<option value='" + data[i].id + "'>" + data[i].hora + "</option>");
						});
				}, "json");
			}else{
				$('#hora_id').empty();
				$('#hora_id').append($('<option></option>').text('Seleccione hora disponibles').val(''));
					if(!doctor){
					$('#hora_id').append($('<option></option>').text('Debe seleccionar un DOCTOR para mostras horas').val('')); 
					}	
					if(!fecha){
					$('#hora_id').append($('<option></option>').text('Debe seleccionar una FECHA para mostras horas').val('')); 
					}
			}
			
			}
			   
		</script>	

  </body>
</html>

