<div class="col-md-6">	
        
		<form action="<?php echo base_url();?>usuarios/permisos_guardar" method="POST" id="form_permisos">
		
		<div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?= $rol_name ?></h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tr>
                      <th>Módulo</th>
                      <th>Permisos</th>
                    </tr>
					<tr>
                      <td>Terapias <?php if($rol == 4){echo '<span class="badge bg-green">100%</span>';} ?></td>
					   <td> 					   
						<?php if($rol == 4){
							echo '<div class="progress progress-xs progress-striped active"><div class="progress-bar progress-bar-success" style="width: 100%"></div></div>	';} 						                        					
						else{ 
								   
							   if($mod_8[1]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_8[1]['id'] ?>" onclick="check(<?= $mod_8[1]['id'] ?>)" checked><span class="text-green">Ver</span>
								  <input type="hidden" name="terapias[1]" value="<?= $mod_8[1]['id'] ?>" >
								  <input type="hidden" name="status_ter[1]" value="<?= $mod_8[1]['status'] ?>" id="<?= $mod_8[1]['id'] ?>" >
								  
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_8[1]['id'] ?>" onclick="check(<?= $mod_8[1]['id'] ?>)"><span>Ver</span>
								  <input type="hidden" name="terapias[1]" value="<?= $mod_8[1]['id'] ?>">
								 <input type="hidden" name="status_ter[1]" value="<?= $mod_8[1]['status'] ?>" id="<?= $mod_8[1]['id'] ?>" >
								<?Php
								} ?> 	

									   <?Php 
							   if($mod_8[2]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_8[2]['id'] ?>" onclick="check(<?= $mod_8[2]['id'] ?>)" checked><span class="text-green">Editar</span>
								  <input type="hidden" name="terapias[2]" value="<?= $mod_8[2]['id'] ?>" >
								  <input type="hidden" name="status_ter[2]" value="<?= $mod_8[2]['status'] ?>" id="<?= $mod_8[2]['id'] ?>" >
								  
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_8[2]['id'] ?>" onclick="check(<?= $mod_8[2]['id'] ?>)"><span>Editar</span>
								  <input type="hidden" name="terapias[2]" value="<?= $mod_8[2]['id'] ?>">
								 <input type="hidden" name="status_ter[2]" value="<?= $mod_8[2]['status'] ?>" id="<?= $mod_8[2]['id'] ?>" >
							  <?Php } ?>
							  
							  <?Php 
							   if($mod_8[3]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_8[3]['id'] ?>" onclick="check(<?= $mod_8[3]['id'] ?>)" checked><span class="text-green">Eliminar</span>
								  <input type="hidden" name="terapias[3]" value="<?= $mod_8[3]['id'] ?>" >
								   <input type="hidden" name="status_ter[3]" value="<?= $mod_8[3]['status'] ?>" id="<?= $mod_8[3]['id'] ?>" >
								   
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_8[3]['id'] ?>" onclick="check(<?= $mod_8[3]['id'] ?>)"><span>Eliminar</span>
								  <input type="hidden" name="terapias[3]" value="<?= $mod_8[3]['id'] ?>" >
								 <input type="hidden" name="status_ter[3]" value="<?= $mod_8[3]['status'] ?>" id="<?= $mod_8[3]['id'] ?>" >
							  <?Php } ?> 
							  
							  <?Php 
							   if($mod_8[4]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_8[4]['id'] ?>" onclick="check(<?= $mod_8[4]['id'] ?>)" checked><span class="text-green">Crear</span>
								  <input type="hidden" name="terapias[4]" value="<?= $mod_8[4]['id'] ?>" >
								   <input type="hidden" name="status_ter[4]" value="<?= $mod_8[4]['status'] ?>" id="<?= $mod_8[4]['id'] ?>" >
								   
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_8[4]['id'] ?>" onclick="check(<?= $mod_8[4]['id'] ?>)"><span>Crear</span>
								  <input type="hidden" name="terapias[4]" value="<?= $mod_8[4]['id'] ?>" >
								 <input type="hidden" name="status_ter[4]" value="<?= $mod_8[4]['status'] ?>" id="<?= $mod_8[4]['id'] ?>" >
							  <?Php } 	
						}
					   ?>
						</td>
                    </tr>
					  <tr>
                      <td>Pacientes <?php if($rol == 2 || $rol == 4){echo '<span class="badge bg-green">100%</span>';} ?></td>
					   <td>
					   <?php if($rol == 2 || $rol == 4){echo '<div class="progress progress-xs progress-striped active"><div class="progress-bar progress-bar-success" style="width: 100%"></div></div>	';} 						                        					
					  
					  		else{ 
								   
							   if($mod_2[1]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_2[1]['id'] ?>" onclick="check(<?= $mod_2[1]['id'] ?>)" checked><span class="text-green">Ver</span>
								  <input type="hidden" name="pacientes[1]" value="<?= $mod_2[1]['id'] ?>" >
								  <input type="hidden" name="status_pac[1]" value="<?= $mod_2[1]['status'] ?>" id="<?= $mod_2[1]['id'] ?>" >
								  
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_2[1]['id'] ?>" onclick="check(<?= $mod_2[1]['id'] ?>)"><span>Ver</span>
								  <input type="hidden" name="pacientes[1]" value="<?= $mod_2[1]['id'] ?>">
								 <input type="hidden" name="status_pac[1]" value="<?= $mod_2[1]['status'] ?>" id="<?= $mod_2[1]['id'] ?>" >
								<?Php
								} ?> 	

									   <?Php 
							   if($mod_2[2]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_2[2]['id'] ?>" onclick="check(<?= $mod_2[2]['id'] ?>)" checked><span class="text-green">Editar</span>
								  <input type="hidden" name="pacientes[2]" value="<?= $mod_2[2]['id'] ?>" >
								  <input type="hidden" name="status_pac[2]" value="<?= $mod_2[2]['status'] ?>" id="<?= $mod_2[2]['id'] ?>" >
								  
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_2[2]['id'] ?>" onclick="check(<?= $mod_2[2]['id'] ?>)"><span>Editar</span>
								  <input type="hidden" name="pacientes[2]" value="<?= $mod_2[2]['id'] ?>">
								 <input type="hidden" name="status_pac[2]" value="<?= $mod_2[2]['status'] ?>" id="<?= $mod_2[2]['id'] ?>" >
							  <?Php } ?>
							  
							  <?Php 
							   if($mod_2[3]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_2[3]['id'] ?>" onclick="check(<?= $mod_2[3]['id'] ?>)" checked><span class="text-green">Eliminar</span>
								  <input type="hidden" name="pacientes[3]" value="<?= $mod_2[3]['id'] ?>" >
								   <input type="hidden" name="status_pac[3]" value="<?= $mod_2[3]['status'] ?>" id="<?= $mod_2[3]['id'] ?>" >
								   
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_2[3]['id'] ?>" onclick="check(<?= $mod_2[3]['id'] ?>)"><span>Eliminar</span>
								  <input type="hidden" name="pacientes[3]" value="<?= $mod_2[3]['id'] ?>" >
								 <input type="hidden" name="status_pac[3]" value="<?= $mod_2[3]['status'] ?>" id="<?= $mod_2[3]['id'] ?>" >
							  <?Php } ?> 
							  
							  <?Php 
							   if($mod_2[4]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_2[4]['id'] ?>" onclick="check(<?= $mod_2[4]['id'] ?>)" checked><span class="text-green">Crear</span>
								  <input type="hidden" name="pacientes[4]" value="<?= $mod_2[4]['id'] ?>" >
								   <input type="hidden" name="status_pac[4]" value="<?= $mod_2[4]['status'] ?>" id="<?= $mod_2[4]['id'] ?>" >
								   
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_2[4]['id'] ?>" onclick="check(<?= $mod_2[4]['id'] ?>)"><span>Crear</span>
								  <input type="hidden" name="pacientes[4]" value="<?= $mod_2[4]['id'] ?>" >
								 <input type="hidden" name="status_pac[4]" value="<?= $mod_2[4]['status'] ?>" id="<?= $mod_2[4]['id'] ?>" >
							  <?Php } 	
						}
					   ?>
					   </td>
                    </tr>
					<tr>
                      <td>Doctores <?php if($rol == 3){echo '<span class="badge bg-green">80%</span>';} ?></td>
					   	<td>
					   <?php if($rol == 3 ){echo '<div class="progress progress-xs progress-striped active"><div class="progress-bar progress-bar-success" style="width: 80%"></div></div><input type="checkbox" disabled>Eliminar';} 
					   else{ echo '&nbsp;<input type="checkbox" checked disabled><span class="text-green">Ver</span>	&nbsp; <input type="checkbox" disabled>Crear	&nbsp; <input type="checkbox" disabled>Editar	&nbsp; <input type="checkbox" disabled>Eliminar</td>';}
					   ?>						                        											
                    </tr>
					<tr>
                      <td>Citas médicas <?php if($rol == 2 || $rol == 4 || $rol == 5){echo '<span class="badge bg-green">100%</span>';} ?></td>
					   <td>
                          <?php if($rol == 2 || $rol == 4 || $rol == 5){echo '<div class="progress progress-xs progress-striped active"><div class="progress-bar progress-bar-success" style="width: 100%"></div></div>	';} 					                        					
						
							  		else{ 
								   
							   if($mod_4[1]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_4[1]['id'] ?>" onclick="check(<?= $mod_4[1]['id'] ?>)" checked><span class="text-green">Ver</span>
								  <input type="hidden" name="citas[1]" value="<?= $mod_4[1]['id'] ?>" >
								  <input type="hidden" name="status_cit[1]" value="<?= $mod_4[1]['status'] ?>" id="<?= $mod_4[1]['id'] ?>" >
								  
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_4[1]['id'] ?>" onclick="check(<?= $mod_4[1]['id'] ?>)"><span>Ver</span>
								  <input type="hidden" name="citas[1]" value="<?= $mod_4[1]['id'] ?>">
								 <input type="hidden" name="status_cit[1]" value="<?= $mod_4[1]['status'] ?>" id="<?= $mod_4[1]['id'] ?>" >
								<?Php
								} ?> 	

									   <?Php 
							   if($mod_4[2]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_4[2]['id'] ?>" onclick="check(<?= $mod_4[2]['id'] ?>)" checked><span class="text-green">Editar</span>
								  <input type="hidden" name="citas[2]" value="<?= $mod_4[2]['id'] ?>" >
								  <input type="hidden" name="status_cit[2]" value="<?= $mod_4[2]['status'] ?>" id="<?= $mod_4[2]['id'] ?>" >
								  
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_4[2]['id'] ?>" onclick="check(<?= $mod_4[2]['id'] ?>)"><span>Editar</span>
								  <input type="hidden" name="citas[2]" value="<?= $mod_4[2]['id'] ?>">
								 <input type="hidden" name="status_cit[2]" value="<?= $mod_4[2]['status'] ?>" id="<?= $mod_4[2]['id'] ?>" >
							  <?Php } ?>
							  
							  <?Php 
							   if($mod_4[3]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_4[3]['id'] ?>" onclick="check(<?= $mod_4[3]['id'] ?>)" checked><span class="text-green">Eliminar</span>
								  <input type="hidden" name="citas[3]" value="<?= $mod_4[3]['id'] ?>" >
								   <input type="hidden" name="status_cit[3]" value="<?= $mod_4[3]['status'] ?>" id="<?= $mod_4[3]['id'] ?>" >
								   
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_4[3]['id'] ?>" onclick="check(<?= $mod_4[3]['id'] ?>)"><span>Eliminar</span>
								  <input type="hidden" name="citas[3]" value="<?= $mod_4[3]['id'] ?>" >
								 <input type="hidden" name="status_cit[3]" value="<?= $mod_4[3]['status'] ?>" id="<?= $mod_4[3]['id'] ?>" >
							  <?Php } ?> 
							  
							  <?Php 
							   if($mod_4[4]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_4[4]['id'] ?>" onclick="check(<?= $mod_4[4]['id'] ?>)" checked><span class="text-green">Crear</span>
								  <input type="hidden" name="citas[4]" value="<?= $mod_4[4]['id'] ?>" >
								   <input type="hidden" name="status_cit[4]" value="<?= $mod_4[4]['status'] ?>" id="<?= $mod_4[4]['id'] ?>" >
								   
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_4[4]['id'] ?>" onclick="check(<?= $mod_4[4]['id'] ?>)"><span>Crear</span>
								  <input type="hidden" name="citas[4]" value="<?= $mod_4[4]['id'] ?>" >
								 <input type="hidden" name="status_cit[4]" value="<?= $mod_4[4]['status'] ?>" id="<?= $mod_4[4]['id'] ?>" >
							  <?Php } 	
						}
					   ?>
					   
					   </td>
                    </tr>
					<tr>
                      <td>Sala de espera <?php if($rol == 2 || $rol == 4 || $rol == 5){echo '<span class="badge bg-green">100%</span>';} ?></td>
					   <td>
					  <?php if($rol == 2 || $rol == 4 || $rol == 5){echo '<div class="progress progress-xs progress-striped active"><div class="progress-bar progress-bar-success" style="width: 100%"></div></div>	';} 					                        					
							
							else{ 
								   
							   if($mod_5[1]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_5[1]['id'] ?>" onclick="check(<?= $mod_5[1]['id'] ?>)" checked><span class="text-green">Ver</span>
								  <input type="hidden" name="espera[1]" value="<?= $mod_5[1]['id'] ?>" >
								  <input type="hidden" name="status_esp[1]" value="<?= $mod_5[1]['status'] ?>" id="<?= $mod_5[1]['id'] ?>" >
								  
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_5[1]['id'] ?>" onclick="check(<?= $mod_5[1]['id'] ?>)"><span>Ver</span>
								  <input type="hidden" name="espera[1]" value="<?= $mod_5[1]['id'] ?>">
								 <input type="hidden" name="status_esp[1]" value="<?= $mod_5[1]['status'] ?>" id="<?= $mod_5[1]['id'] ?>" >
								<?Php
								} ?> 	

									   <?Php 
							   if($mod_5[2]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_5[2]['id'] ?>" onclick="check(<?= $mod_5[2]['id'] ?>)" checked><span class="text-green">Editar</span>
								  <input type="hidden" name="espera[2]" value="<?= $mod_5[2]['id'] ?>" >
								  <input type="hidden" name="status_esp[2]" value="<?= $mod_5[2]['status'] ?>" id="<?= $mod_5[2]['id'] ?>" >
								  
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_5[2]['id'] ?>" onclick="check(<?= $mod_5[2]['id'] ?>)"><span>Editar</span>
								  <input type="hidden" name="espera[2]" value="<?= $mod_5[2]['id'] ?>">
								 <input type="hidden" name="status_esp[2]" value="<?= $mod_5[2]['status'] ?>" id="<?= $mod_5[2]['id'] ?>" >
							  <?Php } ?>
							  
							  <?Php 
							   if($mod_5[3]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_5[3]['id'] ?>" onclick="check(<?= $mod_5[3]['id'] ?>)" checked><span class="text-green">Eliminar</span>
								  <input type="hidden" name="espera[3]" value="<?= $mod_5[3]['id'] ?>" >
								   <input type="hidden" name="status_esp[3]" value="<?= $mod_5[3]['status'] ?>" id="<?= $mod_5[3]['id'] ?>" >
								   
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_5[3]['id'] ?>" onclick="check(<?= $mod_5[3]['id'] ?>)"><span>Eliminar</span>
								  <input type="hidden" name="espera[3]" value="<?= $mod_5[3]['id'] ?>" >
								 <input type="hidden" name="status_esp[3]" value="<?= $mod_5[3]['status'] ?>" id="<?= $mod_5[3]['id'] ?>" >
							  <?Php } ?> 
							  
							  <?Php 
							   if($mod_5[4]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_5[4]['id'] ?>" onclick="check(<?= $mod_5[4]['id'] ?>)" checked><span class="text-green">Crear</span>
								  <input type="hidden" name="espera[4]" value="<?= $mod_5[4]['id'] ?>" >
								   <input type="hidden" name="status_esp[4]" value="<?= $mod_5[4]['status'] ?>" id="<?= $mod_5[4]['id'] ?>" >
								   
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_5[4]['id'] ?>" onclick="check(<?= $mod_5[4]['id'] ?>)"><span>Crear</span>
								  <input type="hidden" name="espera[4]" value="<?= $mod_5[4]['id'] ?>" >
								 <input type="hidden" name="status_esp[4]" value="<?= $mod_5[4]['status'] ?>" id="<?= $mod_5[4]['id'] ?>" >
							  <?Php } 	
						}
					   ?>
						
						
					 </td>
                    </tr>
					<tr>
                      <td>Especialidades</td>
					   <td>
					  <?php 							   
							   if($mod_10[1]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_10[1]['id'] ?>" onclick="check(<?= $mod_10[1]['id'] ?>)" checked><span class="text-green">Ver</span>
								  <input type="hidden" name="especialidades[1]" value="<?= $mod_10[1]['id'] ?>" >
								  <input type="hidden" name="status_espec[1]" value="<?= $mod_10[1]['status'] ?>" id="<?= $mod_10[1]['id'] ?>" >
								  
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_10[1]['id'] ?>" onclick="check(<?= $mod_10[1]['id'] ?>)"><span>Ver</span>
								  <input type="hidden" name="especialidades[1]" value="<?= $mod_10[1]['id'] ?>">
								 <input type="hidden" name="status_espec[1]" value="<?= $mod_10[1]['status'] ?>" id="<?= $mod_10[1]['id'] ?>" >
								<?Php
								} ?> 	

									   <?Php 
							   if($mod_10[2]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_10[2]['id'] ?>" onclick="check(<?= $mod_10[2]['id'] ?>)" checked><span class="text-green">Editar</span>
								  <input type="hidden" name="especialidades[2]" value="<?= $mod_10[2]['id'] ?>" >
								  <input type="hidden" name="status_espec[2]" value="<?= $mod_10[2]['status'] ?>" id="<?= $mod_10[2]['id'] ?>" >
								  
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_10[2]['id'] ?>" onclick="check(<?= $mod_10[2]['id'] ?>)"><span>Editar</span>
								  <input type="hidden" name="especialidades[2]" value="<?= $mod_10[2]['id'] ?>">
								 <input type="hidden" name="status_espec[2]" value="<?= $mod_10[2]['status'] ?>" id="<?= $mod_10[2]['id'] ?>" >
							  <?Php } ?>
							  
							  <?Php 
							   if($mod_10[3]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_10[3]['id'] ?>" onclick="check(<?= $mod_10[3]['id'] ?>)" checked><span class="text-green">Eliminar</span>
								  <input type="hidden" name="especialidades[3]" value="<?= $mod_10[3]['id'] ?>" >
								   <input type="hidden" name="status_espec[3]" value="<?= $mod_10[3]['status'] ?>" id="<?= $mod_10[3]['id'] ?>" >
								   
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_10[3]['id'] ?>" onclick="check(<?= $mod_10[3]['id'] ?>)"><span>Eliminar</span>
								  <input type="hidden" name="especialidades[3]" value="<?= $mod_10[3]['id'] ?>" >
								 <input type="hidden" name="status_espec[3]" value="<?= $mod_10[3]['status'] ?>" id="<?= $mod_10[3]['id'] ?>" >
							  <?Php } ?> 
							  
							  <?Php 
							   if($mod_10[4]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_10[4]['id'] ?>" onclick="check(<?= $mod_10[4]['id'] ?>)" checked><span class="text-green">Crear</span>
								  <input type="hidden" name="especialidades[4]" value="<?= $mod_5[4]['id'] ?>" >
								   <input type="hidden" name="status_espec[4]" value="<?= $mod_5[4]['status'] ?>" id="<?= $mod_10[4]['id'] ?>" >
								   
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_10[4]['id'] ?>" onclick="check(<?= $mod_10[4]['id'] ?>)"><span>Crear</span>
								  <input type="hidden" name="especialidades[4]" value="<?= $mod_10[4]['id'] ?>" >
								 <input type="hidden" name="status_espec[4]" value="<?= $mod_10[4]['status'] ?>" id="<?= $mod_10[4]['id'] ?>" >
							  <?Php } 	 ?>
						
						
					 </td>
                    </tr>					
					<tr>
                      <td>Consulta médica <?php if($rol == 3){echo '<span class="badge bg-green">100%</span>';} ?></td>
						   <td> 
						  <?php if($rol == 3 ){echo '<div class="progress progress-xs progress-striped active"><div class="progress-bar progress-bar-success" style="width: 100%"></div></div>	';} 
					   else{ echo '&nbsp;<input type="checkbox" disabled>Ver	&nbsp; <input type="checkbox" disabled>Crear	&nbsp; <input type="checkbox" disabled>Editar	&nbsp; <input type="checkbox" disabled>Eliminar';}
					   ?>
						  </td>
                    </tr>
					<tr>
                      <td>Expediente médico</td>
					   <td>
					      					   
						<?php if($mod_7[1]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_7[1]['id'] ?>" onclick="check(<?= $mod_7[1]['id'] ?>)" checked><span class="text-green">Ver</span>
								  <input type="hidden" name="expediente[1]" value="<?= $mod_7[1]['id'] ?>" >
								  <input type="hidden" name="status_exp[1]" value="<?= $mod_7[1]['status'] ?>" id="<?= $mod_7[1]['id'] ?>" >
								  
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_7[1]['id'] ?>" onclick="check(<?= $mod_7[1]['id'] ?>)"><span>Ver</span>
								  <input type="hidden" name="expediente[1]" value="<?= $mod_7[1]['id'] ?>">
								 <input type="hidden" name="status_exp[1]" value="<?= $mod_7[1]['status'] ?>" id="<?= $mod_7[1]['id'] ?>" >
								<?Php
								} ?> 	

									   <?Php 
							   if($mod_7[2]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_7[2]['id'] ?>" onclick="check(<?= $mod_7[2]['id'] ?>)" checked><span class="text-green">Editar</span>
								  <input type="hidden" name="expediente[2]" value="<?= $mod_7[2]['id'] ?>" >
								  <input type="hidden" name="status_exp[2]" value="<?= $mod_7[2]['status'] ?>" id="<?= $mod_7[2]['id'] ?>" >
								  
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_7[2]['id'] ?>" onclick="check(<?= $mod_7[2]['id'] ?>)"><span>Editar</span>
								  <input type="hidden" name="expediente[2]" value="<?= $mod_7[2]['id'] ?>">
								 <input type="hidden" name="status_exp[2]" value="<?= $mod_7[2]['status'] ?>" id="<?= $mod_7[2]['id'] ?>" >
							  <?Php } ?>
							  
							  <?Php 
							   if($mod_7[3]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_7[3]['id'] ?>" onclick="check(<?= $mod_7[3]['id'] ?>)" checked><span class="text-green">Eliminar</span>
								  <input type="hidden" name="expediente[3]" value="<?= $mod_7[3]['id'] ?>" >
								   <input type="hidden" name="status_exp[3]" value="<?= $mod_7[3]['status'] ?>" id="<?= $mod_7[3]['id'] ?>" >
								   
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_7[3]['id'] ?>" onclick="check(<?= $mod_7[3]['id'] ?>)"><span>Eliminar</span>
								  <input type="hidden" name="expediente[3]" value="<?= $mod_7[3]['id'] ?>" >
								 <input type="hidden" name="status_exp[3]" value="<?= $mod_7[3]['status'] ?>" id="<?= $mod_7[3]['id'] ?>" >
							  <?Php } ?> 
							  
							  <?Php 
							   if($mod_7[4]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_7[4]['id'] ?>" onclick="check(<?= $mod_7[4]['id'] ?>)" checked><span class="text-green">Crear</span>
								  <input type="hidden" name="expediente[4]" value="<?= $mod_7[4]['id'] ?>" >
								   <input type="hidden" name="status_exp[4]" value="<?= $mod_7[4]['status'] ?>" id="<?= $mod_7[4]['id'] ?>" >
								   
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_7[4]['id'] ?>" onclick="check(<?= $mod_7[4]['id'] ?>)"><span>Crear</span>
								  <input type="hidden" name="expediente[4]" value="<?= $mod_7[4]['id'] ?>" >
								 <input type="hidden" name="status_exp[4]" value="<?= $mod_7[4]['status'] ?>" id="<?= $mod_7[4]['id'] ?>" >
							  <?Php }  ?>
					   
						</td>
                    </tr>
					<tr>
                      <td>Clínica</td>
					   <td>
					    	<?Php 
							   if($mod_11[2]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_11[2]['id'] ?>" onclick="check(<?= $mod_11[2]['id'] ?>)" checked><span class="text-green">Editar</span>
								  <input type="hidden" name="clinica[2]" value="<?= $mod_11[2]['id'] ?>" >
								  <input type="hidden" name="status_cli[2]" value="<?= $mod_11[2]['status'] ?>" id="<?= $mod_11[2]['id'] ?>" >
								  
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_11[2]['id'] ?>" onclick="check(<?= $mod_11[2]['id'] ?>)"><span>Editar</span>
								  <input type="hidden" name="clinica[2]" value="<?= $mod_11[2]['id'] ?>">
								 <input type="hidden" name="status_cli[2]" value="<?= $mod_11[2]['status'] ?>" id="<?= $mod_11[2]['id'] ?>" >
							  <?Php } ?>
						</td>
                    </tr>
					<tr>
                      <td>Procedimientos</td>
					   <td> 					   
						<?php if($mod_12[1]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_12[1]['id'] ?>" onclick="check(<?= $mod_12[1]['id'] ?>)" checked><span class="text-green">Ver</span>
								  <input type="hidden" name="procedimientos[1]" value="<?= $mod_12[1]['id'] ?>" >
								  <input type="hidden" name="status_pro[1]" value="<?= $mod_12[1]['status'] ?>" id="<?= $mod_12[1]['id'] ?>" >
								  
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_12[1]['id'] ?>" onclick="check(<?= $mod_12[1]['id'] ?>)"><span>Ver</span>
								  <input type="hidden" name="procedimientos[1]" value="<?= $mod_12[1]['id'] ?>">
								 <input type="hidden" name="status_pro[1]" value="<?= $mod_12[1]['status'] ?>" id="<?= $mod_12[1]['id'] ?>" >
								<?Php
								} ?> 	

									   <?Php 
							   if($mod_12[2]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_12[2]['id'] ?>" onclick="check(<?= $mod_12[2]['id'] ?>)" checked><span class="text-green">Editar</span>
								  <input type="hidden" name="procedimientos[2]" value="<?= $mod_12[2]['id'] ?>" >
								  <input type="hidden" name="status_pro[2]" value="<?= $mod_12[2]['status'] ?>" id="<?= $mod_12[2]['id'] ?>" >
								  
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_12[2]['id'] ?>" onclick="check(<?= $mod_12[2]['id'] ?>)"><span>Editar</span>
								  <input type="hidden" name="procedimientos[2]" value="<?= $mod_12[2]['id'] ?>">
								 <input type="hidden" name="status_pro[2]" value="<?= $mod_12[2]['status'] ?>" id="<?= $mod_12[2]['id'] ?>" >
							  <?Php } ?>
							  
							  <?Php 
							   if($mod_12[3]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_12[3]['id'] ?>" onclick="check(<?= $mod_12[3]['id'] ?>)" checked><span class="text-green">Eliminar</span>
								  <input type="hidden" name="procedimientos[3]" value="<?= $mod_12[3]['id'] ?>" >
								   <input type="hidden" name="status_pro[3]" value="<?= $mod_12[3]['status'] ?>" id="<?= $mod_12[3]['id'] ?>" >
								   
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_12[3]['id'] ?>" onclick="check(<?= $mod_12[3]['id'] ?>)"><span>Eliminar</span>
								  <input type="hidden" name="procedimientos[3]" value="<?= $mod_12[3]['id'] ?>" >
								 <input type="hidden" name="status_pro[3]" value="<?= $mod_12[3]['status'] ?>" id="<?= $mod_12[3]['id'] ?>" >
							  <?Php } ?> 
							  
							  <?Php 
							   if($mod_12[4]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_12[4]['id'] ?>" onclick="check(<?= $mod_12[4]['id'] ?>)" checked><span class="text-green">Crear</span>
								  <input type="hidden" name="procedimientos[4]" value="<?= $mod_12[4]['id'] ?>" >
								   <input type="hidden" name="status_pro[4]" value="<?= $mod_12[4]['status'] ?>" id="<?= $mod_12[4]['id'] ?>" >
								   
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_12[4]['id'] ?>" onclick="check(<?= $mod_12[4]['id'] ?>)"><span>Crear</span>
								  <input type="hidden" name="procedimientos[4]" value="<?= $mod_12[4]['id'] ?>" >
								 <input type="hidden" name="status_pro[4]" value="<?= $mod_12[4]['status'] ?>" id="<?= $mod_12[4]['id'] ?>" >
							  <?Php } 	 ?>
						</td>
                    </tr>
					<tr>
                      <td>Exámenes</td>
					   <td> 					   
						<?php if($mod_13[1]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_13[1]['id'] ?>" onclick="check(<?= $mod_13[1]['id'] ?>)" checked><span class="text-green">Ver</span>
								  <input type="hidden" name="examenes[1]" value="<?= $mod_13[1]['id'] ?>" >
								  <input type="hidden" name="status_exam[1]" value="<?= $mod_13[1]['status'] ?>" id="<?= $mod_13[1]['id'] ?>" >
								  
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_13[1]['id'] ?>" onclick="check(<?= $mod_13[1]['id'] ?>)"><span>Ver</span>
								  <input type="hidden" name="examenes[1]" value="<?= $mod_13[1]['id'] ?>">
								 <input type="hidden" name="status_exam[1]" value="<?= $mod_13[1]['status'] ?>" id="<?= $mod_13[1]['id'] ?>" >
								<?Php
								} ?> 	

									   <?Php 
							   if($mod_13[2]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_13[2]['id'] ?>" onclick="check(<?= $mod_13[2]['id'] ?>)" checked><span class="text-green">Editar</span>
								  <input type="hidden" name="examenes[2]" value="<?= $mod_13[2]['id'] ?>" >
								  <input type="hidden" name="status_exam[2]" value="<?= $mod_13[2]['status'] ?>" id="<?= $mod_13[2]['id'] ?>" >
								  
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_13[2]['id'] ?>" onclick="check(<?= $mod_13[2]['id'] ?>)"><span>Editar</span>
								  <input type="hidden" name="examenes[2]" value="<?= $mod_13[2]['id'] ?>">
								 <input type="hidden" name="status_exam[2]" value="<?= $mod_13[2]['status'] ?>" id="<?= $mod_13[2]['id'] ?>" >
							  <?Php } ?>
							  
							  <?Php 
							   if($mod_13[3]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_13[3]['id'] ?>" onclick="check(<?= $mod_13[3]['id'] ?>)" checked><span class="text-green">Eliminar</span>
								  <input type="hidden" name="examenes[3]" value="<?= $mod_13[3]['id'] ?>" >
								   <input type="hidden" name="status_exam[3]" value="<?= $mod_13[3]['status'] ?>" id="<?= $mod_13[3]['id'] ?>" >
								   
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_13[3]['id'] ?>" onclick="check(<?= $mod_13[3]['id'] ?>)"><span>Eliminar</span>
								  <input type="hidden" name="examenes[3]" value="<?= $mod_13[3]['id'] ?>" >
								 <input type="hidden" name="status_exam[3]" value="<?= $mod_13[3]['status'] ?>" id="<?= $mod_13[3]['id'] ?>" >
							  <?Php } ?> 
							  
							  <?Php 
							   if($mod_13[4]['status']==1){ ?>
								  
								  &nbsp;<input type="checkbox" id="check<?= $mod_13[4]['id'] ?>" onclick="check(<?= $mod_13[4]['id'] ?>)" checked><span class="text-green">Crear</span>
								  <input type="hidden" name="examenes[4]" value="<?= $mod_13[4]['id'] ?>" >
								   <input type="hidden" name="status_exam[4]" value="<?= $mod_13[4]['status'] ?>" id="<?= $mod_13[4]['id'] ?>" >
								   
							  <?Php  }else{  ?>
							   
							   &nbsp;<input type="checkbox" id="check<?= $mod_13[4]['id'] ?>" onclick="check(<?= $mod_13[4]['id'] ?>)"><span>Crear</span>
								  <input type="hidden" name="examenes[4]" value="<?= $mod_13[4]['id'] ?>" >
								 <input type="hidden" name="status_exam[4]" value="<?= $mod_13[4]['status'] ?>" id="<?= $mod_13[4]['id'] ?>" >
							  <?Php }  ?>
						</td>
                    </tr>					
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			  
		<div class="row">
			
			<input type="hidden" name="rol_id" id="rol_id" value="<?= $rol ?>">

							<div class="pull-right col-xs-4">
							  <button type="submit" class="btn btn-success btn-block btn-flat" id="boton_submit2">Guardar cambios</button>
							</div><!-- /.col -->
			
			</div>
			
			</form>  
			
	</div><!-- /.col-md-6 -->	