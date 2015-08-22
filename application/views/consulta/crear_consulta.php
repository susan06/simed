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
                  <center><h3 style="font-size:bold">Consulta Médica</h3></center>
                </div><!-- /.box-header -->
                <!-- form start -->               
						
    <div class="box-body">
					
<form method="post" name="datos_consulta" action="<?= base_url(); ?>consulta/registrar_consulta/<?= $cita ?>">	 
	 
	<?php if(is_array($paciente) && count($paciente) ){
		foreach($paciente as $row){ ?>	
		
	<h4 style="font-size:bold">Datos del paciente</h4>  
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
						  <label>Edad:</label>
						  <?php echo $row['edad']; if($row['edad']){ echo " años"; } ?> 
						</div>									 
					</div>														

		<?php }} ?>
	</div>		 



<h4 style="font-size:bold">Signos vitales</h4>
		 
		 <div class="box">
             <br>   			
					<div class="row">				   
						<div class="form-group col-xs-2">
						  <label>Tensión arterial (mmHg)</label>
						  <input type="text" class="form-control" name="tension_arteria">
						</div>
						<div class="form-group col-xs-2">
						  <label>Peso (Kg)</label>
						  <input type="text" class="form-control" name="peso">
						</div>
						<div class="form-group col-xs-2">
						  <label>Temperatura (&deg;C)</label>
						  <input type="text" class="form-control" name="temp" >
						</div>
						<div class="form-group col-xs-2">
						  <label>Pulso (ppm)</label>
						  <input type="text" class="form-control" name="pulso" >
						</div>
						<div class="form-group col-xs-2">
						  <label>Respiraciones (rpm)</label>
						  <input type="text" class="form-control" name="resp">
						</div>
					</div>
			</div>	
			
		 <div class="box">
             <br>     		

					<div class="row">				   
						<div class="form-group col-xs-6">
						  <label>Motivo de la consulta</label>
						 <textarea name="motivo_consul" class="form-control"></textarea>
						</div>
						<div class="form-group col-xs-6">
						  <label>Enfermedad actual</label>
						   <textarea name="enfermedad_actual" class="form-control"></textarea>
						</div>
					</div>	
			</div>
			
		 <div class="box">
             <br>     		
					<div class="row">				   
						<div class="form-group col-xs-6">
						  <label>Diagnóstico</label>
						 <textarea name="diagnostico" class="form-control"></textarea>
						</div>
						<div class="form-group col-xs-6">
						  <label>Tratamiento</label>
						   <textarea name="tratamiento" class="form-control"></textarea>
						</div>
					</div>	
					
					<div class="row">
						<div class="form-group col-xs-6">
						  <label>Observaciones</label>
						   <textarea name="observacion_consul" class="form-control"></textarea>
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

