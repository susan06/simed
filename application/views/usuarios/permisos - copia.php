	<?php $this->load->view('layouts/doctype.php');	 ?>	
	
  <body class="skin-green-light sidebar-mini">
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
		
		 <div class="row"><!-- row -->
		
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
	
			<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Enfermera</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tr>
                      <th>Módulo</th>
                      <th>Permisos</th>
                    </tr>					 
					<tr>
                      <td>Doctores</td>
					   	<td> &nbsp;<input type="checkbox" disabled checked><span class="text-green">Ver</span>	&nbsp; <input type="checkbox" disabled>Crear	&nbsp; <input type="checkbox" disabled>Editar	&nbsp; <input type="checkbox" disabled>Eliminar</td>
                    </tr>
					 <tr>
                      <td>Pacientes <span class="badge bg-green">100%</span></td>
					   <td><div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                        </div></td>
                    </tr>
					<tr>
                      <td>Citas médicas <span class="badge bg-green">100%</span></td>
					   <td>
					   <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                        </div>
						</td>
                    </tr>
					<tr>
                      <td>Sala de espera</td>
					   <td> &nbsp;<input type="checkbox"/>Ver	&nbsp; <input type="checkbox"/>Crear	&nbsp; <input type="checkbox"/>Editar	&nbsp; <input type="checkbox"/>Eliminar</td>
                    </tr>
					<tr>
                      <td>Consulta médica</td>
					   <td> &nbsp;<input type="checkbox" disabled>Ver	&nbsp; <input type="checkbox" disabled>Crear	&nbsp; <input type="checkbox" disabled>Editar	&nbsp; <input type="checkbox" disabled>Eliminar</td>
					  </tr>
					<tr>
                      <td>Expediente médico</td>
					   <td> &nbsp;<input type="checkbox"/>Ver	&nbsp; <input type="checkbox"/>Crear	&nbsp; <input type="checkbox"/>Editar	&nbsp; <input type="checkbox"/>Eliminar</td>
                    </tr>
					<tr>
                      <td>Terapias <span class="badge bg-green">100%</span></td>
					   <td><div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                        </div></td>
                    </tr>					
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->	

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
                      <td>Doctores <span class="badge bg-green">50%</span></td>
					   <td> &nbsp;<input type="checkbox" checked disabled><span class="text-green">Ver</span>	&nbsp; <input type="checkbox"/>Crear	&nbsp; <input type="checkbox"/>Editar	&nbsp; <input type="checkbox" checked disabled><span class="text-green">Eliminar</span></td>
                    </tr>
					 <tr>
                      <td>Pacientes <span class="badge bg-green">100%</span></td>
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
                      <td>Consulta médica</td>
					   <td> &nbsp;<input type="checkbox" disabled>Ver	&nbsp; <input type="checkbox" disabled>Crear	&nbsp; <input type="checkbox" disabled>Editar	&nbsp; <input type="checkbox" disabled>Eliminar</td>
                    </tr>
					<tr>
                      <td>Expediente médico</td>
					   <td> &nbsp;<input type="checkbox" disabled>Ver	&nbsp; <input type="checkbox" disabled>Crear	&nbsp; <input type="checkbox" disabled>Editar	&nbsp; <input type="checkbox" disabled>Eliminar</td>
                    </tr>
					<tr>
                      <td>Terapias</td>
					   <td> &nbsp;<input type="checkbox"/>Ver	&nbsp; <input type="checkbox"/>Crear	&nbsp; <input type="checkbox"/>Editar	&nbsp; <input type="checkbox"/>Eliminar</td>
                    </tr>					
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->	


			  
		  </div><!-- /.col-md-6 -->	  


		<div class="col-md-6">	
		
        		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Doctor</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tr>
                      <th>Módulo</th>
                      <th>Permisos</th>
                    </tr>					 
					<tr>
                      <td>Doctores <span class="badge bg-green">100%</span></td>
					   <td>
					   <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                        </div>
					  </td>
                    </tr>
					 <tr>
                      <td>Pacientes <span class="badge bg-green">100%</span></td>
					   <td> <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                        </div></td>
                    </tr>
					<tr>
                      <td>Citas médicas</td>
					   <td> &nbsp;<input type="checkbox"/>Ver	&nbsp; <input type="checkbox"/>Crear	&nbsp; <input type="checkbox"/>Editar	&nbsp; <input type="checkbox"/>Eliminar</td>
                    </tr>
					<tr>
                      <td>Sala de espera</td>
					   <td> &nbsp;<input type="checkbox"/>Ver	&nbsp; <input type="checkbox"/>Crear	&nbsp; <input type="checkbox"/>Editar	&nbsp; <input type="checkbox"/>Eliminar</td>
                    </tr>
					<tr>
                      <td>Consulta médica <span class="badge bg-green">100%</span></td>
					   <td><div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                        </div></td>
                    </tr>
					<tr>
                      <td>Expediente médico <span class="badge bg-green">100%</span></td>
					   <td><div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: 100%"></div>
                        </div></td>
                    </tr>
					<tr>
                      <td>Terapias</td>
					   <td> &nbsp;<input type="checkbox"/>Ver	&nbsp; <input type="checkbox"/>Crear	&nbsp; <input type="checkbox"/>Editar	&nbsp; <input type="checkbox"/>Eliminar</td>
                    </tr>					
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->	

     		<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Secretaria</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tr>
                      <th>Módulo</th>
                      <th>Permisos</th>
                    </tr>					 
					<tr>
                      <td>Doctores</td>
					   	<td> &nbsp;<input type="checkbox" disabled checked ><span class="text-green">Ver</span>	&nbsp; <input type="checkbox" disabled>Crear	&nbsp; <input type="checkbox" disabled>Editar	&nbsp; <input type="checkbox" disabled>Eliminar</td>
                    </tr>
					 <tr>
                      <td>Pacientes <span class="badge bg-green">100%</span></td>
					   <td> <div class="progress progress-xs progress-striped active">
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
                      <td>Consulta médica</td>
					   <td> &nbsp;<input type="checkbox" disabled>Ver	&nbsp; <input type="checkbox" disabled>Crear	&nbsp; <input type="checkbox" disabled>Editar	&nbsp; <input type="checkbox" disabled>Eliminar</td>
					  </tr>
					<tr>
                      <td>Expediente médico</td>
					   <td> &nbsp;<input type="checkbox" disabled>Ver	&nbsp; <input type="checkbox" disabled>Crear	&nbsp; <input type="checkbox" disabled>Editar	&nbsp; <input type="checkbox" disabled>Eliminar</td>
                    </tr>
					<tr>
                      <td>Terapias</td>
					   <td> &nbsp;<input type="checkbox"/>Ver	&nbsp; <input type="checkbox"/>Crear	&nbsp; <input type="checkbox"/>Editar	&nbsp; <input type="checkbox"/>Eliminar</td>
                    </tr>					
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->	
			  
		  </div><!-- /.col-md-6 -->	  
			  

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
	
      <!--check que estan en la BD-->
	function check_permiso(check,text,id) 
	{ 
	if (document.getElementById('check'+e).checked==true){document.getElementById('text'+e).disabled=false} 
	if (document.getElementById('check'+e).checked==false){document.getElementById('text'+e).disabled=true} 
	}
	
	<!--check NO estan en la BD-->
	function check(check,text) 
	{ 
	if (document.getElementById('check'+e).checked==true){document.getElementById('text'+e).disabled=false} 
	if (document.getElementById('check'+e).checked==false){document.getElementById('text'+e).disabled=true} 
	}
	
    </script>
	
  </body>
</html>

