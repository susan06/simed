	<?php $this->load->view('layouts/doctype.php');	 ?>	
	
  <body class="skin-green-light sidebar-mini">
    <div class="wrapper">
	
	<?php $this->load->view('layouts/header.php');	 ?>	

	  <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
				<?php if($this->session->userdata('rol') == 3 && $this->session->userdata('sexo') == "F"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/doctora.png" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 3 && $this->session->userdata('sexo') == "M"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/doctor.png" class="img-circle" alt="User Image"/>
				<?php } ?> 
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('nombre'); ?> <?php echo  $this->session->userdata('apellido'); ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> <?= $this->crud_model->get_name_rol($this->session->userdata('rol')); ?></a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">PANEL</li>
			<li class="treeview">
              <a href="<?= base_url();?>consulta/medica/<?= $cita; ?>">
                <i class="fa fa-file-text-o"></i> <span>Historia médica</span>
              </a>
            </li>
			 <li class="treeview">
              <a href="<?= base_url();?>consulta/registrar/<?= $cita; ?>">
                <i class="fa fa-stethoscope"></i> <span>Consulta</span>
              </a>
            </li>
			 <li class="treeview">
              <a href="<?= base_url();?>consulta/historial/<?= $cita; ?>">
                <i class="fa fa-server"></i> <span>Últimas consultas</span>
              </a>
            </li>
			 <li class="treeview">
              <a href="<?= base_url();?>consulta/recipe/<?= $cita; ?>">
                <i class="fa fa-clipboard"></i> <span>Récipe</span>
              </a>
            </li>	
			 <li class="treeview">
              <a href="<?= base_url();?>consulta/orden_terapia/<?= $cita; ?>">
                <i class="fa fa-file-o"></i> <span>Orden de terapia</span>
              </a>
            </li>	
			 <li class="treeview">
              <a href="<?= base_url();?>consulta/culminar/<?= $cita; ?>">
                <i class="fa fa-thumbs-o-up"></i> <span>Culminar consulta</span>
              </a>
            </li>	
			 <li class="treeview">
              <a href="<?= base_url(); ?>consulta/sala_espera">
                <i class="fa  fa-rotate-left"></i> <span>Regresar</span>
              </a>
            </li>			
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
	  
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Consulta <small>- DR. <?= $doctor[0]['pnombre'].' '.$doctor[0]['papellido'];  ?></small>
          </h1>
        </section>
		
		<span class="ir-arriba"><i class="fa fa-level-up"></i></span>
		
        <!-- Main content -->
        <section class="content">
					<div class="alert alert-warning alert-dismissable" style="display:none" id="alert_warning">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Advertencia!</h4>
							<span id="span_warning"></span>
					  </div>
					  
					  <div class="alert alert-info alert-dismissable" style="display:none" id="alert_info">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-info"></i> Información!</h4>
							<span id="span_info"></span>
					  </div>
					  
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
				
          <div class='row'>
            <div class='col-md-12'>
  
		<?php if ($historia_medica == 0) {  ?>
		 <div class="box box-success">	
			<div class="box-header">
			<center><button type="button" class="btn btn-success" onclick="location.href='<?= base_url(); ?>consulta/crear_historia/<?= $cita; ?>'">Crear historia médica</button></center>
			</div><!-- /.box-header -->	
		</div>			
		<?php }  ?>
		
		<?php if ($historia_medica > 0) {  ?>	
		
    <div class="box box-success">	

			  <?php if(is_array($historia_medica) && count($historia_medica) ){
					foreach($historia_medica as $row){ ?>	
				<div class="box-header">
						<a href="<?= base_url();?>consulta/historia_imprimir/<?= $row['id']; ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Imprimir</a>
						&nbsp;&nbsp;
						<button type="button" class="btn btn-sm btn-info" onclick="mandar_doc(<?= $row['id']; ?>,3)"> Mandar a secretaria</button>
				</div>
				<?php }} ?>	
	
                <div class="box-header">
                  <center><h3 style="font-size:bold">Historia Médica</h3></center>
                </div><!-- /.box-header -->
                <!-- form start -->               
						
    <div class="box-body"> 
		
			<div class="row">				   
						<div class="form-group col-xs-10">
						  <label>Fecha:</label> <?= date_format(date_create($historia_medica[0]['fecha']), 'd/m/Y'); ?> <br>
						  <label>Dr.:</label> <?= $historia_medica[0]['pnombre'].' '.$historia_medica[0]['papellido'];  ?>
						</div>		

						<div class="form-group col-xs-2">
						  <label>N° historia:</label> <?= $historia_medica[0]['id']; ?> <br>
						  <label>N° expediente:</label> <?= $historia_medica[0]['expediente_id']; ?>
						</div>							
			  </div>
			  
	<?php if(is_array($paciente) && count($paciente) ){
		foreach($paciente as $row){ ?>	
		
		<h4 style="font-size:bold">Datos personales</h4>
		 
		 <div class="box">
             <br>     				
				   <div class="row">
				   
						<div class="form-group col-xs-5">
						  <label>Paciente:</label>
						  <?= $row['pnombre']; ?> <?= $row['snombre']; ?> <?= $row['papellido']; ?> <?= $row['sapellido']; ?>
						</div>	
				 
					</div>

					<div class="row">
				   
						<div class="form-group col-xs-3">
						  <label>Cédula:</label>
						   <?= $row['cedula']; ?>
						</div>
						<div class="form-group col-xs-3">
						  <label>Fecha de Nacimiento:</label>
						  <?= date_format(date_create($row['fnacimiento']), 'd/m/Y'); ?>
						</div>
						<div class="form-group col-xs-3">
						  <label>Lugar de Nacimiento:</label>
						  <?=$row['lnacimiento']; ?>
						</div>
						<div class="form-group col-xs-3">
						  <label>Edad:</label>
						  <?php echo $row['edad']; if($row['edad']){ echo " años"; } ?> 
						</div>					
				 
					</div>					
					
				<div class="row">
				   
						<div class="form-group col-xs-3">
						  <label>Sexo:</label>
						   		<?php if($row['sexo'] == "F"){ echo "Femenino"; }else{ echo "Masculino";} ?> 
						</div>
						<div class="form-group col-xs-3">
						  <label>Estado Civil:</label>
						   <?=$row['civil']; ?>
						</div>
						<div class="form-group col-xs-3">
						  <label>Email:</label><br>
						  <?php echo $row['email']; ?>
						</div>
						<div class="form-group col-xs-3">
						  <label>Profesi&oacute;n:</label>
						  <?php echo $row['profesion']; ?>
						</div>
						
				 
					</div>						

				<div class="row">
						<div class="form-group col-xs-3">
						  <label>T&eacute;lefono:</label>
						  <?php echo $row['tlf']; ?>
						</div>
						<div class="form-group col-xs-4">
						  <label>Direcci&oacute;n:</label>
						   <?php echo $row['direccion']; ?>
						</div>										 
				</div>				
				
				 <?php if($row['rlegal']){ ?>
				<div class="row">
				<br>
				 <div class="col-md-6">
						  <div class="box-header">
						  <h3 class="box-title">Representante Legal</h3>
						  </div>
						  <div class="box-body">
						<div class="form-group col-xs-6">
						  <label>Nombre:</label>
						   <?php echo $row['rlegal']; ?>
						</div>
						<div class="form-group col-xs-6">
						  <label>Parentesco:</label>
						  <?php echo $row['p_rlegal']; ?>
						</div>
						</div>
				 </div>
					</div>						
				
				 <?php } ?>
		<?php }} ?>
 </div>
 
  <?php if(is_array($historia_medica) && count($historia_medica) ) {
		foreach($historia_medica as $row){ ?>	
		
	<form method="post" name="historia" action="<?= base_url(); ?>consulta/actualizar_historia/<?= $cita ?>">	
	
 <h4 style="font-size:bold">Antecedentes Personales y Familiares</h4>
		 
		 <div class="box">
             <br>     		

					<div class="row">				   
						<div class="form-group col-xs-6">
						  <label>Médicos</label>
						 <textarea name="med_cabecera" class="form-control"><?= $row['med_cabecera']; ?></textarea>
						</div>
						<div class="form-group col-xs-6">
						  <label>Alergias</label>
						   <textarea name="alergias" class="form-control"><?= $row['alergias']; ?></textarea>
						</div>
					</div>	
					
					<div class="row">
						<div class="form-group col-xs-6">
						  <label>Qx</label>
						   <textarea name="qx"  class="form-control"><?= $row['qx']; ?></textarea>
						</div>
						<div class="form-group col-xs-6">
						  <label>Ant. familiares</label>
						   <textarea  name="antec_flia" class="form-control"><?= $row['antec_flia']; ?></textarea>
						</div>									 
					</div>	
			</div>
			
 <h4 style="font-size:bold">Antecedentes Gineco-obstétricos</h4>
		 
		 <div class="box">
             <br>   			
					<div class="row">				   
						<div class="form-group col-xs-4">
						  <label>Menarquia</label>
						  <input type="text" class="form-control" name="menarquia" value="<?= $row['menarquia']; ?>">
						</div>
						<div class="form-group col-xs-4">
						  <label>Mentruación</label>
						  <input type="text" class="form-control" name="menstruacion" value="<?= $row['menstruacion']; ?>">
						</div>
					<div class="form-group col-xs-4">
						  <label>Regularidad</label>
						  <input type="text" class="form-control" name="regularidad_menst" value="<?= $row['regularidad_menst']; ?>">
						</div>
					</div>
					<div class="row">				   
						<div class="form-group col-xs-3">
						  <label>Embarazos</label>
						  <input type="text" class="form-control" name="embarazos" value="<?= $row['embarazos']; ?>">
						</div>
						<div class="form-group col-xs-3">
						  <label>Partos</label>
						  <input type="text" class="form-control" name="partos" value="<?= $row['partos']; ?>">
						</div>
					<div class="form-group col-xs-3">
						  <label>Cesareas</label>
						  <input type="text" class="form-control" name="cesarias" value="<?= $row['cesarias']; ?>">
						</div>
						<div class="form-group col-xs-3">
						  <label>Abortos</label>
						  <input type="text" class="form-control" name="abortos" value="<?= $row['abortos']; ?>">
						</div>
					</div>
			</div>	
			
<h4 style="font-size:bold">Hábitos Alimenticios</h4>
		 
		 <div class="box">
             <br> 
					<div class="row">				   
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select class="form-control" name="leche">
								  <option value="<?= $row['leche']; ?>"><?= $row['leche']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Leche</label>						 
						</div>
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select class="form-control" name="vegetales">
								  <option value="<?= $row['vegetales']; ?>"><?= $row['vegetales']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Vegetales</label>						 
						</div>
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select class="form-control" name="frutas">
								  <option value="<?= $row['frutas']; ?>"><?= $row['frutas']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Frutas</label>						 
						</div>
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select class="form-control" name="cereales">
								  <option value="<?= $row['cereales']; ?>"><?= $row['cereales']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Cereales</label>						 
						</div>
					</div>	
					<div class="row">				   
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select class="form-control"  name="carnes">
								<option value="<?= $row['carnes']; ?>"><?= $row['carnes']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Carnes</label>						 
						</div>
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select class="form-control" name="granos">
								  <option value="<?= $row['granos']; ?>"><?= $row['granos']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Granos</label>						 
						</div>
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select class="form-control" name="grasas">
								  <option value="<?= $row['grasas']; ?>"><?= $row['grasas']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Grasas</label>						 
						</div>
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select class="form-control" name="almidones">
								 <option value="<?= $row['almidones']; ?>"><?= $row['almidones']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Almidones</label>						 
						</div>
					</div>	
					<div class="row">
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select class="form-control" name="dulces">
								  <option value="<?= $row['dulces']; ?>"><?= $row['dulces']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Dulces</label>						 
						</div>
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select class="form-control" name="cafe_leche">
								  <option value="<?= $row['cafe_leche']; ?>"><?= $row['cafe_leche']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Café con Leche</label>						 
						</div>						
					</div>						
		 </div>	

<h4 style="font-size:bold">Hábitos Psicobiológicos</h4>
		 
		 <div class="box">
             <br>   			
					<div class="row">				   
						<div class="form-group col-xs-4">
						  <label>Alcohol</label>
						  <input type="text" class="form-control" name="alcohol" value="<?= $row['alcohol']; ?>">
						</div>
						<div class="form-group col-xs-4">
						  <label>Tábaquicos</label>
						  <input type="text" class="form-control" name="tabaquicos" value="<?= $row['tabaquicos']; ?>">
						</div>
						<div class="form-group col-xs-4">
						  <label>Cafeicos</label>
						  <input type="text" class="form-control" name="cafeicos" value="<?= $row['cafeicos']; ?>">
						</div>
					</div>
					<div class="row">				   
						<div class="form-group col-xs-6">
						  <label>Medicamentos</label>
						 <textarea  name="medicamentos"  class="form-control"><?= $row['medicamentos']; ?></textarea>
						</div>
						<div class="form-group col-xs-6">
						  <label>Otros</label>
						 <textarea  name="otros" class="form-control"><?= $row['otros']; ?></textarea>
						</div>
					</div>
			</div>	
			
<h4 style="font-size:bold">Examen Funcional</h4>
		 
		 <div class="box">
             <br>   			
					<div class="row">				   
						<div class="form-group col-xs-6">
						  <label>Evaciaciones</label>
						  <input type="text" class="form-control" name="evacuacion" value="<?= $row['evacuacion']; ?>">
						</div>
						<div class="form-group col-xs-6">
						  <label>Micciones</label>
						  <input type="text" class="form-control" name="miccion" value="<?= $row['miccion']; ?>">
						</div>
					</div>
					<div class="row">				   
						<div class="form-group col-xs-6">
						  <label>Observaciones</label>
						 <textarea  name="obs"  class="form-control"><?= $row['obs']; ?></textarea>
						</div>
					</div>
			</div>		
	</div>	<!-- /.box-body -->			
 
     <div class="box-footer">
	  <input type="hidden" name="id" value="<?= $row['id']; ?>"> 
       <button type="submit" class="btn btn-success pull-right">Actualizar</button>
     </div>
	 
	</div>


	 
</form>
	
	<?php }} ?>
	
		<?php }  ?>
		
            </div><!-- /.col-->
          </div><!-- ./row -->
		  
		  
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

	<script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>

    <script type="text/javascript">	

		function mandar_doc(id,tipo){

			$.ajax({ 
							url: '<?=base_url()?>consulta/mandar_doc',
							type:'POST',
							data:{id:id,tipo: tipo},
							dataType : 'json',
							success: function(data){
								if(data.exist == 1){
									$('#span_warning').html(data.mnj);
									$('#alert_warning').show();
									$('#alert_info').hide();
									setTimeout(function() {
									$(".alert").fadeOut(1000);
									},4000);
								}else{
									$('#span_info').html(data.mnj);
									$('#alert_info').show();
									$('#alert_warning').hide();
									setTimeout(function() {
									$(".alert").fadeOut(1000);
									},4000);
								}
							}
			})	
			
		}	
		
    </script>

  </body>
</html>

