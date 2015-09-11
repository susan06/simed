 <?php if(is_array($examenes) && count($examenes) ){
		foreach($examenes as $row){ ?>	
		
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Fecha: </label>
						  <?= date_format(date_create($row['fecha_exam']), 'd/m/Y'); ?>
						</div>					 
					</div>
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Tipo de exámen: </label>
						 <?=  $row['tipo_exam']; ?>
						</div>					 
					</div>					
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Resultado: </label>
						  <?=  $row['resultado']; ?> 
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
						  <?=  $row['obs_exam']; ?>
						</div>					 
					</div>

<?php }} ?>
