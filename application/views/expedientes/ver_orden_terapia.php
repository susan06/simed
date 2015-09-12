<style type='text/css'>
	 .separador{ 
	 border-left:2px solid #9C9C9C;
	 }
</style>	
		
<div class="box">

<?php if(is_array($orden) && count($orden) ){
		foreach($orden as $row){ ?>	
							  
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
										<input type="checkbox" class="minimal-red" name="terapias[]" id="<?php echo $j++ ?>"  <?php echo((in_array("".$row_basico["id"]."", $terapias_check ))?"checked":"");?>  >
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
										<input type="checkbox" class="minimal-red" name="terapias[]" id="<?php echo $j++ ?>"  <?php echo((in_array("".$row_terapias["id"]."", $terapias_check ))?"checked=checked":"");?>  >
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
										<input type="checkbox" class="minimal-red" name="terapias[]" id="<?php echo $j++ ?>" <?php echo((in_array("".$row_sueros["id"]."", $terapias_check ))?"checked=checked":"");?>  >
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
						 <textarea  name="obs"  class="form-control" readonly ><?= $row['obs']; ?> </textarea>
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
							url: '<?=base_url()?>terapias/mandar_doc',
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

