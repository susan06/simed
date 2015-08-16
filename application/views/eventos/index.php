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
           Eventos <small>- Crear</small>
          </h1>
        </section>
		
		<span class="ir-arriba"><i class="fa fa-level-up"></i></span>
		
        <!-- Main content -->
        <section class="content">

          <div class='row'>

		   <div class="col-md-6">
					  <div class="box box-primary">
						<div class="box-header">
						  <h3 class="box-title">Crear evento</h3>
						</div>
						<div class="box-body">
						      <form method="post" id="form_evento" action="<?php echo base_url(); ?>eventos/guardar">  
						  <!-- Date and time range -->
						  <div class="form-group">
							<label>Nombre:</label>
							<div class="form-group">
							  <input type="text" name="title"	class="form-control"/>
							</div><!-- /.input group -->
						  </div><!-- /.form group -->

						  <!-- Date and time range -->
						  <div class="form-group">
							<label>Rango de fecha y hora:</label>
							<div class="input-group">
							  <div class="input-group-addon">
								<i class="fa fa-clock-o"></i>
							  </div>
							  <input type="text" class="form-control pull-right" name="fecha" id="reservationtime"/>
							</div><!-- /.input group -->
						  </div><!-- /.form group -->

						<div class="form-group">
							<label>Color:</label>
							<div class="input-group my-colorpicker2">
							  <input type="text" class="form-control" name="backgroundColor"/>
							  <div class="input-group-addon">
								<i></i>
							  </div>
							</div><!-- /.input group -->
						  </div><!-- /.form group -->

						</div><!-- /.box-body -->
	 
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>	
					  </div><!-- /.box -->	
					
                </form>					  
			</div>
		  
		  
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
    <!-- SlimScroll -->
    <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=base_url()?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/app.min.js" type="text/javascript"></script>

    <!-- Form -->
    <script src='<?=base_url()?>assets/plugins/jQuery_validate/lib/jquery.form.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/jquery.validate.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/additional-methods.js'></script>
	<script src='<?=base_url()?>assets/plugins/jQuery_validate/dist/localization/messages_es.js'></script>
	
	<!-- date-range-picker -->
	<script src="<?=base_url()?>assets/plugins/fullcalendar/moment.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- bootstrap color picker -->
    <script src="<?=base_url()?>assets/plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>	
 	
	<script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
	<script src="<?=base_url()?>assets/js/scripts_form.js" type="text/javascript"></script>

 <!-- Page script -->
    <script type="text/javascript">
      $(function () {

        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'DD-MM-YYYY h:mm A'});

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({
          showInputs: false
        });
      });
    </script>

  </body>
</html>

