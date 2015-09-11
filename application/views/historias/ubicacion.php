  
  <form method="post" id="ubicacion_historia" action="<?php echo base_url(); ?>historias/actualizar_ubicacion">  
  
 <?php if(is_array($historia) && count($historia) ){
		foreach($historia as $row){ ?>	
		
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Historia N°: </label>
						  <?= $row['id']; ?>
						</div>					 
					</div>
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Paciente: </label>
						   <?=  $row['pnombre']; ?> <?=  $row['snombre']; ?> <?=  $row['papellido']; ?> <?=  $row['sapellido']; ?>
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
						  <label>Doctor: </label>
						 <?=  $row['nombre_doc']; ?> <?=  $row['apellido_doc']; ?>
						</div>					 
					</div>						
					<div class="row">				   
						<div class="form-group col-xs-5">
						  <label>Ubicación: </label>
						  <input type="text" name="ubicacion" class="form-control" value="">					  				  
						</div>					 
					</div>
				<div class="box-footer">
				<input type="hidden" name="id" value="<?= $row['id']; ?>">
				<input type="hidden" id="expediente" value="<?= $row['expediente_id']; ?>">
				    <button type="submit" class="btn btn-success pull-left">Registrar</button>
					<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancelar</button>                    
                  </div>
</form>
<?php }} ?>
<script type="text/javascript">

$(document).ready(function(){
						
		$("#ubicacion_historia").submit(function(e){
					e.preventDefault();
					var expediente = document.getElementById('expediente').value;
					
					$.ajax({
						url: "<?php echo base_url(); ?>historias/actualizar_ubicacion",
						type: "POST",
						data: $("#ubicacion_historia").serialize(),
						dataType : 'json',
						success:function(data){
							$('#modalEditDialog').modal('hide');
							historias_paciente(expediente);	
							if(data.rsp == 0){
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
					}); 
		});
		
});		

</script>