                  <table id="pacientes_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
						<th width="15%">Fecha / Hora</th>
						<th><center>Paciente / cédula</center></th>
						<th>Doctor</th>
						<th>Especialidad</th>
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
						   <td><?= $row['pnombre'] ?> <?= $row['snombre'] ?> <?= $row['papellido'] ?> <?= $row['sapellido'] ?> <?Php if($row['cedula']){ echo 'C.I. '.$row['cedula']; }  ?></td>
						  <td><?=  $row['nombre_doc']; ?> <?=  $row['apellido_doc']; ?></td>
						  <td><?=  $row['nombre']; ?></td>
						  <td>						
							<a href="<?= base_url();?>sala_espera/agregar_consulta/<?=  $row['id']; ?>">Agregar a Espera</a></i>
						   </td>			
						 </tr>
						<?php }}else{ ?>
						<tr>
						<td colspan="6"><center>No hay citas médicas para hoy</center></td>
						</tr>
							
						<?php } ?>
		
                     </tbody>
                  </table>
        

	
