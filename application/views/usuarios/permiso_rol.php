<div class="col-md-6">	
         <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Terapista</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tr>
                      <th>Módulo</th>
                      <th>Permisos</th>
                    </tr>
					<tr>
                      <td>Terapias <span class="badge bg-green">100%</span></td>
					   <td> 
					   <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                        </div>						
						</td>
                    </tr>
					  <tr>
                      <td>Pacientes <span class="badge bg-green">100%</span></td>
					   <td><div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                        </div></td>
                    </tr>
					<tr>
                      <td>Doctores</td>
					   	<td> &nbsp;<input type="checkbox" disabled checked><span class="text-green">Ver</span>	&nbsp; <input type="checkbox" disabled>Crear	&nbsp; <input type="checkbox" disabled>Editar	&nbsp; <input type="checkbox" disabled>Eliminar</td>
                    </tr>
					<tr>
                      <td>Citas médicas</td>
					   <td>
					    
					   &nbsp;<input type="checkbox" checked disabled><span class="text-green">Ver</span>
					   &nbsp;
					   <?Php if (in_array( 4, $ter_4 )){ 
							   while ($id_permiso = current($ter_4)) {
								if ($id_permiso == 4) {
									$id= key($ter_4);
									}
								}
					   echo '<input type="checkbox" checked id="ter_check_4_4" onClick="check_permiso(ter_check_4_4,ter_4_4,'.$id_permiso.')" /><span class="text-green" id="ter_4_4">Crear</span>'; 
					   }else{ echo '<input type="checkbox" id="ter_check_4_4" onClick="check(ter_check_4_4,ter_4_4)"/><span id="ter_4_4">Crear</span>'; } ?>
					   
					   &nbsp;<?Php if (in_array( 2, $ter_4 )){ echo '<input type="checkbox" checked/><span class="text-green" id="ter_4_2">Editar</span>'; }else{ echo '<input type="checkbox"/><span id="ter_4_2">Editar</span>'; } ?>
					   &nbsp;<?Php if (in_array( 3, $ter_4 )){ echo '<input type="checkbox" checked/><span class="text-green" id="ter_4_3">Eliminar</span>'; }else{ echo '<input type="checkbox"/><span id="ter_4_3">Eliminar</span>'; } ?>
					   </td>
                    </tr>
					<tr>
                      <td>Sala de espera</td>
					   <td>
					   &nbsp;<input type="checkbox" checked disabled><span class="text-green">Ver</span>
					   &nbsp;<?Php if (in_array( 4, $ter_5 )){ echo '<input type="checkbox" checked/><span class="text-green" id="ter_5_4">Crear</span>'; }else{ echo '<input type="checkbox"/><span id="ter_5_4">Crear</span>'; } ?>
					   &nbsp;<?Php if (in_array( 2, $ter_5 )){ echo '<input type="checkbox" checked/><span class="text-green" id="ter_5_2">Editar</span>'; }else{ echo '<input type="checkbox"/><span id="ter_5_2">Editar</span>'; } ?>
					   &nbsp;<?Php if (in_array( 3, $ter_5 )){ echo '<input type="checkbox" checked/><span class="text-green" id="ter_5_3">Eliminar</span>'; }else{ echo '<input type="checkbox"/><span id="ter_5_3">Eliminar</span>'; } ?>
					   </td>
                    </tr>
					<tr>
                      <td>Consulta médica</td>
						   <td> &nbsp;<input type="checkbox" disabled>Ver	&nbsp; <input type="checkbox" disabled>Crear	&nbsp; <input type="checkbox" disabled>Editar	&nbsp; <input type="checkbox" disabled>Eliminar</td>
                    </tr>
					<tr>
                      <td>Expediente médico</td>
					   <td>
					   &nbsp;<input type="checkbox" checked disabled><span class="text-green">Ver</span>		
					   &nbsp;<?Php if (in_array( 4, $ter_7 )){ echo '<input type="checkbox" checked/><span class="text-green" id="ter_7_4">Crear</span>'; }else{ echo '<input type="checkbox"/><span id="ter_7_4">Crear</span>'; } ?>
					   &nbsp;<?Php if (in_array( 2, $ter_7 )){ echo '<input type="checkbox" checked/><span class="text-green" id="ter_7_2">Editar</span>'; }else{ echo '<input type="checkbox"/><span id="ter_7_2">Editar</span>'; } ?>
					   &nbsp;<?Php if (in_array( 3, $ter_7 )){ echo '<input type="checkbox" checked/><span class="text-green" id="ter_7_3">Eliminar</span>'; }else{ echo '<input type="checkbox"/><span id="ter_7_3">Eliminar</span>'; } ?>
						</td>
                    </tr>					
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
	
	</div><!-- /.col-md-6 -->	