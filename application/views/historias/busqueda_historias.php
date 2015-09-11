<div class="box-header">				 
	<input type="text" id="buscar_table" class="form-control input-sm pull-right" style="width: 200px;" placeholder="Buscar">
</div>

  <table id="historias_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>N°</th>
						<th>Fecha</th>
						<th>Doctor</th>
						<th>N° de archivo</th>
						<th width="12%"><center>Opciones</center></th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php if(is_array($historias) && count($historias) ){
						
						foreach($historias as $row){ ?>
							<tr>
		  
						  <td><?=  $row['id']; ?></td>
						  <td><?=  date_format(date_create($row['fecha']), 'd/m/Y'); ?></td>
						  <td><?=  $row['nombre_doc']; ?> <?=  $row['apellido_doc']; ?></td>
						  <td><?=  $row['ubicacion']; ?></td>
						  <td align="center">
						    <i title="Ubicación de archivo" data-rel="tooltip" data-placement="top"  style="cursor:pointer" class="fa  fa-file-archive-o" data-rel="tooltip" data-placement="top"  onclick="editar_historia(<?= $row['id'];?>)"></i>									
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
	 
        $("#historias_table").dataTable({});

		 oTable = $('#examenes_table').dataTable();
		 
		 $('#buscar_table').keyup(function(){ oTable.fnFilter( $(this).val() )});
		
		$('[data-rel=tooltip]').tooltip();
		$('[data-rel=popover]').popover({html:true});	
		
      });	

		  
    </script>

