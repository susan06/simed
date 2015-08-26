	<?php $this->load->view('layouts/doctype.php');	 ?>	
	
    <div class="wrapper">
	
	<?php $this->load->view('layouts/header.php');	 ?>	
	<?php $this->load->view('layouts/menu.php');	 ?>	
 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Orden de Terapia <small></small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">		
			  
          <div class='row'>
            <div class='col-md-12'>
					
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
		
	<form method="post" name="datos_orden" id="form_orden" action="<?= base_url(); ?>terapias/guardar_orden">	
	
			  <div class="box">
			  
				<div class="box-header">
                  <center><h3 style="font-size:bold">Orden de terapia</h3></center>
				</div><!-- /.box-header -->  

                <div class="box-header">
				 <h5 class="form-group col-xs-5" id="label_pac"><label>Paciente</label><input type="text" class="form-control" id="pacientes" placeholder="Escriba aqui para buscar"/>
					 <input type="hidden" class="form-control" name="pacientes_id" id="pacientes_id" required />
				</h5>
					 
				<h5 class="form-group col-xs-2"><label>Cédula</label><input type="text" class="form-control" placeholder="Cédula" id="cedula" disabled /> </h5>
	
			
				<h5 class="form-group col-xs-4">
                      <label>Doctor</label>
					  <div class="row">	
						<select class="form-control" name="doctores_id" id="doctor" required>
						<option value="">Seleccione doctor</option>
						<?php if(is_array($doctores) && count($doctores) ){
						foreach($doctores as $row){ ?>		  
								  <option value="<?= $row['id']; ?>">DR. <?=  $row['pnombre']; ?> <?= $row['papellido']; ?></option>
						<?php }}else{ ?>
								<option value="">No hay registro</option>
						<?php } ?>
						</select>
						</div>
				</h5>
						
                </div><!-- /.box-header -->

			
	
	<div class="box-body">			

	<h4 style="font-size:bold">Frecuencia con que debe acudir a tratamiento</h4>
		 
		 <div class="box">
             <br>   			
					<div class="row">				   
						  <!-- radio -->
						   <div class="form-group col-xs-3">
							<label>
							  <input type="radio" name="frecuencia" value="1/semana" class="minimal-red" /> Una vez a la semana
							</label>
							</div> 
							<div class="form-group col-xs-3">
							<label>
							  <input type="radio" name="frecuencia" value="2/semana" class="minimal-red"  /> Dos veces por semana
							</label>
							</div> 
							<div class="form-group col-xs-3">
							<label>
							  <input type="radio" name="frecuencia" value="3/semana" class="minimal-red" /> Tres veces a la semana
							</label>
							</div> 
							<div class="form-group col-xs-3">
							<label>
							  <input type="radio" name="frecuencia" value="diario" class="minimal-red"  />  Diario
							</label>
							</div>				  
					</div>
					
		</div>	
		
	<h4 style="font-size:bold">Lista de terapias</h4>
	
		 <div class="box">
             <br>   			
					<div class="row">				   
						  <!-- radio -->
						   <div class="form-group col-xs-3">
								 <table align="center">
									<tr>
									  <td><label>Sueros Básicos:</label></td><td><label>N° veces</label></td>
									</tr>
									<?php 		
									$j=1;
									$m=1;
									$l=1;
									if(is_array($terapias) && count($terapias) ) { foreach($terapias as $row_basico){  ?> 
									  <?php if($row_basico['tipo'] == 1){  
									  ?>
									  <tr>								  
										<td nowrap>
										<input type="checkbox" class="minimal-red" name="terapias[]" id="<?php echo $j++ ?>" value="<?php echo $row_basico['descripcion']; ?>" >
										<?php echo $row_basico['descripcion']; ?>
										</td>
										<td align="center">
										<input type="text" name="aplicacion[]" id="text<?php echo $l++ ?>" size="4" disabled>
										</td>										
									  </tr>
									   <?php } }  } ?>
								  </table>
							</div> 
							<div class="form-group col-xs-4">
							 <table align="center">
									<tr>
									  <td><label>Terapias Complemetarias:</label></td><td><label>N° veces</label></td>
									</tr>
									<?php 		
									if(is_array($terapias) && count($terapias) ) { foreach($terapias as $row_terapias){  ?> 
									  <?php if($row_terapias['tipo'] == 3){  
									  ?>
									  <tr>								  
										<td nowrap>
										<input type="checkbox" class="minimal-red" name="terapias[]" id="<?php echo $j++ ?>" value="<?php echo $row_terapias['descripcion']; ?>" >
										<?php echo $row_terapias['descripcion']; ?>
										</td>
										<td align="center">
										<input type="text" name="aplicacion[]" id="text<?php echo $l++ ?>" size="4" disabled>
										</td>										
									  </tr>
									   <?php } }  } ?>
								  </table>
							</div> 
							<div class="form-group col-xs-5">
							 <table align="center">
									<tr>
									  <td><label>Sueros Expecíficos:</label></td><td><label>N° veces</label></td>
									</tr>
									<?php 		
									if(is_array($terapias) && count($terapias) ) { foreach($terapias as $row_sueros){  ?> 
									  <?php if($row_sueros['tipo'] == 2){  
									  ?>
									  <tr>								  
										<td nowrap>
										<input type="checkbox" class="minimal-red" name="terapias[]" id="<?php echo $j++ ?>" value="<?php echo $row_sueros['descripcion']; ?>" >
										<?php echo $row_sueros['descripcion']; ?>
										</td>
										<td align="center">
										<input type="text" name="aplicacion[]" id="text<?php echo $l++ ?>" size="4" disabled >
										</td>										
									  </tr>
									   <?php } }  } ?>
								  </table>
							</div> 			  
					</div>
					
		</div>	
			
