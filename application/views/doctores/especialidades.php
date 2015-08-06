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
            Doctores <small>- Especialidades</small>
          </h1>
        </section>
		
		<span class="ir-arriba"><i class="fa fa-level-up"></i></span>
		
        <!-- Main content -->
        <section class="content">

          <div class='row'>
            <div class='col-md-12'>
  

    <div class="row">
            <div class="col-md-6">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Especialidades de <?=  $doctor[0]['pnombre'] ?> <?=  $doctor[0]['papellido'] ?> </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Especialidad</th>
                    </tr>
					  <?php if(is_array($espec_doctor) && count($espec_doctor) ){
						$numero=1;
						foreach($espec_doctor as $row){ ?>
                    <tr>
                      <td><?=  $numero++ ?></td>
                      <td><?=  $row['nombre']; ?> </td>
                    </tr>
					<?php }}else{
						echo "<td></td>";
						echo "<td>No tiene especialidades asociadas</td>";						
					} ?>
                  </table>
                </div><!-- /.box-body -->
			</div>
         </div> 
		</div>
		
		 <div class="row">
		  <div class="col-md-6">
		 <div class="box">
                 <div class="box-header with-border">
                  <h3 class="box-title">Asociar nueva especialidad</h3>
                </div><!-- /.box-header -->
				 <div class="box-body">
					<div class="form-group col-md-9">
						  <select class="form-control" name="especialidades_id">
							<option value="">Seleccione especialidad</option>
							 <?php if(is_array($especialidades) && count($especialidades) ){
								foreach($especialidades as $row){
								echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
							 }}else{
								echo '<option value="">No hay especialidades</option>';					
							} ?>
						  </select>
					  </div>
					</div>
					<div class="form-group col-md-9">
						<h6>Si no aparece su especialidad, puede agregarla a través del menú especialidades</h6>
					</div>
					 <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right">Asociar</button>
                  </div>
                
				  <input type="hidden" name="doctores_id" value="<?=  $doctor[0]['id'] ?>">  
				</div><!-- /.box -->
			 </div> 	
         </div><!-- ./row -->
		
		</div> 
		  
        </section><!-- /.content -->
		
		
            <div class="modal modal-warning" id="warning_modal" role="dialog">
              <div class="modal-dialog"  role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Permisos</h4>
                  </div>
                  <div class="modal-body">
                    <p><?php echo $this->session->flashdata('warning_modal'); ?></p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline" data-dismiss="modal">Ok</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

		
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


  </body>
</html>

