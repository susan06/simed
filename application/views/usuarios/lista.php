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
						<th>Status</th>
						<th>Editar</th>
						<th>Eliminar</th>
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
							<input type="image" src="<?php echo base_url(); ?>media/images/botones/editar_icono.png" class="editar_btn" alt="editar"  onClick="window.parent.location='<?php echo base_url(); ?>/index.php/usuarios/editar/<?php echo $row['id'];?>'" >
						  </td>
						  <td>
							<?php									
							if (in_array($borrar, $permisos )){ 
							?>
							 <input type="image" src="<?php echo base_url(); ?>media/images/botones/eliminar_icono.gif" class="borrar_btn" alt="borrar" 
									onclick="eliminar(<?php echo $row['id'];?>,'lista_usuarios', '<?php echo base_url(); ?>index.php/usuarios/eliminar','<?php echo base_url() ?>index.php/usuarios/load_lista_usuarios')" >
							<?php	
								}else{
							?>
							<input type="image" src="<?php echo base_url(); ?>media/images/botones/eliminar_icono.gif" class="borrar_btn" alt="borrar" onclick="eliminar_permiso()" >
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
						<th>Editar</th>
						<th>Eliminar</th>
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

    <!-- Demo -->
    <script src="<?=base_url()?>assets/dist/js/demo.js" type="text/javascript"></script>
	
	<!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#usuarios_table").dataTable();
      });
	  
	  	function activar(id){ 

		   $.ajax({ 
			   url:'<?php echo base_url() ?>index.php/usuarios/status',
			   type: "POST",
			   data: 'id='+id,		   
			   success: function(response){ 
					if(response == true){
					 $("#status"+id).html("<span class='text-green'> Activo </span>");
					 }	
					} 
				})
		};
		
    </script>
	
  </body>
</html>

