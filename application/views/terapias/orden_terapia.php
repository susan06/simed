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
					
					<div class="alert alert-warning alert-dismissable" style="display:none" id="alert_warning">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Advertencia!</h4>
							<span id="span_warning"></span>
					  </div>
					  
					  <div class="alert alert-info alert-dismissable" style="display:none" id="alert_info">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-info"></i> Información!</h4>
							<span id="span_info"></span>
					  </div>
					  
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
		
		
			  <div class="box">

<?php if(is_array($orden) && count($orden) ){
		foreach($orden as $row){ ?>	
					
				<div class="box-header">
						<a href="<?= base_url();?>consulta/orden_imprimir/<?= $row['id']; ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Imprimir</a>
						&nbsp;&nbsp;
						<button type="button" class="btn btn-sm btn-info" onclick="mandar_doc(<?= $row['id']; ?>,2,<?= $row['expediente_id']; ?>)"> Mandar a secretaria</button>
						&nbsp;&nbsp;
						<a href="<?= base_url();?>terapias/orden_aplicacion/<?= $row['id']; ?>" class="btn btn-sm btn-warning">Actualizar tratamientos</a>
						&nbsp;&nbsp;		
				</div>
			  
				<div class="box-header">
                  <center><h3 style="font-size:bold">Orden de terapia</h3></center>
				</div><!-- /.box-header -->  

                <div class="box-header">
				 <h3 class="box-title">Paciente: <?= $row['pnombre'].' '.$row['papellido'];  ?></h3>
                </div><!-- /.box-header -->
				
				<div class="box-header">				   
						<div class="form-group col-xs-10">
						  <label>Fecha:</label> <?= date_format(date_create($row['fecha']), 'd/m/Y'); ?> <br>
						  <label>Dr.:</label> <?= $row['nombre_doc'].' '.$row['apellido_doc'];  ?>
						</div>		

						<div class="form-group col-xs-2">
						  <label>N° Orden:</label> <?= $row['id']; ?> <br>
						  <label>N° expediente:</label> <?= $row['expediente_id']; ?>
						</div>							
			   </div>
				
	<form method="post" name="datos_orden" action="<?= base_url(); ?>terapias/actualizar_orden/<?= $row['id']; ?>">	 
	
	<div class="box-body">			

	<h4 style="font-size:bold">Frecuencia con que debe acudir a tratamiento</h4>
		 
		 <div class="box">
             <br>   			
					<div class="row">				   
						  <!-- radio -->
						   <div class="form-group col-xs-3">
							<label>
							  <input type="radio" name="frecuencia" value="1/semana" class="minimal-red" <?php if (!(strcmp($row['frecuencia'],"1/semana"))) {echo "checked=\"checked\"";} ?> /> Una vez a la semana
							</label>
							</div> 
							<div class="form-group col-xs-3">
							<label>
							  <input type="radio" name="frecuencia" value="2/semana" class="minimal-red" <?php if (!(strcmp($row['frecuencia'],"2/semana"))) {echo "checked=\"checked\"";} ?>  /> Dos veces por semana
							</label>
							</div> 
							<div class="form-group col-xs-3">
							<label>
							  <input type="radio" name="frecuencia" value="3/semana" class="minimal-red" <?php if (!(strcmp($row['frecuencia'],"3/semana"))) {echo "checked=\"checked\"";} ?>  /> Tres veces a la semana
							</label>
							</div> 
							<div class="form-group col-xs-3">
							<label>
							  <input type="radio" name="frecuencia" value="diario" class="minimal-red" <?php if (!(strcmp($orden[0]['frecuencia'],"diario"))) {echo "checked=\"checked\"";} ?>  />  Diario
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
									   $terapias_check = explode(',', $row['terapias']);
									   $aplicaciones = json_decode($row['aplicaciones']);
									  ?>
									  <tr>								  
										<td nowrap>
										<input type="checkbox" class="minimal-red" name="terapias[]" value="<?php echo $row_basico['id']; ?>" id="<?php echo $j++ ?>" <?php echo((in_array("".$row_basico["id"]."", $terapias_check ))?"checked":"");?>  >
										<?php echo $row_basico['descripcion']; ?>
										</td>
										<td align="center">
										<input type="text" name="aplicacion[]" <?php echo((in_array("".$row_basico["id"]."", $terapias_check ))?"value='".$aplicaciones->{$row_basico['id']}."'":"disabled");?> id="text<?php echo $l++ ?>" size="4">
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
									   $terapias_check = explode(',', $row['terapias']);
									   $aplicaciones = json_decode($row['aplicaciones']);
									  ?>
									  <tr>								  
										<td nowrap>
										<input type="checkbox" class="minimal-red" name="terapias[]" value="<?php echo $row_terapias['id']; ?>" id="<?php echo $j++ ?>" <?php echo((in_array("".$row_terapias["id"]."", $terapias_check ))?"checked=checked":"");?>  >
										<?php echo $row_terapias['descripcion']; ?>
										</td>
										<td align="center">
										<input type="text" name="aplicacion[]" id="text<?php echo $l++ ?>" size="4" <?php echo((in_array("".$row_terapias["id"]."", $terapias_check ))?"value='".$aplicaciones->{$row_terapias['id']}."'":"disabled");?>>
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
									   $terapias_check = explode(',', $row['terapias']);
									   $aplicaciones = json_decode($row['aplicaciones']);
									  ?>
									  <tr>								  
										<td nowrap>
										<input type="checkbox" class="minimal-red" name="terapias[]" id="<?php echo $j++ ?>" value="<?php echo $row_sueros['id']; ?>"  <?php echo((in_array("".$row_sueros["id"]."", $terapias_check ))?"checked=checked":"");?>  >
										<?php echo $row_sueros['descripcion']; ?>
										</td>
										<td align="center">
										<input type="text" name="aplicacion[]" id="text<?php echo $l++ ?>" size="4" <?php echo((in_array("".$row_sueros["id"]."", $terapias_check ))?"value='".$aplicaciones->{$row_sueros['id']}."'":"disabled");?> >
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
						 <textarea  name="obs"  class="form-control"><?= $row['obs']; ?> </textarea>
						</div>
					</div>
			</div>	
			
	</div><!-- /.box-body -->
				
					 <div class="box-footer">					 
					   <button type="submit" class="btn btn-success pull-right">Guardar</button>
					 </div>
				
				</form>	 			
	 <?php } } ?>	
	 
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

	  <!-- all -->
    <script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
	<!-- page script -->
    <script type="text/javascript">	
	
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });

		$('input[type="checkbox"].minimal-red').on('ifChanged', function(event){
			if (document.getElementById(this.id).checked==true){document.getElementById('text'+this.id).disabled=false} 
			if (document.getElementById(this.id).checked==false){document.getElementById('text'+this.id).disabled=true} 
		});
		
		function mandar_doc(id,tipo,expediente){

			$.ajax({ 
							url: '<?=base_url()?>consulta/mandar_doc',
							type:'POST',
							data:{id:id,tipo: tipo,expediente:expediente},
							dataType : 'json',
							success: function(data){
								if(data.exist == 1){
									$('#span_warning').html(data.mnj);
									$('#alert_warning').show();
									$('#alert_info').hide();
									setTimeout(function() {
									$(".alert").fadeOut(1000);
									},4000);
								}else{
									$('#span_info').html(data.mnj);
									$('#alert_info').show();
									$('#alert_warning').hide();
									setTimeout(function() {
									$(".alert").fadeOut(1000);
									},4000);
								}
							}
			})	
			
		}	
		
    </script>
  </body>
</html>

