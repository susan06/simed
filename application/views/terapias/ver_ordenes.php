  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
						<th>N° orden</th>
						<th>fecha</th>
						<th><center>Ver</center></th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php if(is_array($ordenes) && count($ordenes) ){
						$numero=1;
						foreach($ordenes as $row){ ?>
							<tr>
		  
						  <td><?=  $numero++ ?></td>
						  <td><?=  $row['id']; ?></td>
						  <td><?= date_format(date_create($row['fecha']), 'd/m/Y'); ?></td>
						  <td><center><i title="Ver orden" data-rel="tooltip" data-placement="top"  style="cursor:pointer" class="fa fa-search" data-rel="tooltip" data-placement="top"  onclick="location.href='<?= base_url(); ?>terapias/ver_orden_terapia/<?= $row['id'];?>'"></i></center></td>		
						 </tr>
						<?php }}else{ ?>
						<tr>
						<td colspan="4">El paciente no tiene ordenes de terapia</td>
						</tr>
							
						<?php } ?>
		
                     </tbody>
                  </table>
                </div><!-- /.box-body -->



