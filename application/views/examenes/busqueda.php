	<?php $this->load->view('layouts/doctype.php');	 ?>	
	
    <div class="wrapper">
	
	<?php $this->load->view('layouts/header.php');	 ?>	
	<?php $this->load->view('layouts/menu.php');	 ?>	
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
         Búsqueda de exámenes<small></small>
          </h1>
        </section>

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
                  <h3 class="box-title col-xs-5"><input type="text" class="form-control" id="pacientes" placeholder="Escriba aqui para buscar paciente"/></h3>				 
				  <h3 class="box-title col-xs-2"><input type="text" class="form-control" id="cedula" placeholder="Cédula" readonly /></h3>
				  <input type="hidden" id="expediente_id" />
				<button type="button" class="btn btn-success" onclick="examenes_paciente( $('#expediente_id').val())">Buscar</button>
				</div>
				
                <div class="box-body" id="examenes_load">

                  
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
                    <p>No tiene permiso para eliminar exámenes</p>
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
                    <p>No tiene permiso para editar los exámenes del Paciente</p>
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
					<h4 class="modal-title">Datos del exámen</h4>
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

		<div class="modal" id="modalEditDialog" role="dialog">
		  <div class="modal-dialog"  role="document" style="width: 50%;">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Editar datos del exámen</h4>
				</div>
						<div class="modal-body" id="edit-body">
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
	
	<script src="<?=base_url()?>assets/js/datepicker-es.js" type="text/javascript"></script>
	
	  <!-- all -->
    <script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>

	<!-- page script -->
    <script type="text/javascript">
	
	$(document).ready(function () {	
	
		$("#pacientes").autocomplete({
					source: '<?= base_url(); ?>pacientes/autocomplete_exp',
					minlength:2,
					html:true,
					select: function(event, ui) {								
								event.preventDefault();
								$(this).val(ui.item.label);
								$("#expediente_id").val(ui.item.id);
								$("#cedula").val(ui.item.ci);
							}
		});	
		
     });	

		function examenes_paciente(expediente){ 

							$.ajax({
									data: {expediente:expediente},
									url:   '<?= base_url(); ?>examenes/examenes_busqueda',
									type:  'post',
									success:  function (response) {
											$("#examenes_load").html(response);
									}
							});
   
		} 

		function ver_examen(id){
			
			$( "#pac-body" ).load( "<?= base_url(); ?>examenes/ver/"+id );
			$('#modalPacDialog').modal();
		}	
		
		function editar_examen(id){ 
		    $( "#edit-body" ).load( "<?= base_url(); ?>examenes/editar/"+id );
			$('#modalEditDialog').modal();	
		}	
		
		function eliminar_permiso(){ 			
			$('#warning_modal').modal('show');			
		};	

		function editar_permiso(){ 			
			$('#warning_edit_modal').modal('show');			
		};	
		
		function eliminar(id, expediente, url_delete){
		
			bootbox.confirm("Estas seguro de eliminar el registro?", function(result) {
			  $.ajax({ 
							url: url_delete,
							type:'POST',
							data:'id='+id,
							success: function(){
							 examenes_paciente(expediente);
							}
					   })
			}); 
		} 
				
    </script>
	
  </body>
</html>

