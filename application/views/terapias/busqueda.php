	<?php $this->load->view('layouts/doctype.php');	 ?>	
	
    <div class="wrapper">
	
	<?php $this->load->view('layouts/header.php');	 ?>	
	<?php $this->load->view('layouts/menu.php');	 ?>	
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
         Búsqueda de orden de terapia<small></small>
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
                  <h3 class="box-title col-xs-2"><input type="text" class="form-control" id="orden" placeholder="N° de orden"/></h3>				 
				 <button type="button" class="btn btn-success" onclick="orden( $('#orden').val())">Buscar</button>
				</div>

				<div class="box-header">
                  <h3 class="box-title col-xs-5"><input type="text" class="form-control" id="pacientes" placeholder="Escriba aqui para buscar paciente"/></h3>				 
				  <h3 class="box-title col-xs-2"><input type="text" class="form-control" id="cedula" placeholder="Cédula" readonly /></h3>
				  <input type="hidden" id="expediente_id" />
				<button type="button" class="btn btn-success" onclick="orden_paciente( $('#expediente_id').val())">Buscar</button>
				</div>
				
                <div class="box-body" id="terapias_load">

                  
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
	 
		function orden(orden){ 
            $("#pacientes").val("");
			$("#cedula").val("");
			$("#expediente_id").val("");
			
							$.ajax({
									data: {orden:orden},
									url:   '<?= base_url(); ?>terapias/orden_busqueda',
									type:  'post',
									success:  function (response) {
											$("#terapias_load").html(response);
									}
							});
   
		} 	

		function orden_paciente(expediente){ 
			$("#orden").val("");
			
							$.ajax({
									data: {expediente:expediente},
									url:   '<?= base_url(); ?>terapias/ordenes_busqueda',
									type:  'post',
									success:  function (response) {
											$("#terapias_load").html(response);
									}
							});
   
		} 			
    </script>
	
  </body>
</html>

