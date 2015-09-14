	<?php $this->load->view('layouts/doctype.php');	 ?>	
	
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
              <a href="<?= base_url(); ?>consulta/medica/<?= $cita ?>">
                <i class="fa fa-stethoscope"></i> <span>Regresar a consulta</span>
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

          <div class='row'>
            <div class='col-md-12'>
  	
		
    <div class="box box-success">	
	
                <div class="box-header">
                  <center><h3 style="font-size:bold">Historia Médica</h3></center>
                </div><!-- /.box-header -->
                <!-- form start -->               
						
    <div class="box-body">
					
<form method="post" name="apertura_historia" action="<?= base_url(); ?>consulta/registrar_historia/<?= $cita ?>">	 
	 
	<?php if(is_array($paciente) && count($paciente) ){
		foreach($paciente as $row){ ?>	
		
		<h4 style="font-size:bold">Datos personales</h4>
		 
		 <div class="box">
             <br>     				
				   <div class="row">
				   
						<div class="form-group col-xs-6">
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
 
 <h4 style="font-size:bold">Antecedentes Personales y Familiares</h4>
		 
		 <div class="box">
             <br>     		

					<div class="row">				   
						<div class="form-group col-xs-6">
						  <label>Médicos</label>
						 <textarea name="med_cabecera" class="form-control"></textarea>
						</div>
						<div class="form-group col-xs-6">
						  <label>Alergias</label>
						   <textarea name="alergias" class="form-control"></textarea>
						</div>
					</div>	
					
					<div class="row">
						<div class="form-group col-xs-6">
						  <label>Qx</label>
						   <textarea name="qx"  class="form-control"></textarea>
						</div>
						<div class="form-group col-xs-6">
						  <label>Ant. familiares</label>
						   <textarea  name="antec_flia" class="form-control"></textarea>
						</div>									 
					</div>	
			</div>
			
 <h4 style="font-size:bold">Antecedentes Gineco-obstétricos</h4>
		 
		 <div class="box">
             <br>   			
					<div class="row">				   
						<div class="form-group col-xs-4">
						  <label>Menarquia</label>
						  <input type="text" class="form-control" name="menarquia">
						</div>
						<div class="form-group col-xs-4">
						  <label>Mentruación</label>
						  <input type="text" class="form-control" name="menstruacion">
						</div>
					<div class="form-group col-xs-4">
						  <label>Regularidad</label>
						  <input type="text" class="form-control" name="regularidad_menst">
						</div>
					</div>
					<div class="row">				   
						<div class="form-group col-xs-3">
						  <label>Embarazos</label>
						  <input type="text" class="form-control" name="embarazos">
						</div>
						<div class="form-group col-xs-3">
						  <label>Partos</label>
						  <input type="text" class="form-control" name="partos">
						</div>
					<div class="form-group col-xs-3">
						  <label>Cesareas</label>
						  <input type="text" class="form-control" name="cesarias">
						</div>
						<div class="form-group col-xs-3">
						  <label>Abortos</label>
						  <input type="text" class="form-control" name="abortos">
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
								  <option value="">0</option>
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
								  <option value="">0</option>
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
								  <option value="">0</option>
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
								  <option value="">0</option>
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
								  <option value="">0</option>
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
								  <option value="">0</option>
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
								  <option value="">0</option>
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
								  <option value="">0</option>
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
								  <option value="">0</option>
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
								  <option value="">0</option>
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
						  <input type="text" class="form-control" name="alcohol">
						</div>
						<div class="form-group col-xs-4">
						  <label>Tábaquicos</label>
						  <input type="text" class="form-control" name="tabaquicos">
						</div>
						<div class="form-group col-xs-4">
						  <label>Cafeicos</label>
						  <input type="text" class="form-control" name="cafeicos">
						</div>
					</div>
					<div class="row">				   
						<div class="form-group col-xs-6">
						  <label>Medicamentos</label>
						 <textarea  name="medicamentos"  class="form-control"></textarea>
						</div>
						<div class="form-group col-xs-6">
						  <label>Otros</label>
						 <textarea  name="otros" class="form-control"></textarea>
						</div>
					</div>
			</div>	
			
<h4 style="font-size:bold">Examen Funcional</h4>
		 
		 <div class="box">
             <br>   			
					<div class="row">				   
						<div class="form-group col-xs-6">
						  <label>Evaciaciones</label>
						  <input type="text" class="form-control" name="evacuacion">
						</div>
						<div class="form-group col-xs-6">
						  <label>Micciones</label>
						  <input type="text" class="form-control" name="miccion">
						</div>
					</div>
					<div class="row">				   
						<div class="form-group col-xs-6">
						  <label>Observaciones</label>
						 <textarea  name="obs"  class="form-control"></textarea>
						</div>
					</div>
			</div>		
	</div>	<!-- /.box-body -->			
     
	 
	 <div class="box-footer">
       <button type="submit" class="btn btn-success pull-right">Guardar</button>
     </div>
</form>	 

	</div>


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
	

	<script>

</script>

  </body>
</html>

