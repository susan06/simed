	<?php $this->load->view('layouts/doctype.php');	 ?>	

    <div class="wrapper">
	
	<?php $this->load->view('layouts/header.php');	 ?>	
	<?php $this->load->view('layouts/menu.php');	 ?>	
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Perfil <small>- Doctor</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
				
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
              <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header">
	<?php if(is_array($doctor_editar) && count($doctor_editar) ) {
						foreach($doctor_editar as $row){ ?>
						
                  <h3 class="box-title">Datos del doctor(a): <?php echo $row['pnombre'];?> <?php echo $row['papellido'];?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                 <form method="post" name="form_doctor" id="form_doctor" onsubmit="return checkSubmit()" action="<?php echo base_url(); ?>doctores/actualizar">  
		
                  <div class="box-body">
                    <div class="form-group">
                      <label>Nombre</label>
                      <input type="text" class="form-control" name="pnombre" value="<?php echo $row['pnombre'];?>" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                      <label>Apellido</label>
                      <input type="text" class="form-control" name="papellido" value="<?php echo $row['papellido'];?>" placeholder="Apellido">
                    </div>
					<div class="form-group">
                      <label>Cédula</label>
                      <input type="text" name="cedula" class="form-control" value="<?= $row['cedula']; ?>" placeholder="cédula">
                    </div>
					<div class="form-group">
                      <label>RIF</label>
                      <input type="text" name="rif" class="form-control" value="<?= $row['rif']; ?>" placeholder="RIF">
                    </div>
					<div class="form-group">
                      <label>MPPS</label>
                      <input type="text" name="mpps" class="form-control" value="<?= $row['mpps']; ?>" placeholder="MPPS">
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right">Guardar cambios</button>
                  </div>
                
				<input type="hidden" name="id" value="<?php echo $row['id'];?>">  

				<?php }  } ?>	
				
				</form>
				
              </div><!-- /.box -->
          </div>
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
   
   <!-- Form -->
    <script src='<?=base_url()?>assets/plugins/jQuery_validate/lib/jquery.form.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/jquery.validate.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/additional-methods.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/localization/messages_es.js'></script>

  <!-- SlimScroll -->
    <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=base_url()?>assets/plugins/fastclick/fastclick.min.js'></script>
        <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/app.min.js" type="text/javascript"></script>
	
	<script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
	<script src="<?=base_url()?>assets/js/scripts_form.js" type="text/javascript"></script>
			 
  </body>
</html>

