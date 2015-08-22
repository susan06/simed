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
              <a href="<?= base_url();?>home">
                <i class="fa fa-clipboard"></i> <span>Récipe</span>
              </a>
            </li>	
			 <li class="treeview">
              <a href="<?= base_url();?>home">
                <i class="fa fa-file-o"></i> <span>Orden de terapia</span>
              </a>
            </li>	
			 <li class="treeview">
              <a href="<?= base_url();?>home">
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
           Historial de Consultas <small>- DR. <?= $doctor[0]['pnombre'].' '.$doctor[0]['papellido'];  ?></small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">		
			  
          <div class='row'>
            <div class='col-md-12'>
			
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
				  <input type="text" id="buscar_table" class="form-control input-sm pull-right" style="width: 200px;" placeholder="Buscar">
                </div><!-- /.box-header -->
				
				<div class="box-body">			
		
                  <table id="pacientes_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
						<th>Fecha</th>
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
						  <td><?= substr($row['motivo_consul'],0,30); ?>...</td>
						  <td>						
							<i class="fa fa-info-circle"  title="Ver detalles" style="cursor:pointer" data-rel="tooltip" data-placement="top" onclick="consulta_paciente(<?= $row['id'];?>)"></i>
							&nbsp;
							<?php									
							if ($permisos[$editar]['status'] == 1 ){ 
							?>
							
							<i title="Editar" data-rel="tooltip" data-placement="top"  style="cursor:pointer" class="fa fa-edit" data-rel="tooltip" data-placement="top"  onclick="location.href='<?= base_url(); ?>consulta/editar/<?= $row['id'];?>/<?= $cita; ?>'"></i>
							&nbsp;
							<?php	
								}else{
							?>
							
							<i class="fa fa-edit" title="editar "data-rel="tooltip" data-placement="top"  onclick="editar_permiso()"></i>
							&nbsp;
							<?php	
								}
							?>			
							
							<?php									
							if ($permisos[$borrar]['status'] == 1 ){ 
							?>
							
							<i title="Eliminar" data-rel="tooltip" data-placement="top"  style="cursor:pointer" class="fa fa-trash-o" onclick="eliminar(<?= $row['id'];?>, '<?= base_url(); ?>consulta/eliminar')"></i>

							<?php	
								}else{
							?>
							
							<i class="fa fa-trash-o" title="eliminar" data-rel="tooltip" data-placement="top"  onclick="eliminar_permiso()"></i>

							<?php	
								}
							?>							
						   </td>			

						 </tr>
							<?php }} ?>
                     </tbody>
                    <tfoot>
                      <tr>
						<th>#</th>
						<th>Fecha</th>
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

 <div class="modal modal-warning" id="warning_modal" role="dialog">
              <div class="modal-dialog"  role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Permisos</h4>
                  </div>
                  <div class="modal-body">
                    <p>No tiene permiso para eliminar consultas</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-dismiss="modal">Ok</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

     <div class="modal modal-warning" id="warning_edit_modal" role="dialog">
              <div class="modal-dialog"  role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Permisos</h4>
                  </div>
                  <div class="modal-body">
                    <p>No tiene permiso para editar consultas</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-dismiss="modal">Ok</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->	  
	  
	  
	  	<div class="modal" id="modalPacDialog" role="dialog">
		  <div class="modal-dialog"  role="document" style="width: 50%;">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Detalles de consulta</h4>
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
		  
        $("#pacientes_table").dataTable({});

		 oTable = $('#pacientes_table').dataTable();
		 
		 $('#buscar_table').keyup(function(){ oTable.fnFilter( $(this).val() )});

		$('body').on('hidden.bs.modal', '.modal', function (e) {
			$(e.target).removeData("bs.modal").find(".modal-body").empty(); 
		});		 
		
		$('[data-rel=tooltip]').tooltip();
		$('[data-rel=popover]').popover({html:true});
				
      });				
	

		function consulta_paciente(id){
			$( "#pac-body" ).load( "<?= base_url(); ?>consulta/ver/"+id );
			$('#modalPacDialog').modal();
		}	


	function eliminar_permiso(){ 			
			$('#warning_modal').modal('show');			
		};	

		function editar_permiso(){ 			
			$('#warning_edit_modal').modal('show');			
		};	
		
		function eliminar(id, url_delete){
		
			bootbox.confirm("Estas seguro de eliminar el registro?", function(result) {
			  $.ajax({ 
							url: url_delete,
							type:'POST',
							data:'id='+id,
							success: function(){
							 location.reload();
							}
					   })
			}); 
		}
				
    </script>
	
  </body>
</html>

