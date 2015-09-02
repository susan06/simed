	<?php $this->load->view('layouts/doctype.php');	 ?>	
<style type='text/css'>
	 .separador{ 
	 border-left:2px solid #9C9C9C;
	 }
</style>	
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
						<a href="<?= base_url();?>terapias/orden_imprimir/<?= $row['id']; ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Imprimir</a>		
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
						   <div class="form-group col-xs-12">
								 <table align="center" width="90%">
									<tr>
									  <td width="25%"><label>Terapia:</label></td><td width="10%"><label>N° veces</label></td><td width="65%"><label>Aplicaciones</label></td>
									</tr>
									<?php 		
									if(is_array($terapias) && count($terapias) ) { foreach($terapias as $row_basico){  ?> 
									  <?php 
									   $terapias_check = explode(',', $row['terapias']);
									   $aplicaciones = json_decode($row['aplicaciones']);
									  ?>
									  <tr>								  
										<td nowrap>
										<?php echo((in_array("".$row_basico["id"]."", $terapias_check ))?"".$row_basico['descripcion']."":"");?>
										</td>
										<td>
										<?php echo((in_array("".$row_basico["id"]."", $terapias_check ))?"".$tabla_apl = $aplicaciones->{$row_basico['id']}."":"");?>
										</td>
										<td>
										<?php if(in_array("".$row_basico["id"]."", $terapias_check )){ ?>
										
										<?Php 
										if($aplicacion != null){

										if(in_array("".$row_basico["id"]."", $aplicacion )){
										$countValues = array_count_values($aplicacion);
										$countValues[$row_basico["id"]];
										}else{
										$countValues=0;	
										}
										for ( $i=1 ; $i <= $tabla_apl ; $i ++) {  ?>
										
										 <input readonly type="checkbox" class="minimal-red" <?Php if($i <= $countValues[$row_basico["id"]]){ echo "checked"; } ?> >
										
										<?php } 
										
	
										 }else{
											
										for ( $i=1 ; $i <= $tabla_apl ; $i ++) { ?>
										
										 <input readonly type="checkbox" class="minimal-red">
										 
										 <?php } } } ?>
										</td>										
									  </tr>
									   <?php } }  ?>
								  </table>
							</div> 		  
					</div>
					
		</div>	

<h4 style="font-size:bold">Registro de aplicaciones</h4>
		 
		 <div class="box">
             <br>   			
				   <div class="row">
 <form method="post"  id="form_aplicacion" action="<?php echo base_url(); ?>terapias/guardar_aplicacion/<?= $row['id']; ?>" novalidate>  
									   
						<div class="form-group col-xs-5">
						  <label>Terapia</label>
						  <select class="form-control" name="terapias_id" required>
								  <option value="">Seleccione la terapia</option>
								  <?php 		
									if(is_array($terapias) && count($terapias) ) { foreach($terapias as $row_t){  ?> 
									  <?php 
									   $terapias_check = explode(',', $row['terapias']);
									  if(in_array($row_t["id"], $terapias_check )){
									  ?>
									<option value="<?= $row_t["id"] ?>"><?= $row_t["descripcion"]  ?></option>
										<?php } } } ?>
								</select>
						</div>
						<div class="form-group col-xs-3">
						  <label>Terapista</label>
						  <input type="text" class="form-control" name="terapista" placeholder="Nombre de la terapista">
						</div>
						
					</div>
				
				<div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right">Registrar aplicación</button>
                  </div>

				</form>
			</div>
			
<h4 style="font-size:bold"></h4>
		 
		 <div class="box">
             <br>   			
					<div class="row">				   
						<div class="form-group col-xs-6">
						  <label>Observaciones:</label>
						 <textarea  name="obs"  class="form-control" readonly><?= $row['obs']; ?> </textarea>
						</div>
					</div>
			</div>
			
	<?php 	
	if( count($aplicacion1) > 0 ) { 
	?>	
				
		 <div class="box">
             <br>
			<div style="width:50%; float:left">				 
			<table width="100%" border="1" style="border:1px solid #999; border-collapse:collapse" cellpadding="0" cellspacing="0">
              <tr align="center" style="font-weight:bold">
                <td width="10%">fecha</td>
                <td width="25%">Terapia</td>
                <td width="15%">terapeuta</td>
              </tr>			  
				<?php 		
				if(is_array($aplicacion1) && count($aplicacion1) ) { 					
				foreach($aplicacion1 as $row_apli1){ 				
				?>
				<tr align="center">
				<td nowrap><?= date_format(date_create($row_apli1['fecha']), 'd/m/Y'); ?></td>
				<td nowrap><?= $row_apli1['descripcion']; ?></td>
				<td align="center" nowrap><?= $row_apli1['terapista']; ?></td>
				</tr>	
				<?php } 
				for ( $i=count($aplicacion1) ; $i < 16 ; $i ++) { 
				?>				
				<tr align="center">
				<td nowrap>&nbsp;</td>
				<td nowrap>&nbsp;</td>
				<td nowrap>&nbsp;</td>
				</tr>	
				<?php } }else{ 
				for ( $i= 0 ; $i < 16 ; $i ++) { 
				?>				
				<tr align="center">
				<td nowrap class="separador">&nbsp;</td>
				<td nowrap>&nbsp;</td>
				<td nowrap>&nbsp;</td>
				</tr>
				<?php } } ?>	
			</table>
			</div>
			<div style="width:50%; float:right">			
			<table width="100%" border="1" style="border:1px solid #999; border-collapse:collapse" cellpadding="0" cellspacing="0">
              <tr align="center" style="font-weight:bold">
				<td width="10%" class="separador">fecha</td>
                <td width="25%">Terapia</td>
                <td width="15%">terapeuta</td>
              </tr>
				<?php 		
				if(is_array($aplicacion2) && count($aplicacion2) ) { 					
				foreach($aplicacion2 as $row_apli2){ 				
				?>
				<tr align="center">
				<td nowrap class="separador"><?= date_format(date_create($row_apli2['fecha']), 'd/m/Y'); ?></td>
				<td nowrap><?= $row_apli2['descripcion']; ?></td>
				<td align="center" nowrap><?= $row_apli2['terapista']; ?></td>
				</tr>
				<?php } 
				for ( $i=count($aplicacion2) ; $i < 16 ; $i ++) { 
				?>				
				<tr align="center">
				<td nowrap class="separador">&nbsp;</td>
				<td nowrap>&nbsp;</td>
				<td nowrap>&nbsp;</td>
				</tr>	
				<?php } }else{ 
				for ( $i=0 ; $i < 16 ; $i ++) { 
				?>				
				<tr align="center">
				<td nowrap class="separador">&nbsp;</td>
				<td nowrap>&nbsp;</td>
				<td nowrap>&nbsp;</td>
				</tr>
				<?php } } ?>					
            </table>
			</div>
 		</div>
		<?php } ?>		
	</div><!-- /.box-body -->
 			
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

	   <!-- Form -->
    <script src='<?=base_url()?>assets/plugins/jQuery_validate/lib/jquery.form.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/jquery.validate.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/additional-methods.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/localization/messages_es.js'></script>
	
	<script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
	<script src="<?=base_url()?>assets/js/scripts_form.js" type="text/javascript"></script>
	
	<!-- page script -->
    <script type="text/javascript">	
	
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });

				
    </script>
  </body>
</html>

