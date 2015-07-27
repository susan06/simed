	<?php $this->load->view('layouts/doctype.php');	 ?>	

    <div class="wrapper">
	
	<?php $this->load->view('layouts/header.php');	 ?>	
	<?php $this->load->view('layouts/menu.php');	 ?>	
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Pacientes <small>- Registrar</small>
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
              <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Informaci&oacute;n del Paciente</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                 <form method="post" name="form_pac" id="form_paciente" onsubmit="return checkSubmit(form_paciente)" action="<?php echo base_url(); ?>pacientes/guardar">  
						
                  <div class="box-body">
				   
				   <div class="row">
				   
						<div class="form-group col-xs-3">
						  <label>Primer Nombre</label>
						  <input type="text" class="form-control" name="pnombre" placeholder="Primer Nombre">
						</div>
						<div class="form-group col-xs-3">
						  <label>Segundo Nombre</label>
						  <input type="text" class="form-control" name="snombre" placeholder="Segundo Nombre">
						</div>
							<div class="form-group col-xs-3">
						  <label>Primer Apellido</label>
						  <input type="text" class="form-control" name="papellido" placeholder="Primer Apellido">
						</div>
						<div class="form-group col-xs-3">
						  <label>Segundo Apellido</label>
						  <input type="text" class="form-control" name="sapellido" placeholder="Segundo Apellido">
						</div>
				 
					</div>

					<div class="row">
				   
						<div class="form-group col-xs-3">
						  <label>Cédula</label>
						  <input type="text" class="form-control" name="cedula" placeholder="Cédula">
						</div>
						<div class="form-group col-xs-3">
						  <label>Fecha de Nacimiento</label>
						  <input type="text" class="form-control" name="fnacimiento" placeholder="Fecha de nacimiento" onBlur="calcular_edad(this.value)" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
						</div>
						<div class="form-group col-xs-3">
						  <label>Lugar de Nacimiento</label>
						  <input type="text" class="form-control" name="lnacimiento" placeholder="Lugar de nacimiento">
						</div>
						<div class="form-group col-xs-3">
						  <label>Edad</label>
						  <input type="text" class="form-control" name="edad" id="edad" placeholder="Edad">
						</div>					
				 
					</div>					
					
				<div class="row">
				   
						<div class="form-group col-xs-3">
						  <label>Sexo</label>
						   		<select class="form-control" name="sexo" onChange="select_civil(this.value)" required>
								  <option value="">Seleccione un sexo</option>
								  <option value="F">Femenino</option>
								  <option value="M">Masculino</option>
								</select>
						</div>
						<div class="form-group col-xs-3">
						  <label>Estado Civil</label>
						  <select class="form-control" id="civil" name="civil" required>
								  <option value="">Seleccione primero el sexo</option>
								</select>
						</div>
						<div class="form-group col-xs-3">
						  <label>Email</label>
						  <input type="email" class="form-control" name="email" placeholder="Email">
						</div>
						<div class="form-group col-xs-3">
						  <label>Profesi&oacute;n</label>
						  <input type="text" class="form-control" name="profesion" placeholder="Profesión">
						</div>
						
				 
					</div>						

				<div class="row">
						<div class="form-group col-xs-3">
						  <label>T&eacute;lefono</label>
						  <input type="text" class="form-control" name="tlf" placeholder="Télefono" data-inputmask='"mask": "(9999) 999.99.99"' data-mask>
						</div>
						<div class="form-group col-xs-4">
						  <label>Direcci&oacute;n</label>
						   <textarea name="direccion" class="form-control" placeholder="Dirección"></textarea>
						</div>										 
				</div>				
				
				<div class="row" id="showRepresentante" style="display:none">
				<br><br>
				 <div class="col-md-5">
						  <div class="box box-info">
						  <div class="box-header">
						  <h3 class="box-title">Representante Legal</h3>
						  </div>
						  <div class="box-body">
						<div class="form-group col-xs-6">
						  <label>Nombre</label>
						  <input type="text" class="form-control" name="rlegal" placeholder="Nombre del representante">
						</div>
						<div class="form-group col-xs-6">
						  <label>Parentesco</label>
						  <input type="text" class="form-control" name="p_rlegal" placeholder="Parentesco">
						</div>
						</div></div>
				 </div>
					</div>						
				</div>		
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-right" id="boton_submit">Guardar</button>
                  </div>

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
 
 <!-- InputMask -->
    <script src="<?=base_url()?>assets/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
	
  <!-- SlimScroll -->
    <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=base_url()?>assets/plugins/fastclick/fastclick.min.js'></script>
  
  <!-- iCheck 1.0.1 -->
    <script src="<?=base_url()?>assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script> 
  
  <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/app.min.js" type="text/javascript"></script>
	
	<script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
	<script src="<?=base_url()?>assets/js/scripts_form.js" type="text/javascript"></script>
	
 <script type="text/javascript">
 
$(function () {
	$("[data-mask]").inputmask();
	
	});

function calcular_edad(fecha) {
	var fechaActual = new Date();
	var diaActual = fechaActual.getDate();
	var mmActual = fechaActual.getMonth() + 1;
	var yyyyActual = fechaActual.getFullYear();
	FechaNac = fecha.split("/");
	var diaCumple = FechaNac[0];
	var mmCumple = FechaNac[1];
	var yyyyCumple = FechaNac[2];

	if (mmCumple.substr(0,1) == 0) {
		mmCumple= mmCumple.substring(1, 2);
	}

	if (diaCumple.substr(0, 1) == 0) {
		diaCumple = diaCumple.substring(1, 2);
	}

	var edad = yyyyActual - yyyyCumple;

	if ((mmActual < mmCumple) || (mmActual == mmCumple && diaActual < diaCumple)) {
		edad--;
	}
  
  document.getElementById('edad').value=edad;
  
  if(edad < 18){
	  document.getElementById("showRepresentante").style.display="block";
  }
}	

function select_civil(sexo){

	if(sexo == "F"){
		$('#civil').html("<option value=''>Seleccione estado civil</option><option value='Casada'>Casada</option><option value='Soltera'>Soltera</option>");
	}else{
		$('#civil').html("<option value=''>Seleccione estado civil</option><option value='Casado'>Casado</option><option value='Soltero'>Soltero</option>");
	}
}
 
</script>		
	 
  </body>
</html>

