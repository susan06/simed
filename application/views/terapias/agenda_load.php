                  <table id="terapias_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
						<th>Paciente - Cédula </th>
						<th>Terapia</th>
						<th>Terapista</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php if(is_array($aplicacion) && count($aplicacion) ){
						$numero=1;
						foreach($aplicacion as $row){ ?>
							<tr>
		  
						  <td><?=  $numero++ ?></td>
						  <td><?= $row['pnombre'] ?> <?= $row['papellido'] ?> - <?= $row['cedula'] ?></td>
						  <td><?=  $row['descripcion']; ?></td>
						  <td><?=  $row['terapista']; ?></td>		

						 </tr>
						<?php }} ?>		
		
                     </tbody>
                    <tfoot>
                      <tr>
						<th>#</th>
						<th>Paciente - Cédula </th>
						<th>Terapia</th>
						<th>Terapista</th>
                      </tr>
                    </tfoot>
                  </table>
 	<!-- page script -->
    <script type="text/javascript">
	
      $(document).ready(function () {		
	 
        $("#terapias_table").dataTable({});

		 oTable = $('#terapias_table').dataTable();
		 
		 $('#buscar_table').keyup(function(){ oTable.fnFilter( $(this).val() )});
				
      });	

    </script>

