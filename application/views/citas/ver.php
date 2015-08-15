 <?php if(is_array($cita) && count($cita) ){
		foreach($cita as $row){ ?>	
		
				   <div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Paciente:</label>
						   <?= $row['pnombre']; ?> <?= $row['snombre']; ?> <?= $row['papellido']; ?> <?= $row['sapellido']; ?>
						</div>					 
					</div>
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Fecha: </label>
						  <?= date_format(date_create($row['fecha']), 'd/m/Y'); ?>
						</div>					 
					</div>
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Turno y hora: </label>
						 <?Php if($row['turno']== 1){ echo 'Mañana'; }else{ echo 'Tarde';} ?> - <?=  $row['hora_media']; ?>
						</div>					 
					</div>					
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Doctor: </label>
						  <?=  $row['nombre_doc']; ?> <?=  $row['apellido_doc']; ?>
						</div>					 
					</div>
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Especialidad: </label>
						  <?=  $row['nombre']; ?>
						</div>					 
					</div>


<?php }} ?>
