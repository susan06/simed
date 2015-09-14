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
      <h1 class="pull-left">
            Récipe <small>- DR. <?= $doctor[0]['pnombre'].' '.$doctor[0]['papellido'];  ?></small>
          </h1>
		  <h1 class="pull-right">
            Especialidad <small>- <?= $especialidad[0]['nombre'];  ?></small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">		
			  
          <div class='row'>
            <div class='col-md-12'>
					
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
		
		
			  <div class="box">
                <div class="box-header">
				 <h3 class="box-title">Paciente: <?= $paciente[0]['pnombre'].' '.$paciente[0]['papellido'];  ?></h3>
                </div><!-- /.box-header -->
				<div class="box-header">
					<button type="button" class="btn btn-sm btn-warning" onclick="recipe_anterior()">Último récipe</button>
				<?php if(is_array($recipe) && count($recipe) ){
					foreach($recipe as $row){ ?>
						<a href="<?= base_url();?>consulta/recipe_imprimir/<?= $row['id']; ?>" target="_blank" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Imprimir</a>
						<button type="button" class="btn btn-sm btn-info" onclick="mandar_doc(<?= $row['id']; ?>,1,<?= $row['expediente_id']; ?>)"> Mandar a secretaria</button>
				<?php }} ?>			
				</div>
				
	<form method="post" name="datos_recipe" action="<?= base_url(); ?>consulta/guardar_recipe/<?= $cita ?>">	 
				<div class="box-body">			
					<div class="row">				   
								<div class="form-group col-xs-10">
								  <label>Fecha de émisión:</label> <?= date('d/m/Y'); ?> <br>
								  <label>Fecha de expiración: </label> <input type="text" name="fecha_expiracion" id="fecha" value=" <?= date_format(date_create($recipe[0]['fecha_expiracion']), 'd-m-Y'); ?>"/>
								</div>								
					  </div>
					<div class="box">
					 <br>     		
							<div class="row">				   
								<div class="form-group col-xs-6">
								  <label>Récipe</label>
								 <textarea name="rp" rows="15" class="form-control"><?= $recipe[0]['rp']; ?></textarea>
								</div>
								<div class="form-group col-xs-6">
								  <label>Indicaciones</label>
								   <textarea name="indicaciones" rows="15"  class="form-control"><?= $recipe[0]['indicaciones']; ?></textarea>
								</div>
							</div>	
					</div>
			
				</div><!-- /.box-body -->
				
					 <div class="box-footer">					 
					   <button type="submit" class="btn btn-success pull-right">Guardar</button>
					 </div>
				
				</form>	 			
				
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->

		<div class="modal" id="modalPacDialog" role="dialog">
		  <div class="modal-dialog"  role="document" style="width: 65%;">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Último Récipe</h4>
				</div>
						<div class="modal-body" id="pac-body">
						</div>
				 <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
				  </div>
			</div>
			<!-- /.modal-content --> 
		  </div>
		  <!-- /.modal-dialog --> 
		</div>	
				  
		  
		  
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

    <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=base_url()?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/app.min.js" type="text/javascript"></script>
	
	<script src="<?=base_url()?>assets/js/datepicker-es.js" type="text/javascript"></script>
	  <!-- all -->
    <script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
	<!-- page script -->
    <script type="text/javascript">
	
		function recipe_anterior(){
			$.ajax({ 
							url: '<?=base_url()?>consulta/recipe_anterior',
							type:'POST',
							data:{doctor: <?= $doctor[0]['id']; ?> ,expediente: <?= $expediente[0]['id']; ?>},
							success: function(data){
							 $( "#pac-body" ).html(data);
							$('#modalPacDialog').modal();
							}
			})	
			
		}				

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

