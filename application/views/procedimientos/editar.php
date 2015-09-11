  <form method="post"  id="procedimiento_edit" action="<?php echo base_url(); ?>procedimientos/actualizar">
 
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
						  <input type="text" name="descrip" id="tipo" required class="form-control" value="<?=  $row['descrip_proced']; ?>">
						</div>					 
					</div>					
					<div class="row">				   
						<div class="form-group col-xs-12">
						  <label>Observaciones: </label>
						  <textarea name="obs_proced" class="form-control"><?=  $row['obs_proced']; ?></textarea>
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
						
		$("#procedimiento_edit").submit(function(e){
					e.preventDefault();
					var expediente = document.getElementById('expediente').value;
					
					$.ajax({
						url: "<?php echo base_url(); ?>procedimientos/actualizar",
						type: "POST",
						data: $("#procedimiento_edit").serialize(),
						dataType : 'json',
						success:function(data){
							$('#modalEditDialog').modal('hide');
							procedimientos_paciente(expediente);	
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