<h4 style="font-size:bold"></h4>
		 
		 <div class="box">
             <br>   			
					<div class="row">				   
						<div class="form-group col-xs-6">
						  <label>Observaciones</label>
						 <textarea  name="obs"  class="form-control"></textarea>
						</div>
					</div>
			</div>	
			
	</div><!-- /.box-body -->
				
					 <div class="box-footer">					 
					   <button type="submit" class="btn btn-success pull-right">Guardar</button>
					 </div>
				
				</form>	 			
				
              </div><!-- /.box -->

            </div><!-- /.col-->
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
	<script src="<?=base_url()?>assets/bootstrap/js/bootbox.min.js" type="text/javascript"></script>

    <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=base_url()?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/app.min.js" type="text/javascript"></script>
 <!-- iCheck 1.0.1 -->
    <script src="<?=base_url()?>assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
	   <!-- Form -->
    <script src='<?=base_url()?>assets/plugins/jQuery_validate/lib/jquery.form.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/jquery.validate.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/additional-methods.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/localization/messages_es.js'></script>
	
	<script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
	<script src="<?=base_url()?>assets/js/scripts_form.js" type="text/javascript"></script>
	
	<!-- page script -->
    <script type="text/javascript">
	
		$("#pacientes").autocomplete({
					source: '<?= base_url(); ?>pacientes/autocomplete',
					minlength:2,
					html:true,
					select: function(event, ui) {								
								event.preventDefault();
								$(this).val(ui.item.label);
								$("#pacientes_id").val(ui.item.id);
								$("#cedula").val(ui.item.ci);
								if($("#cedula").val()){
								 $('#label_pac').addClass("has-success"); 
								 }
							}
		});		
		
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });

		$('input[type="checkbox"].minimal-red').on('ifChanged', function(event){
			if (document.getElementById(this.id).checked==true){document.getElementById('text'+this.id).disabled=false} 
			if (document.getElementById(this.id).checked==false){document.getElementById('text'+this.id).disabled=true} 
		});		
		
    </script>
  </body>
</html>

