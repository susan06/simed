  <table id="doctores_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
						<th>Doctor</th>
						<th>RIF</th>
						<th><center>Agenda</center></th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php if(is_array($doctores) && count($doctores) ){
						$numero=1;
						foreach($doctores as $row){ ?>
							<tr>
		  
						  <td><?=  $numero++ ?></td>
						  <td><?=  $row['pnombre']; ?> <?php echo $row['papellido']; ?></td>
						  <td><?=  $row['rif']; ?></td>
						  <td><center><i title="Buscar agenda" data-rel="tooltip" data-placement="top"  style="cursor:pointer" class="fa fa-search" data-rel="tooltip" data-placement="top"  onclick="location.href='<?= base_url(); ?>citas/agenda/<?= $row['id'];?>'"></i></center></td>		
						 </tr>
						<?php }}else{ ?>
						<tr>
						<td colspan="4">Aún no se ha registrado un doctor al sistema</td>
						</tr>
							
						<?php } ?>
		
                     </tbody>
                  </table>
                </div><!-- /.box-body -->



