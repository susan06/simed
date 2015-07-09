	<?php $this->load->view('layouts/doctype.php');	 ?>	
	
  <body class="skin-green-light sidebar-mini">
    <div class="wrapper">
	
	<?php $this->load->view('layouts/header.php');	 ?>	
	<?php $this->load->view('layouts/menu.php');	 ?>	
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Usuarios<small></small>
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
                  <h3 class="box-title">Usuarios registrados</h3>
				  <input type="text" id="buscar_table" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="usuarios_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
						<th>Usuario</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Rol</th>
						<th>Status</th>
						<th width="10%">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php if(is_array($usuarios) && count($usuarios) ){
						$numero=1;
						foreach($usuarios as $row){ ?>
							<tr>
		  
						  <td><?=  $numero++ ?></td>
						  <td><?=  $row['nick']; ?></td>
						  <td><?=  $row['pnombre']; ?> <?php echo $row['papellido']; ?></td>
						  <td><?=  $row['email']; ?></td>
						  <td><?= $this->crud_model->get_name_rol($row['roles_id']); ?></td>
						  <td>
						  <span id="status<?= $row['id']; ?>" >
								<?php if($row['status_id'] == 0){ ?>
								 <select class="text-red form-control" onChange="activar(this.value)">
									<option value="">Inactivo</option>
									<option class="text-aqua" value="<?= $row['id']; ?>">Activo</option>			
									<?php 
									}else{ 
										echo '<span class="text-green"> Activo </span>';
									} ?>
								  </select>   
						 </span>
						 </td>
						  <td>
							<?php									
							if (in_array($borrar, $permisos )){ 
							?>
							
							<i title="Eliminar" style="cursor:pointer" class="fa fa-trash-o" onclick="eliminar(<?= $row['id'];?>, '<?= base_url(); ?>usuarios/eliminar')"></i>

							<?php	
								}else{
							?>
							
							<i class="fa fa-trash-o" onclick="eliminar_permiso()"></i>

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
						<th>Usuario</th>
						<th>Nombre</th>
						<th>Email</th>
						<th>Rol</th>
						<th>Status</th>
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
                    <p>No tiene permiso para eliminar usuarios</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-dismiss="modal">Ok</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
			
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
		  
        $("#usuarios_table").dataTable({
	
			});

		 oTable = $('#usuarios_table').dataTable();
		 
		 $('#buscar_table').keyup(function(){ oTable.fnFilter( $(this).val() )});
		 
      });	
	 
	  
	  	function activar(id){ 

		   $.ajax({ 
			   url:'<?php echo base_url() ?>usuarios/status',
			   type: "POST",
			   data: 'id='+id,		   
			   success: function(response){ 
					if(response == true){
					 $("#status"+id).html("<span class='text-green'> Activo </span>");
					 }	
					} 
				})
		};

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
		
    </script>
	
  </body>
</html>

