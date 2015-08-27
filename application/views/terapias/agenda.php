	<?php $this->load->view('layouts/doctype.php');	 ?>	
	
    <div class="wrapper">
	
	<?php $this->load->view('layouts/header.php');	 ?>	
	<?php $this->load->view('layouts/menu.php');	 ?>	
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
         Agenda de terapias<small></small>
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
                  <h3 class="box-title">Agenda del terapias</h3>				 
				<input type="text" id="buscar_table" class="form-control input-sm pull-right" style="width: 200px;" placeholder="Buscar">
				</div><!-- /.box-header -->
				
				 <div class="box-header">
                  <h3 class="box-title"><input type="text" class="form-control" name="fecha" id="fecha" value="<?= date('d-m-Y'); ?>"/></h3>				 
				 <button type="button" class="btn btn-success" onclick="agenda_terapia( $('#fecha').val())">Buscar</button>
				</div>

                <div class="box-body" id="terapias_load">

                  <table id="terapias_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
						<th width="15%">Fecha / Hora</th>
						<th>Paciente</th>
						<th>Especialidad</th>
						<th>Status</th>
						<th width="15%">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php if(is_array($aplicacion) && count($aplicacion) ){
						$numero=1;
						foreach($aplicacion as $row){ ?>
							<tr>
		  
						  <td><?=  $numero++ ?></td>
						  <td> <?= date_format(date_create($row['fecha']), 'd/m/Y'); ?> - <?=  $row['hora_media']; ?> </td>
						  <td><?= $row['pnombre'] ?> <?= $row['snombre'] ?> <?= $row['papellido'] ?> <?= $row['sapellido'] ?></td>
						  <td><?=  $row['nombre']; ?></td>
						  <td><?Php if($row['status'] == 1){ echo 'Pendiente'; }else{ echo 'Atendido'; } ?></td>
						  <td>
							
							<i class="fa fa-info-circle" data-rel="tooltip" data-placement="top"  title="ver cita" style="cursor:pointer" onclick="cita_paciente(<?= $row['id'];?>)"></i>
							&nbsp;

							<?php									
							if ($permisos[$editar]['status'] == 1 ){ 
							?>
							
							<i title="Editar" data-rel="tooltip" data-placement="top"  style="cursor:pointer" class="fa fa-edit" data-rel="tooltip" data-placement="top"  onclick="editar_cita(<?= $row['id'];?>)"></i>
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
							
							<i title="Eliminar" data-rel="tooltip" data-placement="top"  style="cursor:pointer" class="fa fa-trash-o" onclick="eliminar(<?= $row['id'];?>, '<?= base_url(); ?>citas/eliminar')"></i>

							<?php	
								}else{
							?>
							
							<i class="fa fa-trash-o" title="editar" data-rel="tooltip" data-placement="top"  onclick="eliminar_permiso()"></i>

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
						<th>Fecha / Hora</th>
						<th>Doctor</th>
						<th>Especialidad</th>
						<th>Status</th>
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
	
	<script src="<?=base_url()?>assets/js/datepicker-es.js" type="text/javascript"></script>
	
	  <!-- all -->
    <script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>

	<!-- page script -->
    <script type="text/javascript">
	
      $(document).ready(function () {		
	 
        $("#terapias_table").dataTable({});

		 oTable = $('#terapias_table').dataTable();
		 
		 $('#buscar_table').keyup(function(){ oTable.fnFilter( $(this).val() )});

		$('body').on('hidden.bs.modal', '.modal', function (e) {
			$(e.target).removeData("bs.modal").find(".modal-body").empty(); 
		});		 
		
		$('[data-rel=tooltip]').tooltip();
		$('[data-rel=popover]').popover({html:true});
				
      });	
	 
		
		<!--Funcion que buscar citas por fecha y doctor-->
		function agenda_terapia(fecha){ 

							$.ajax({
									data: {fecha:fecha},
									url:   '<?= base_url(); ?>agenda_terapias',
									type:  'post',
									success:  function (response) {
											$("#terapias_load").html(response);
									}
							});
   
		} 	
		
    </script>
	
  </body>
</html>

