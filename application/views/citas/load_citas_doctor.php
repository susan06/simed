                  <table id="citas_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
						<th width="15%">Fecha / Hora</th>
						<th>Paciente</th>
						<th>Especialidad</th>
						<th>Status</th>
						<th width="15%">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php if(is_array($citas) && count($citas) ){
						$numero=1;
						foreach($citas as $row){ ?>
							<tr>
		  
						  <td><?=  $numero++ ?></td>
						  <td> <?= date_format(date_create($row['fecha']), 'd/m/Y'); ?> - <?=  $row['hora_media']; ?> </td>
						  <td><?= $row['pnombre'] ?> <?= $row['snombre'] ?> <?= $row['papellido'] ?> <?= $row['sapellido'] ?></td>
						<td><?=  $row['nombre']; ?></td>
						 <td><?Php if($row['status'] == 1){ echo 'Pendiente'; }else{ echo 'Atendido'; } ?></td>
						  <td>
							
							<i class="fa fa-info-circle" data-rel="tooltip" data-placement="top"  title="ver cita" style="cursor:pointer" onclick="cita_paciente(<?= $row['id'];?>)"></i>
							&nbsp;

							<?php									
							if ($permisos[$editar]['status'] == 1 ){ 
							?>
							
							<i title="Editar" data-rel="tooltip" data-placement="top"  style="cursor:pointer" class="fa fa-edit" data-rel="tooltip" data-placement="top"  onclick="editar_cita(<?= $row['id'];?>)"></i>
							&nbsp;
							<?php	
								}else{
							?>
							
							<i class="fa fa-edit" title="editar "data-rel="tooltip" data-placement="top"  onclick="editar_permiso()"></i>
							&nbsp;
							<?php	
								}
							?>			
							
							<?php									
							if ($permisos[$borrar]['status'] == 1 ){ 
							?>
							
							<i title="Eliminar" data-rel="tooltip" data-placement="top"  style="cursor:pointer" class="fa fa-trash-o" onclick="eliminar(<?= $row['id'];?>, '<?= base_url(); ?>citas/eliminar')"></i>

							<?php	
								}else{
							?>
							
							<i class="fa fa-trash-o" title="editar" data-rel="tooltip" data-placement="top"  onclick="eliminar_permiso()"></i>

							<?php	
								}
							?>			
						   </td>			

						 </tr>
									<?php }} ?>
		
                     </tbody>
                    <tfoot>
                      <tr>
						<th>#</th>
						<th>Fecha / Hora</th>
						<th>Doctor</th>
						<th>Especialidad</th>
						<th>Status</th>
						<th>Opciones</th>
                      </tr>
                    </tfoot>
                  </table>

				  	<!-- page script -->
    <script type="text/javascript">
	
      $(document).ready(function () {
	
        $("#citas_table").dataTable({});

		 oTable = $('#citas_table').dataTable();
		 
		 $('#buscar_table').keyup(function(){ oTable.fnFilter( $(this).val() )});

		$('body').on('hidden.bs.modal', '.modal', function (e) {
			$(e.target).removeData("bs.modal").find(".modal-body").empty(); 
		});		 
		
		$('[data-rel=tooltip]').tooltip();
		$('[data-rel=popover]').popover({html:true});
				
      });	
	 	
    </script>



