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
                 <?php if($this->session->userdata('rol') == 1 ){ ?>
                  <img src="<?=base_url()?>assets/dist/img/admin.jpg" class="img-circle" alt="User Image"/>
				<?php } ?>  
				<?php if($this->session->userdata('rol') == 2 && $this->session->userdata('sexo') == "F"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/enfermera.png" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 2 && $this->session->userdata('sexo') == "M"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/enfermero.png" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 3 && $this->session->userdata('sexo') == "F"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/doctora.png" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 3 && $this->session->userdata('sexo') == "M"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/doctor.png" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 4 && $this->session->userdata('sexo') == "F"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/terapista.png" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 4 && $this->session->userdata('sexo') == "M"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/terapeuta.png" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 5 ){ ?>
                  <img src="<?=base_url()?>assets/dist/img/secretaria.png" class="img-circle" alt="User Image"/>
				<?php } ?> 
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('nombre'); ?> <?php echo  $this->session->userdata('apellido'); ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> <?= $this->crud_model->get_name_rol($this->session->userdata('rol')); ?></a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
   <ul class="sidebar-menu">
            <li class="header">PANEL- expediente</li>
			<li class="treeview">
             <a href="<?= base_url();?>expedientes/medico/<?= $expediente; ?>">
                <i class="fa  fa-user"></i> <span>Datos del paciente</span>
              </a>
            </li>
			<li class="treeview">
              <a href="<?= base_url();?>expedientes/historias/<?= $expediente; ?>">
                <i class="fa fa-file-text-o"></i> <span>Historias médicas</span>
              </a>
            </li>
			 <li class="treeview">
              <a href="<?= base_url();?>expedientes/consultas/<?= $expediente; ?>">
                <i class="fa fa-stethoscope"></i> <span>Consultas</span>
              </a>
            </li>
			 <li class="treeview">
              <a href="<?= base_url();?>expedientes/recipes/<?= $expediente; ?>">
                <i class="fa fa-clipboard"></i> <span>Récipes</span>
              </a>
            </li>	
			 <li class="treeview">
              <a href="<?= base_url();?>expedientes/ordenes/<?= $expediente; ?>">
                <i class="fa fa-file-o"></i> <span>Ordenes de terapia</span>
              </a>
            </li>
			<li class="treeview">
              <a href="<?= base_url();?>expedientes/procedimientos/<?= $expediente; ?>">
                <i class="fa fa-file-text-o"></i> <span>Procedimientos</span>
              </a>
            </li>				
			 <li class="treeview">
              <a href="<?= base_url();?>expedientes/examenes/<?= $expediente; ?>">
                <i class="fa fa-file-text-o"></i> <span>Exámenes</span>
              </a>
            </li>			
			 <li class="treeview">
              <a href="<?= base_url(); ?>expedientes/buscar">
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
            Expediente Médico <small></small>
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

  <div class="box">	            
						
    <div class="box-body"> 
	
	<?php if(is_array($paciente) && count($paciente) ){
		foreach($paciente as $row){ ?>	
		
		<h4 style="font-size:bold">Datos personales</h4>
		 
	
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
						  <label>Email:</label>
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
		
 </div><!-- /.col-->
          </div><!-- ./row -->
		
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

		function mandar_doc(id,tipo,expediente){

			$.ajax({ 
							url: '<?=base_url()?>consulta/mandar_doc',
							type:'POST',
							data:{id:id,tipo: tipo, expediente:expediente},
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

