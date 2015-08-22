 <?php if(is_array($consulta) && count($consulta) ){
		foreach($consulta as $row){ ?>	
		
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
						  <label>Enfermedad actual: </label>
						  <?= $row['enfermedad_actual']; ?> 
						</div>					 
					</div>
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Motivo: </label>
						  <?= $row['motivo_consul']; ?> 
						</div>					 
					</div>					
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Diagnóstico: </label>
						  <?=  $row['diagnostico']; ?>
						</div>					 
					</div>
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Tratamiento: </label>
						  <?=  $row['tratamiento']; ?>
						</div>					 
					</div>
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Observaciones: </label>
						  <?=  $row['observacion_consul']; ?>
						</div>					 
					</div>
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Signos vitales: </label>
						   <?php  if($row['tension_arteria']){echo "Tensión A.: ".$row['tension_arteria']." mmHg. "; }?> 
						   <?php  if($row['peso']){ echo " Peso: ".$row['peso']." Kg. "; }?> 
						   <?php  if($row['temp']){ echo " Temperatura: ".$row['temp']." &deg;C. "; }?> 
						   <?php  if($row['pulso']){echo " Pulso: ".$row['pulso']." ppm. "; }?> 
						   <?php  if($row['resp']){echo " Respiración: ".$row['resp']." rpm. "; }?>
						</div>					 
					</div>


<?php }} ?>
