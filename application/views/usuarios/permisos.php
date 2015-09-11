	<?php $this->load->view('layouts/doctype.php');	 ?>	

    <div class="wrapper">
	
	<?php $this->load->view('layouts/header.php');	 ?>	
	<?php $this->load->view('layouts/menu.php');	 ?>	
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Usuarios<small> | Permisos</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
			
			<?php if($this->session->flashdata('warning') != ''): ?>
					  <div class="alert alert-warning alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Advertencia!</h4>
							<?php echo $this->session->flashdata('warning'); ?>
					  </div>
				<?php endif;?>
				
				<?php if($this->session->flashdata('error') != ''): ?>
					  <div class="alert alert-danger alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-ban"></i> Error!</h4>
							<?php echo $this->session->flashdata('error'); ?>
					  </div>
				<?php endif;?>
				
				<?php if($this->session->flashdata('info') != ''): ?>
					  <div class="alert alert-info alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-info"></i> Información!</h4>
							<?php echo $this->session->flashdata('info'); ?>
					  </div>
				<?php endif;?>
		
		 <div class="row">
						  <div class="form-group has-feedback col-xs-4">
							<label>Seleccione Usuario</label>	
								<select class="form-control" onchange="get_permisos(this.value)">
								  <option value="1" <?php if($this->session->flashdata('rol_load') == 1){ echo 'selected';} ?>>Administrador</option>
								 <option value="2"   <?php if($this->session->flashdata('rol_load') == 2){ echo 'selected';} ?>>Enfermera</option>
								  <option value="3"  <?php if($this->session->flashdata('rol_load') == 3){ echo 'selected';} ?>>Doctor</option>
								  <option value="4"  <?php if($this->session->flashdata('rol_load') == 4){ echo 'selected';} ?> >Terapista</option>
								  <option value="5" <?php if($this->session->flashdata('rol_load') == 5){ echo 'selected';} ?>>Secretaria</option>
								</select>
							</div>
	   </div>
						  
		 <div class="row" id="permisos_rol"><!-- row -->
		
		<form action="<?php echo base_url();?>usuarios/permisos_admin" method="POST">
		
		<div class="col-md-6">
		
			  	<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Administrador</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tr>
                      <th>Módulo</th>
                      <th>Permisos</th>
                    </tr>	
					<tr>
                      <td>Usuarios <span class="badge bg-green">100%</span></td>
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
                      <td>Especialidades <span class="badge bg-green">100%</span></td>
					   <td><div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                        </div></td>
                    </tr>
					<tr>
                      <td>Citas médicas <span class="badge bg-green">100%</span></td>
					   <td><div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                        </div></td>
                    </tr>
					<tr>
                      <td>Sala de espera <span class="badge bg-green">100%</span></td>
					   <td><div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                        </div></td>
                    </tr>
										<tr>
                      <td>Doctores <span class="badge bg-green">50%</span></td>
					   <td> 
					   &nbsp;<input type="checkbox" checked disabled><span class="text-green">Ver</span>
					   &nbsp;<input type="checkbox" checked disabled><span class="text-green">Eliminar</span>
					  <?Php 
					   if($admin_3[2]['status']==1){ ?>
						  
						  &nbsp;<input type="checkbox" id="check<?= $admin_3[2]['id'] ?>" onclick="check(<?= $admin_3[2]['id'] ?>)" checked><span class="text-green">Editar</span>
						  <input type="hidden" name="doctores[2]" value="<?= $admin_3[2]['id'] ?>" >
						  <input type="hidden" name="status_doc[2]" value="<?= $admin_3[2]['status'] ?>" id="<?= $admin_3[2]['id'] ?>" >
						  
					  <?Php  }else{  ?>
					   
					   &nbsp;<input type="checkbox" id="check<?= $admin_3[2]['id'] ?>" onclick="check(<?= $admin_3[2]['id'] ?>)"><span>Editar</span>
						  <input type="hidden" name="doctores[2]" value="<?= $admin_3[2]['id'] ?>">
						 <input type="hidden" name="status_doc[2]" value="<?= $admin_3[2]['status'] ?>" id="<?= $admin_3[2]['id'] ?>" >
					  <?Php } ?>
					  
					  <?Php 
					   if($admin_3[4]['status']==1){ ?>
						  
						  &nbsp;<input type="checkbox" id="check<?= $admin_3[4]['id'] ?>" onclick="check(<?= $admin_3[4]['id'] ?>)" checked><span class="text-green">Editar</span>
						  <input type="hidden" name="doctores[4]" value="<?= $admin_3[4]['id'] ?>" >
						   <input type="hidden" name="status_doc[4]" value="<?= $admin_3[4]['status'] ?>" id="<?= $admin_3[4]['id'] ?>" >
						   
					  <?Php  }else{  ?>
					   
					   &nbsp;<input type="checkbox" id="check<?= $admin_3[4]['id'] ?>" onclick="check(<?= $admin_3[4]['id'] ?>)"><span>Editar</span>
						  <input type="hidden" name="doctores[4]" value="<?= $admin_3[4]['id'] ?>" >
					     <input type="hidden" name="status_doc[4]" value="<?= $admin_3[4]['status'] ?>" id="<?= $admin_3[4]['id'] ?>" >
					  <?Php } ?> 

					   </td>
                    </tr>
					<tr>
                      <td>Consulta médica</td>
					   <td> &nbsp;<input type="checkbox" disabled>Ver	&nbsp; <input type="checkbox" disabled>Crear	&nbsp; <input type="checkbox" disabled>Editar	&nbsp; <input type="checkbox" disabled>Eliminar</td>
                    </tr>
					<tr>
                      <td>Expediente médico</td>
					  <td>
					   <?Php 
					   if($admin_7[1]['status']==1){ ?>
						  
						  &nbsp;<input type="checkbox" id="check<?= $admin_7[1]['id'] ?>" onclick="check(<?= $admin_7[1]['id'] ?>)" checked><span class="text-green">Ver</span>
						  <input type="hidden" name="expediente[1]" value="<?= $admin_7[1]['id'] ?>" >
						  <input type="hidden" name="status_exp[1]" value="<?= $admin_7[1]['status'] ?>" id="<?= $admin_7[1]['id'] ?>" >
						  
					  <?Php  }else{  ?>
					   
					   &nbsp;<input type="checkbox" id="check<?= $admin_7[1]['id'] ?>" onclick="check(<?= $admin_7[1]['id'] ?>)"><span>Ver</span>
						  <input type="hidden" name="expediente[1]" value="<?= $admin_7[1]['id'] ?>">
						 <input type="hidden" name="status_exp[1]" value="<?= $admin_7[1]['status'] ?>" id="<?= $admin_7[1]['id'] ?>" >
					  <?Php } ?>

					   <?Php 
					   if($admin_7[2]['status']==1){ ?>
						  
						  &nbsp;<input type="checkbox" id="check<?= $admin_7[2]['id'] ?>" onclick="check(<?= $admin_7[2]['id'] ?>)" checked><span class="text-green">Editar</span>
						  <input type="hidden" name="expediente[2]" value="<?= $admin_7[2]['id'] ?>" >
						  <input type="hidden" name="status_exp[2]" value="<?= $admin_7[2]['status'] ?>" id="<?= $admin_7[2]['id'] ?>" >
						  
					  <?Php  }else{  ?>
					   
					   &nbsp;<input type="checkbox" id="check<?= $admin_7[2]['id'] ?>" onclick="check(<?= $admin_7[2]['id'] ?>)"><span>Editar</span>
						  <input type="hidden" name="expediente[2]" value="<?= $admin_7[2]['id'] ?>">
						 <input type="hidden" name="status_exp[2]" value="<?= $admin_7[2]['status'] ?>" id="<?= $admin_7[2]['id'] ?>" >
					  <?Php } ?>
					  
					  <?Php 
					   if($admin_7[3]['status']==1){ ?>
						  
						  &nbsp;<input type="checkbox" id="check<?= $admin_7[3]['id'] ?>" onclick="check(<?= $admin_7[3]['id'] ?>)" checked><span class="text-green">Eliminar</span>
						  <input type="hidden" name="expediente[3]" value="<?= $admin_7[3]['id'] ?>" >
						   <input type="hidden" name="status_exp[3]" value="<?= $admin_7[3]['status'] ?>" id="<?= $admin_7[3]['id'] ?>" >
						   
					  <?Php  }else{  ?>
					   
					   &nbsp;<input type="checkbox" id="check<?= $admin_7[3]['id'] ?>" onclick="check(<?= $admin_7[3]['id'] ?>)"><span>Eliminar</span>
						  <input type="hidden" name="expediente[3]" value="<?= $admin_7[3]['id'] ?>" >
					     <input type="hidden" name="status_exp[3]" value="<?= $admin_7[3]['status'] ?>" id="<?= $admin_7[3]['id'] ?>" >
					  <?Php } ?> 
					  
					  <?Php 
					   if($admin_7[4]['status']==1){ ?>
						  
						  &nbsp;<input type="checkbox" id="check<?= $admin_7[4]['id'] ?>" onclick="check(<?= $admin_7[4]['id'] ?>)" checked><span class="text-green">Crear</span>
						  <input type="hidden" name="expediente[4]" value="<?= $admin_7[4]['id'] ?>" >
						   <input type="hidden" name="status_exp[4]" value="<?= $admin_7[4]['status'] ?>" id="<?= $admin_7[3]['id'] ?>" >
						   
					  <?Php  }else{  ?>
					   
					   &nbsp;<input type="checkbox" id="check<?= $admin_7[4]['id'] ?>" onclick="check(<?= $admin_7[4]['id'] ?>)"><span>Crear</span>
						  <input type="hidden" name="expediente[4]" value="<?= $admin_7[4]['id'] ?>" >
					     <input type="hidden" name="status_exp[4]" value="<?= $admin_7[4]['status'] ?>" id="<?= $admin_7[4]['id'] ?>" >
					  <?Php } ?> 
					   </td>
					   
                    </tr>
					<tr>
                      <td>Terapias</td>
					   <td>
					     <?Php 
					   if($admin_8[1]['status']==1){ ?>
						  
						  &nbsp;<input type="checkbox" id="check<?= $admin_8[1]['id'] ?>" onclick="check(<?= $admin_8[1]['id'] ?>)" checked><span class="text-green">Ver</span>
						  <input type="hidden" name="terapias[1]" value="<?= $admin_8[1]['id'] ?>" >
						  <input type="hidden" name="status_ter[1]" value="<?= $admin_8[1]['status'] ?>" id="<?= $admin_8[1]['id'] ?>" >
						  
					  <?Php  }else{  ?>
					   
					   &nbsp;<input type="checkbox" id="check<?= $admin_8[1]['id'] ?>" onclick="check(<?= $admin_8[1]['id'] ?>)"><span>Ver</span>
						  <input type="hidden" name="terapias[1]" value="<?= $admin_8[1]['id'] ?>">
						 <input type="hidden" name="status_ter[1]" value="<?= $admin_8[1]['status'] ?>" id="<?= $admin_8[1]['id'] ?>" >
					  <?Php } ?>

					   <?Php 
					   if($admin_8[2]['status']==1){ ?>
						  
						  &nbsp;<input type="checkbox" id="check<?= $admin_8[2]['id'] ?>" onclick="check(<?= $admin_8[2]['id'] ?>)" checked><span class="text-green">Editar</span>
						  <input type="hidden" name="terapias[2]" value="<?= $admin_8[2]['id'] ?>" >
						  <input type="hidden" name="status_ter[2]" value="<?= $admin_8[2]['status'] ?>" id="<?= $admin_8[2]['id'] ?>" >
						  
					  <?Php  }else{  ?>
					   
					   &nbsp;<input type="checkbox" id="check<?= $admin_8[2]['id'] ?>" onclick="check(<?= $admin_8[2]['id'] ?>)"><span>Editar</span>
						  <input type="hidden" name="terapias[2]" value="<?= $admin_8[2]['id'] ?>">
						 <input type="hidden" name="status_ter[2]" value="<?= $admin_8[2]['status'] ?>" id="<?= $admin_8[2]['id'] ?>" >
					  <?Php } ?>
					  
					  <?Php 
					   if($admin_8[3]['status']==1){ ?>
						  
						  &nbsp;<input type="checkbox" id="check<?= $admin_8[3]['id'] ?>" onclick="check(<?= $admin_8[3]['id'] ?>)" checked><span class="text-green">Eliminar</span>
						  <input type="hidden" name="terapias[3]" value="<?= $admin_8[3]['id'] ?>" >
						   <input type="hidden" name="status_ter[3]" value="<?= $admin_8[3]['status'] ?>" id="<?= $admin_8[3]['id'] ?>" >
						   
					  <?Php  }else{  ?>
					   
					   &nbsp;<input type="checkbox" id="check<?= $admin_8[3]['id'] ?>" onclick="check(<?= $admin_8[3]['id'] ?>)"><span>Eliminar</span>
						  <input type="hidden" name="terapias[3]" value="<?= $admin_8[3]['id'] ?>" >
					     <input type="hidden" name="status_ter[3]" value="<?= $admin_8[3]['status'] ?>" id="<?= $admin_8[3]['id'] ?>" >
					  <?Php } ?> 
					  
					  <?Php 
					   if($admin_8[4]['status']==1){ ?>
						  
						  &nbsp;<input type="checkbox" id="check<?= $admin_8[4]['id'] ?>" onclick="check(<?= $admin_8[4]['id'] ?>)" checked><span class="text-green">Crear</span>
						  <input type="hidden" name="terapias[4]" value="<?= $admin_8[4]['id'] ?>" >
						   <input type="hidden" name="status_ter[4]" value="<?= $admin_8[4]['status'] ?>" id="<?= $admin_8[4]['id'] ?>" >
						   
					  <?Php  }else{  ?>
					   
					   &nbsp;<input type="checkbox" id="check<?= $admin_8[4]['id'] ?>" onclick="check(<?= $admin_8[4]['id'] ?>)"><span>Crear</span>
						  <input type="hidden" name="terapias[4]" value="<?= $admin_8[4]['id'] ?>" >
					     <input type="hidden" name="status_ter[4]" value="<?= $admin_8[4]['status'] ?>" id="<?= $admin_8[4]['id'] ?>" >
					  <?Php } ?> 
					   </td>					   
                    </tr>	
					<tr>
                      <td>Procedimientos</td>
					  <td>
					   <?Php 
					   if($admin_12[1]['status']==1){ ?>
						  
						  &nbsp;<input type="checkbox" id="check<?= $admin_12[1]['id'] ?>" onclick="check(<?= $admin_12[1]['id'] ?>)" checked><span class="text-green">Ver</span>
						  <input type="hidden" name="procedimientos[1]" value="<?= $admin_12[1]['id'] ?>" >
						  <input type="hidden" name="status_proce[1]" value="<?= $admin_12[1]['status'] ?>" id="<?= $admin_12[1]['id'] ?>" >
						  
					  <?Php  }else{  ?>
					   
					   &nbsp;<input type="checkbox" id="check<?= $admin_12[1]['id'] ?>" onclick="check(<?= $admin_12[1]['id'] ?>)"><span>Ver</span>
						  <input type="hidden" name="procedimientos[1]" value="<?= $admin_12[1]['id'] ?>">
						 <input type="hidden" name="status_proce[1]" value="<?= $admin_12[1]['status'] ?>" id="<?= $admin_12[1]['id'] ?>" >
					  <?Php } ?>

					   <?Php 
					   if($admin_12[2]['status']==1){ ?>
						  
						  &nbsp;<input type="checkbox" id="check<?= $admin_12[2]['id'] ?>" onclick="check(<?= $admin_12[2]['id'] ?>)" checked><span class="text-green">Editar</span>
						  <input type="hidden" name="procedimientos[2]" value="<?= $admin_12[2]['id'] ?>" >
						  <input type="hidden" name="status_proce[2]" value="<?= $admin_12[2]['status'] ?>" id="<?= $admin_12[2]['id'] ?>" >
						  
					  <?Php  }else{  ?>
					   
					   &nbsp;<input type="checkbox" id="check<?= $admin_12[2]['id'] ?>" onclick="check(<?= $admin_12[2]['id'] ?>)"><span>Editar</span>
						  <input type="hidden" name="procedimientos[2]" value="<?= $admin_12[2]['id'] ?>">
						 <input type="hidden" name="status_proce[2]" value="<?= $admin_12[2]['status'] ?>" id="<?= $admin_12[2]['id'] ?>" >
					  <?Php } ?>
					  
					  <?Php 
					   if($admin_12[3]['status']==1){ ?>
						  
						  &nbsp;<input type="checkbox" id="check<?= $admin_12[3]['id'] ?>" onclick="check(<?= $admin_12[3]['id'] ?>)" checked><span class="text-green">Eliminar</span>
						  <input type="hidden" name="procedimientos[3]" value="<?= $admin_12[3]['id'] ?>" >
						   <input type="hidden" name="status_proce[3]" value="<?= $admin_12[3]['status'] ?>" id="<?= $admin_12[3]['id'] ?>" >
						   
					  <?Php  }else{  ?>
					   
					   &nbsp;<input type="checkbox" id="check<?= $admin_12[3]['id'] ?>" onclick="check(<?= $admin_12[3]['id'] ?>)"><span>Eliminar</span>
						  <input type="hidden" name="procedimientos[3]" value="<?= $admin_12[3]['id'] ?>" >
					     <input type="hidden" name="status_proce[3]" value="<?= $admin_12[3]['status'] ?>" id="<?= $admin_12[3]['id'] ?>" >
					  <?Php } ?> 
					  
					  <?Php 
					   if($admin_12[4]['status']==1){ ?>
						  
						  &nbsp;<input type="checkbox" id="check<?= $admin_12[4]['id'] ?>" onclick="check(<?= $admin_12[4]['id'] ?>)" checked><span class="text-green">Crear</span>
						  <input type="hidden" name="procedimientos[4]" value="<?= $admin_12[4]['id'] ?>" >
						   <input type="hidden" name="status_proce[4]" value="<?= $admin_12[4]['status'] ?>" id="<?= $admin_12[4]['id'] ?>" >
						   
					  <?Php  }else{  ?>
					   
					   &nbsp;<input type="checkbox" id="check<?= $admin_12[4]['id'] ?>" onclick="check(<?= $admin_12[4]['id'] ?>)"><span>Crear</span>
						  <input type="hidden" name="procedimientos[4]" value="<?= $admin_12[4]['id'] ?>" >
					     <input type="hidden" name="status_proce[4]" value="<?= $admin_12[4]['status'] ?>" id="<?= $admin_12[4]['id'] ?>" >
					  <?Php } ?> 
					   </td>					   
                    </tr>
					<tr>
                      <td>Exámenes</td>
					  <td>
					   <?Php 
					   if($admin_13[1]['status']==1){ ?>
						  
						  &nbsp;<input type="checkbox" id="check<?= $admin_13[1]['id'] ?>" onclick="check(<?= $admin_13[1]['id'] ?>)" checked><span class="text-green">Ver</span>
						  <input type="hidden" name="examenes[1]" value="<?= $admin_13[1]['id'] ?>" >
						  <input type="hidden" name="status_exam[1]" value="<?= $admin_13[1]['status'] ?>" id="<?= $admin_13[1]['id'] ?>" >
						  
					  <?Php  }else{  ?>
					   
					   &nbsp;<input type="checkbox" id="check<?= $admin_13[1]['id'] ?>" onclick="check(<?= $admin_13[1]['id'] ?>)"><span>Ver</span>
						  <input type="hidden" name="examenes[1]" value="<?= $admin_13[1]['id'] ?>">
						 <input type="hidden" name="status_exam[1]" value="<?= $admin_13[1]['status'] ?>" id="<?= $admin_13[1]['id'] ?>" >
					  <?Php } ?>

					   <?Php 
					   if($admin_13[2]['status']==1){ ?>
						  
						  &nbsp;<input type="checkbox" id="check<?= $admin_13[2]['id'] ?>" onclick="check(<?= $admin_13[2]['id'] ?>)" checked><span class="text-green">Editar</span>
						  <input type="hidden" name="examenes[2]" value="<?= $admin_13[2]['id'] ?>" >
						  <input type="hidden" name="status_exam[2]" value="<?= $admin_13[2]['status'] ?>" id="<?= $admin_13[2]['id'] ?>" >
						  
					  <?Php  }else{  ?>
					   
					   &nbsp;<input type="checkbox" id="check<?= $admin_13[2]['id'] ?>" onclick="check(<?= $admin_13[2]['id'] ?>)"><span>Editar</span>
						  <input type="hidden" name="examenes[2]" value="<?= $admin_13[2]['id'] ?>">
						 <input type="hidden" name="status_exam[2]" value="<?= $admin_13[2]['status'] ?>" id="<?= $admin_13[2]['id'] ?>" >
					  <?Php } ?>
					  
					  <?Php 
					   if($admin_13[3]['status']==1){ ?>
						  
						  &nbsp;<input type="checkbox" id="check<?= $admin_13[3]['id'] ?>" onclick="check(<?= $admin_13[3]['id'] ?>)" checked><span class="text-green">Eliminar</span>
						  <input type="hidden" name="examenes[3]" value="<?= $admin_13[3]['id'] ?>" >
						   <input type="hidden" name="status_exam[3]" value="<?= $admin_13[3]['status'] ?>" id="<?= $admin_13[3]['id'] ?>" >
						   
					  <?Php  }else{  ?>
					   
					   &nbsp;<input type="checkbox" id="check<?= $admin_13[3]['id'] ?>" onclick="check(<?= $admin_13[3]['id'] ?>)"><span>Eliminar</span>
						  <input type="hidden" name="examenes[3]" value="<?= $admin_13[3]['id'] ?>" >
					     <input type="hidden" name="status_exam[3]" value="<?= $admin_13[3]['status'] ?>" id="<?= $admin_13[3]['id'] ?>" >
					  <?Php } ?> 
					  
					  <?Php 
					   if($admin_13[4]['status']==1){ ?>
						  
						  &nbsp;<input type="checkbox" id="check<?= $admin_13[4]['id'] ?>" onclick="check(<?= $admin_13[4]['id'] ?>)" checked><span class="text-green">Crear</span>
						  <input type="hidden" name="examenes[4]" value="<?= $admin_13[4]['id'] ?>" >
						   <input type="hidden" name="status_exam[4]" value="<?= $admin_13[4]['status'] ?>" id="<?= $admin_13[4]['id'] ?>" >
						   
					  <?Php  }else{  ?>
					   
					   &nbsp;<input type="checkbox" id="check<?= $admin_13[4]['id'] ?>" onclick="check(<?= $admin_13[4]['id'] ?>)"><span>Crear</span>
						  <input type="hidden" name="examenes[4]" value="<?= $admin_13[4]['id'] ?>" >
					     <input type="hidden" name="status_exam[4]" value="<?= $admin_13[4]['status'] ?>" id="<?= $admin_13[4]['id'] ?>" >
					  <?Php } ?> 
					   </td>
					   
                    </tr>										
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->	
			
			<div class="row">
			
			<input type="hidden" name="rol_id" value="1">

							<div class="pull-right col-xs-4">
							  <button type="submit" class="btn btn-success btn-block btn-flat" id="boton_submit">Guardar cambios</button>
							</div><!-- /.col -->
			</div>
			
			</div><!-- /.col-md-6 -->	
			  
		</form>  
						
		</div><!-- /.row -->	  

			
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
	  
	  <?php $this->load->view('layouts/footer.php');	 ?>
 
    </div><!-- ./wrapper -->

   <!-- jQuery -->
    <script src="<?=base_url()?>assets/plugins/jQuery/jquery-1.11.3.min.js"></script>
	<!-- jQuery UI 1.11.2 -->
    <script src="<?=base_url()?>assets/plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>	
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

	<!-- SlimScroll -->
    <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=base_url()?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/app.min.js" type="text/javascript"></script>

	  <!-- all -->
    <script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>

	<!-- page script -->
    <script type="text/javascript">

	  <?php if($this->session->flashdata('rol_load') != ''): ?>
	  
				rol = <?php echo $this->session->flashdata('rol_load') ?>;
				
				window.onload = function() {

                $('#permisos_rol').load('<?= base_url() ?>usuarios/get_permisos_rol/'+rol);
				
                };


     <?php endif;?>
	 
	<!--check NO estan en la BD-->
	function check(id) 
	{ 
	if (document.getElementById('check'+id).checked==true){document.getElementById(id).value=1} 
	if (document.getElementById('check'+id).checked==false){document.getElementById(id).value=0} 
	}
	
	function get_permisos(rol) 
	{ 
		if(rol == 1){
			location.reload();
		}else{
		$('#permisos_rol').load('<?= base_url() ?>usuarios/get_permisos_rol/'+rol);
		}
	}
	
    </script>
	
  </body>
</html>

