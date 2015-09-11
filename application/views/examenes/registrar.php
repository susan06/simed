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
           Exámenes <small>- Registrar</small>
          </h1>
        </section>
		
		<span class="ir-arriba"><i class="fa fa-level-up"></i></span>
		
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

		<div class="col-md-7">
              <!-- general form elements disabled -->
              <div class="box box-warning">
                <div class="box-body">
				
                  <form method="post" name="form_examen" id="form_examen" action="<?php echo base_url(); ?>examenes/guardar">  
                    
					<div class="row">
                    <div class="form-group col-xs-8">
                      <label>Paciente</label>
					<div class="row">	
					  <div class="col-xs-12">
                      <input type="text" class="form-control" id="pacientes" placeholder="Escriba aqui para buscar"/>
					  <input type="hidden" name="expediente_id" id="expediente_id" required />
                    </div> 
					</div> 
					</div>
					 <div class="form-group col-xs-4">
						<label>Cédula</label>
						<div class="row">				 
						<div class="col-xs-12">
						  <input type="text" class="form-control" id="cedula" readonly />						  
						</div> 
						</div>
					</div> 
					</div>
					<div class="form-group">
						<label>Fecha</label>
						<div class="row">				 
						<div class="col-xs-4">
						  <input type="text" name="fecha" class="form-control" id="fecha" value="<?= date('d-m-Y') ?>"/>
						</div> 
						</div>
					</div> 
					<div class="form-group">
						<label>Tipo de exámen</label>
						<div class="row">				 
						<div class="col-xs-8">
						  <input type="text" name="tipo" id="tipo" required class="form-control" value="">
						</div> 
						</div>
					</div> 
					<div class="form-group">
						<label>Resultados</label>
						<div class="row">				 
						<div class="col-xs-8">
						  <textarea name="resultado" class="form-control"></textarea>
						</div> 
						</div>
					</div>
					<div class="form-group">
						<label>tratamiento</label>
						<div class="row">				 
						<div class="col-xs-8">
						  <textarea name="tratamiento" class="form-control"></textarea>
						</div> 
						</div>
					</div>
					<div class="form-group">
						<label>Observaciones</label>
						<div class="row">				 
						<div class="col-xs-8">
						  <textarea name="obs_exam" class="form-control"></textarea>
						</div> 
						</div>
					</div>					
				</div><!-- /.box-body -->
				   <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right">Registrar</button>
                  </div>
				  </form>
              </div><!-- /.box -->
         </div><!--/.col (right) -->
	  
		  
          </div><!-- ./row -->
		  
		  
        </section><!-- /.content -->
		
		
		  </div>
		  <!-- /.modal-dialog --> 
		</div>	

		
      </div><!-- /.content-wrapper -->
	  
	  <?php $this->load->view('layouts/footer.php');	 ?>
	
	 
	 
    </div><!-- ./wrapper -->

   <!-- jQuery -->
    <script src="<?=base_url()?>assets/plugins/jQuery/jquery-1.11.3.min.js"></script>
	<!-- jQuery UI 1.11.2 -->
    <script src="<?=base_url()?>assets/plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>	
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_url()?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=base_url()?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/app.min.js" type="text/javascript"></script>

	<script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
	
	<script src="<?=base_url()?>assets/js/datepicker-es.js" type="text/javascript"></script>
	
	   <!-- Form -->
    <script src='<?=base_url()?>assets/plugins/jQuery_validate/lib/jquery.form.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/jquery.validate.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/additional-methods.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/localization/messages_es.js'></script>
	
	<script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
	<script src="<?=base_url()?>assets/js/scripts_form.js" type="text/javascript"></script>
	
		<script type="text/javascript">	
		
		$(document).ready(function(){					
	
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
	   
		</script>	

  </body>
</html>

