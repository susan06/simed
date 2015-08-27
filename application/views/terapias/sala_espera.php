	<?php $this->load->view('layouts/doctype.php');	 ?>	
	
    <div class="wrapper">
	
	<?php $this->load->view('layouts/header.php');	 ?>	
	<?php $this->load->view('layouts/menu.php');	 ?>	
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Sala de espera<small> - Terapias</small>
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
				<?Php if(count($pac_terapias) > 0){ ?>
                  <h3 class="box-title">Pacientes en sala de espera para terapias</h3>
				<?Php }else{ ?>
				 <h3 class="box-title">No hay pacientes en sala de espera</h3>
				  <?Php } ?>
				  <input type="text" id="buscar_table" class="form-control input-sm pull-right" style="width: 200px;" placeholder="Buscar">
                </div><!-- /.box-header -->
				
				<div class="box-body">			
		
  <table id="pacientes_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
						<th>Hora llegada</th>
						<th>Paciente</th>
						<th>Estado</th>
						<th width="15%">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php if(is_array($pac_terapias) && count($pac_terapias) ){
						$numero=1;
						foreach($pac_terapias as $row){ ?>
							<tr>
		  
						  <td><?=  $numero++ ?></td>
						  <td><?= $row['hora_llegada']; ?></td>
						  <td><?= $row['pnombre'] ?> <?= $row['papellido'] ?> <?Php if($row['cedula']){ echo 'C.I. '.$row['cedula']; }  ?></td>
						  <td>
						  <span id="label_status<?= $row['id'];?>">
						  <?Php if($row['estado'] == 1){ echo '<span class="text-red">En espera</span>'; }else{ echo '<span class="text-green">Atendido</span>';} ?>
						  </span>
						  <input type="hidden" value="<?= $row['estado'] ?>" id="value_status<?= $row['id'];?>">
						  </td>
						  <td>
							
							<i class="fa fa-user-md"  title="Cambiar status" style="cursor:pointer" data-rel="tooltip" data-placement="top" onclick="cambiar_status(<?= $row['id'];?>)"></i>
							&nbsp;&nbsp;&nbsp;			
							<i class="fa fa-file-o"  title="Buscar Orden" style="cursor:pointer" data-rel="tooltip" data-placement="top" onclick="buscar_orden(<?= $row['pacientes_id'];?>)"></i>
							&nbsp;
						   </td>			

						 </tr>
									<?php }} ?>
		
                     </tbody>
                    <tfoot>
                      <tr>
						<th>#</th>
						<th>Hora llegada</th>
						<th>Paciente</th>
						<th>Estado</th>
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
                    <p>No tiene permiso para eliminar datos</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-dismiss="modal">Ok</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

		<div class="modal" id="modalOrdenDialog" role="dialog">
		  <div class="modal-dialog"  role="document" style="width: 40%;">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Seleccione La orden de terapia del paciente</h4>
				</div>
				<div class="modal-body" id="orden-body">
				</div>
			 <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
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
		
		function eliminar_permiso(){ 			
			$('#warning_modal').modal('show');			
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

			
	function cambiar_status(cita) {  
								
				var status 		= document.getElementById('value_status'+cita).value;
				var oldStatus 	= document.getElementById('value_status'+cita).value;

				if(status == 1){
					status = 2;
				}else{
					status = 1;
				}
				
				$.ajax({ 
				   url:'<?= base_url(); ?>sala_espera/cambiar_status_terapia',
				   type: "GET",
				   data: { id: cita, status: status },		   
				   success: function(response){ 
						if(response == true){
						if(oldStatus==1){
									document.getElementById('value_status'+cita).value = 2;
									$('#label_status'+cita).html('<span class="text-green">Atendido</span>');
								}
								else{
									document.getElementById('value_status'+cita).value = 1;
									$('#label_status'+cita).html('<span class="text-red">En espera</span>');
								} 		
						 }	
					} 
				})
				
		};	

	function buscar_orden(paciente){
			
			$.ajax({ 
				   url:'<?= base_url(); ?>terapias/count_ordenes',
				   type: "GET",
				   data: { paciente:paciente },
				   dataType : 'json',				   
				   success: function(response){ 
						if(response.mnj == true){
									$( "#orden-body" ).load("<?= base_url(); ?>terapias/ver_ordenes/"+paciente);
									$('#modalOrdenDialog').modal();
								}
								else
								{
									window.location.href='<?= base_url(); ?>terapias/ver_orden_terapia/'+response.orden;
								} 		
					}	 
				})
				
			
	}
   	
    </script>
	
  </body>
</html>

