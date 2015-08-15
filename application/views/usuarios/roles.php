	<?php $this->load->view('layouts/doctype.php');	 ?>	

    <div class="wrapper">
	
	<?php $this->load->view('layouts/header.php');	 ?>	
	<?php $this->load->view('layouts/menu.php');	 ?>	
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Usuarios<small>| Roles</small>
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
						  <td><div class='col-md-6'>
								 <select class="form-control" onChange="rol(this.value,<?= $row['id']?>)">
									<option value="<?= $row['roles_id'] ?>"> <?= $this->crud_model->get_name_rol($row['roles_id']); ?></option>	
									<?php if($row['roles_id'] != 1){ echo	'<option value="1">Administrador</option>';	  }?>
									<?php if($row['roles_id'] != 2){ echo	'<option value="2">Enfermera</option>';	  }?>								
									<?php if($row['roles_id'] != 4){ echo	'<option value="4">Terapista</option>';	  }?>
									<?php if($row['roles_id'] != 5){ echo	'<option value="5">Secretaria</option>';	  }?>																
								</select> 
						  </div>
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
		  
        $("#usuarios_table").dataTable();

      });	
	  
	  	function rol(rol,id){ 
		   $.ajax({ 
			   url:'<?php echo base_url() ?>usuarios/cambiar_rol',
			   type: "POST",
			   data: {'id':id, 'rol':rol},
				success: function(response){ 
					 location.reload();
				} 			   
			})
			
		};
		
    </script>
	
  </body>
</html>

