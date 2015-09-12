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
         Consultas<small></small>
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
				
          <div class='row'>
            <div class='col-md-12'>
			  <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Paciente: <?=  $historial[0]['pnombre']; ?> <?=  $historial[0]['snombre']; ?> <?=  $historial[0]['papellido']; ?> <?=  $historial[0]['sapellido']; ?></h3>
				  <input type="text" id="buscar_table" class="form-control input-sm pull-right" style="width: 200px;" placeholder="Buscar">
                </div><!-- /.box-header -->
                <div class="box-body">
                 <table id="historias_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
						<th>Fecha</th>
						<th>Doctor</th>
						<th>Motivo</th>
						<th width="15%">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php if(is_array($historial) && count($historial) ){
						$numero=1;
						foreach($historial as $row){ ?>
							<tr>		  
						  <td><?=  $numero++ ?></td>
						  <td><?= date_format(date_create($row['fecha']), 'd/m/Y'); ?></td>
						  <td>
						   <?=  $row['nombre_doc']; ?> <?=  $row['apellido_doc']; ?>
						  </td>	
						  <td><?= substr($row['motivo_consul'],0,30); ?>...</td>
						  <td>												
						  </td>			
						 </tr>
							<?php }} ?>
                     </tbody>
                    <tfoot>
                      <tr>
						<th>#</th>
						<th>Fecha</th>
						<th>Doctor</th>
						<th>Motivo</th>
						<th>Opciones</th>
                      </tr>
                    </tfoot>
                  </table>
			   </div><!-- /.box-body -->
              </div><!-- /.box -->

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
	<script src="<?=base_url()?>assets/bootstrap/js/bootbox.min.js" type="text/javascript"></script>
      <!-- DATA TABES SCRIPT -->
    <script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
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
	
		$(document).ready(function () {		
	 
        $("#historias_table").dataTable({});

		 oTable = $('#examenes_table').dataTable();
		 
		 $('#buscar_table').keyup(function(){ oTable.fnFilter( $(this).val() )});
		
		$('[data-rel=tooltip]').tooltip();
		$('[data-rel=popover]').popover({html:true});	
		
      });	
		
    </script>
	
  </body>
</html>

