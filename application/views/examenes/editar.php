  
  <form method="post" name="form_examen" id="examen_edit" action="<?php echo base_url(); ?>examenes/actualizar">  
  
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
						 <input type="text" name="tipo" id="tipo" required class="form-control" value="<?=  $row['tipo_exam']; ?>">
						</div>					 
					</div>					
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Resultado: </label>
						  <textarea name="resultado" class="form-control"><?=  $row['resultado']; ?> </textarea>				  
						</div>					 
					</div>
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Tratamiento: </label>
						  <textarea name="tratamiento" class="form-control"><?=  $row['tratamiento']; ?></textarea>
						</div>					 
					</div>
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Observaciones: </label>
						  <textarea name="obs_exam" class="form-control"><?=  $row['obs_exam']; ?></textarea>
						  
						</div>					 
					</div>
				<div class="box-footer">
				<input type="hidden" name="id" value="<?= $row['id']; ?>">
				<input type="hidden" id="expediente" value="<?= $row['expediente_id']; ?>">
                    <button type="submit" class="btn btn-success pull-right">Registrar cambios</button>
                  </div>
</form>
<?php }} ?>
<script type="text/javascript">

$(document).ready(function(){
						
		$("#examen_edit").submit(function(e){
					e.preventDefault();
					var expediente = document.getElementById('expediente').value;
					
					$.ajax({
						url: "<?php echo base_url(); ?>examenes/actualizar",
						type: "POST",
						data: $("#examen_edit").serialize(),
						dataType : 'json',
						success:function(data){
							$('#modalEditDialog').modal('hide');
							examenes_paciente(expediente);	
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