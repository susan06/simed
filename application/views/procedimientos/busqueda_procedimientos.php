<div class="box-header">				 
	<input type="text" id="buscar_table" class="form-control input-sm pull-right" style="width: 200px;" placeholder="Buscar">
</div>

  <table id="procedimientos_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
						<th>Fecha</th>
						<th>Descripción</th>
						<th width="12%"><center>Opciones</center></th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php if(is_array($procedimientos) && count($procedimientos) ){
						$numero=1;
						foreach($procedimientos as $row){ ?>
							<tr>
		  
						  <td><?=  $numero++ ?></td>
						  <td><?=  date_format(date_create($row['fecha_proced']), 'd/m/Y'); ?></td>
						  <td><?=  $row['descrip_proced']; ?></td>
						  <td align="center">
						    <i title="Ver detalles" data-rel="tooltip" data-placement="top"  style="cursor:pointer" class="fa fa-search" data-rel="tooltip" data-placement="top"  onclick="ver_procedimiento(<?= $row['id'];?>)"></i>		
						  	&nbsp;
							<?php									
							if ($permisos[$editar]['status'] == 1 ){ 
							?>
							
							<i title="Editar" data-rel="tooltip" data-placement="top"  style="cursor:pointer" class="fa fa-edit" data-rel="tooltip" data-placement="top"  onclick="editar_procedimiento(<?= $row['id'];?>)"></i>
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
							
							<i title="Eliminar" data-rel="tooltip" data-placement="top"  style="cursor:pointer" class="fa fa-trash-o" onclick="eliminar(<?= $row['id'];?>,<?= $row['expediente_id'];?>, '<?= base_url(); ?>procedimientos/eliminar')"></i>

							<?php	
								}else{
							?>
							
							<i class="fa fa-trash-o" title="eliminar" data-rel="tooltip" data-placement="top"  onclick="eliminar_permiso()"></i>

							<?php	
								}
							?>			
						   </td>						  
						  </td>		
						 </tr>
						<?php }} ?>
		
                     </tbody>
                  </table>
                </div><!-- /.box-body -->

 	<!-- page script -->
    <script type="text/javascript">
	
      $(document).ready(function () {		
	 
        $("#procedimientos_table").dataTable({});

		 oTable = $('#procedimientos_table').dataTable();
		 
		 $('#buscar_table').keyup(function(){ oTable.fnFilter( $(this).val() )});
		
		$('[data-rel=tooltip]').tooltip();
		$('[data-rel=popover]').popover({html:true});	
		
      });	

	  
		  
    </script>

