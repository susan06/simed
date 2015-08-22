
<?php if(is_array($recipe) && count($recipe) ){
	foreach($recipe as $row){ ?>

		
					<div class="row">				   
								<div class="form-group col-xs-10">
								  <label>Fecha de émisión:</label> <?= date('d/m/Y'); ?> <br>
								  <label>Fecha de expiración: </label> <?= date_format(date_create($row['fecha_expiracion']), 'd/m/Y'); ?>
								</div>								
					  </div>
					<div class="box">
					 <br>     		
							<div class="row">				   
								<div class="form-group col-xs-6">
								  <label>Récipe</label>
								 <textarea name="rp" rows="15" class="form-control"> <?=  $row['rp']; ?></textarea>
								</div>
								<div class="form-group col-xs-6">
								  <label>Indicaciones</label>
								   <textarea name="indicaciones" rows="15"  class="form-control"> <?=  $row['indicaciones']; ?></textarea>
								</div>
							</div>	
					</div>
			

<?php }}else{ ?>	
	<center>No se encontraron registros de récipes del paciente</center>
<?php } ?>	