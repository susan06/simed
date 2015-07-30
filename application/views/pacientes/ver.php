 <?php if(is_array($paciente) && count($paciente) ){
		foreach($paciente as $row){ ?>	
		
				   <div class="row">
				   
						<div class="form-group col-xs-5">
						  <label>Paciente:</label>
						  <?= $row['pnombre']; ?> <?= $row['snombre']; ?> <?= $row['papellido']; ?> <?= $row['sapellido']; ?>
						</div>	
				 
					</div>

					<div class="row">
				   
						<div class="form-group col-xs-3">
						  <label>Cédula:</label><br>
						   <?= $row['cedula']; ?>
						</div>
						<div class="form-group col-xs-3">
						  <label>Fecha de Nacimiento:</label><br>
						  <?= date_format(date_create($row['fnacimiento']), 'd/m/Y'); ?>
						</div>
						<div class="form-group col-xs-3">
						  <label>Lugar de Nacimiento:</label><br>
						  <?=$row['lnacimiento']; ?>
						</div>
						<div class="form-group col-xs-3">
						  <label>Edad:</label><br>
						  <?php echo $row['edad']; if($row['edad']){ echo " años"; } ?> 
						</div>					
				 
					</div>					
					
				<div class="row">
				   
						<div class="form-group col-xs-3">
						  <label>Sexo:</label><br>
						   		<?php if($row['sexo'] == "F"){ echo "Femenino"; }else{ echo "Masculino";} ?> 
						</div>
						<div class="form-group col-xs-3">
						  <label>Estado Civil:</label><br>
						   <?=$row['civil']; ?>
						</div>
						<div class="form-group col-xs-3">
						  <label>Email:</label><br>
						  <?php echo $row['email']; ?>
						</div>
						<div class="form-group col-xs-3">
						  <label>Profesi&oacute;n:</label><br>
						  <?php echo $row['profesion']; ?>
						</div>
						
				 
					</div>						

				<div class="row">
						<div class="form-group col-xs-3">
						  <label>T&eacute;lefono:</label><br>
						  <?php echo $row['tlf']; ?>
						</div>
						<div class="form-group col-xs-4">
						  <label>Direcci&oacute;n:</label><br>
						   <?php echo $row['direccion']; ?>
						</div>										 
				</div>				
				
				 <?php if($row['rlegal']){ ?>
				<div class="row">
				<br>
				 <div class="col-md-6">
						  <div class="box-header">
						  <h3 class="box-title">Representante Legal</h3>
						  </div>
						  <div class="box-body">
						<div class="form-group col-xs-6">
						  <label>Nombre:</label>
						   <?php echo $row['rlegal']; ?>
						</div>
						<div class="form-group col-xs-6">
						  <label>Parentesco:</label>
						  <?php echo $row['p_rlegal']; ?>
						</div>
						</div>
				 </div>
					</div>						
				
				 <?php } ?>


<?php }} ?>
