	<?php $this->load->view('layouts/doctype.php');	 ?>	
	
    <div class="wrapper">
	
	<?php $this->load->view('layouts/header.php');	 ?>	
	<?php $this->load->view('layouts/menu.php');	 ?>	
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
         Citas médicas<small> - Paciente</small>
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
                  <h3 class="box-title">Paciente: <?= $citas[0]['pnombre'] ?> <?= $citas[0]['snombre'] ?> <?= $citas[0]['papellido'] ?> <?= $citas[0]['sapellido'] ?></h3>
				  <input type="text" id="buscar_table" class="form-control input-sm pull-right" style="width: 200px;" placeholder="Buscar">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="pacientes_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
						<th width="15%">Fecha / Hora</th>
						<th>Doctor</th>
						<th>Especialidad</th>
						<th width="15%">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php if(is_array($citas) && count($citas) ){
						$numero=1;
						foreach($citas as $row){ ?>
							<tr>
		  
						  <td><?=  $numero++ ?></td>
						  <td> <?= date_format(date_create($row['fecha']), 'd/m/Y'); ?> - <?=  $row['hora_media']; ?> </td>
						  <td><?=  $row['nombre_doc']; ?> <?=  $row['apellido_doc']; ?></td>
						<td><?=  $row['nombre']; ?></td>
						  <td>
							
							<i class="fa fa-info-circle" data-rel="tooltip" data-placement="top"  title="ver cita" style="cursor:pointer" onclick="cita_paciente(<?= $row['id'];?>)"></i>
							&nbsp;

							<?php									
							if ($permisos[$editar]['status'] == 1 ){ 
							?>
							
							<i title="Editar" data-rel="tooltip" data-placement="top"  style="cursor:pointer" class="fa fa-edit" data-rel="tooltip" data-placement="top"  onclick="location.href='<?= base_url(); ?>citas/editar/<?= $row['id'];?>'"></i>
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
						<th>Opciones</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
		  
	      <div class="modal modal-warning" id="warning_modal" role="dialog">
              <div class="modal-dialog"  role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Permisos</h4>
                  </div>
                  <div class="modal-body">
                    <p>No tiene permiso para eliminar citas</p>
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
                    <p>No tiene permiso para editar citas del paciente</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-dismiss="modal">Ok</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
	

		<div class="modal" id="modalPacDialog" role="dialog">
		  <div class="modal-dialog"  role="document" style="width: 40%;">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Cita del paciente</h4>
					<span id="mnj_cambio" class="text-green">
					<?php if($this->session->flashdata('cita_modificada') != ''): ?>	
					 &nbsp;Modificada con éxito 
					<?php endif;?>
					</span>
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
		
		<?php if($this->session->flashdata('cita_modificada') != ''): ?>		
		window.onload = function() {
			$( "#pac-body" ).load( "<?= base_url(); ?>citas/ver/<?= $this->session->flashdata('cita_modificada'); ?>" );
			$('#modalPacDialog').modal();
		};
		<?php endif;?>
	
	
        $("#pacientes_table").dataTable({});

		 oTable = $('#pacientes_table').dataTable();
		 
		 $('#buscar_table').keyup(function(){ oTable.fnFilter( $(this).val() )});

		$('body').on('hidden.bs.modal', '.modal', function (e) {
			$(e.target).removeData("bs.modal").find(".modal-body").empty(); 
		});		 
		
		$('[data-rel=tooltip]').tooltip();
		$('[data-rel=popover]').popover({html:true});
				
      });	
	 

		function cita_paciente(id){
			$('#mnj_cambio').empty();
			$( "#pac-body" ).load( "<?= base_url(); ?>citas/ver/"+id );
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

