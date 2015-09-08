 <?php if(is_array($procedimiento) && count($procedimiento) ){
		foreach($procedimiento as $row){ ?>	
		
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Fecha: </label>
						  <?= date_format(date_create($row['fecha_proced']), 'd/m/Y'); ?>
						</div>					 
					</div>
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Descripción: </label>
						 <?=  $row['descrip_proced']; ?>
						</div>					 
					</div>					
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Observaciones: </label>
						  <?=  $row['obs_proced']; ?>
						</div>					 
					</div>

<?php }} ?>
