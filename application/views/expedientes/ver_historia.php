	
    <div class="box">		
	
                <div class="box-header">
                  <center><h3 style="font-size:bold">Historia Médica</h3></center>
                </div><!-- /.box-header -->
                <!-- form start -->               
						
    <div class="box-body"> 
		
			<div class="row">				   
						<div class="form-group col-xs-10">
						  <label>Fecha:</label> <?= date_format(date_create($historia_medica[0]['fecha']), 'd/m/Y'); ?> <br>
						  <label>Dr.:</label> <?= $historia_medica[0]['pnombre'].' '.$historia_medica[0]['papellido'];  ?>
						</div>		

						<div class="form-group col-xs-2">
						  <label>N° historia:</label> <?= $historia_medica[0]['id']; ?> <br>
						  <label>N° expediente:</label> <?= $historia_medica[0]['expediente_id']; ?>
						</div>							
			  </div>
			  
	<?php if(is_array($paciente) && count($paciente) ){
		foreach($paciente as $row){ ?>	
		
		<h4 style="font-size:bold">Datos personales</h4>
		 
		 <div class="box">
             <br>     				
				   <div class="row">
				   
						<div class="form-group col-xs-5">
						  <label>Paciente:</label>
						  <?= $row['pnombre']; ?> <?= $row['snombre']; ?> <?= $row['papellido']; ?> <?= $row['sapellido']; ?>
						</div>	
				 
					</div>

					<div class="row">
				   
						<div class="form-group col-xs-3">
						  <label>Cédula:</label>
						   <?= $row['cedula']; ?>
						</div>
						<div class="form-group col-xs-3">
						  <label>Fecha de Nacimiento:</label>
						  <?= date_format(date_create($row['fnacimiento']), 'd/m/Y'); ?>
						</div>
						<div class="form-group col-xs-3">
						  <label>Lugar de Nacimiento:</label>
						  <?=$row['lnacimiento']; ?>
						</div>
						<div class="form-group col-xs-3">
						  <label>Edad:</label>
						  <?php echo $row['edad']; if($row['edad']){ echo " años"; } ?> 
						</div>					
				 
					</div>					
					
				<div class="row">				   
						<div class="form-group col-xs-3">
						  <label>Sexo:</label>
						   		<?php if($row['sexo'] == "F"){ echo "Femenino"; }else{ echo "Masculino";} ?> 
						</div>
						<div class="form-group col-xs-3">
						  <label>Estado Civil:</label>
						   <?=$row['civil']; ?>
						</div>
						<div class="form-group col-xs-3">
						  <label>Email:</label>
						  <?php echo $row['email']; ?>
						</div>
						<div class="form-group col-xs-3">
						  <label>Profesi&oacute;n:</label>
						  <?php echo $row['profesion']; ?>
						</div>
						
				 
					</div>						

				<div class="row">
						<div class="form-group col-xs-3">
						  <label>T&eacute;lefono:</label>
						  <?php echo $row['tlf']; ?>
						</div>
						<div class="form-group col-xs-4">
						  <label>Direcci&oacute;n:</label>
						   <?php echo $row['direccion']; ?>
						</div>										 
				</div>				
				
				 <?php if($row['rlegal']){ ?>
				<div class="row">
				<br>
				 <div class="col-md-6">
						  <div class="box-header">
						  <h3 class="box-title">Representante Legal</h3>
						  </div>
						  <div class="box-body">
						<div class="form-group col-xs-6">
						  <label>Nombre:</label>
						   <?php echo $row['rlegal']; ?>
						</div>
						<div class="form-group col-xs-6">
						  <label>Parentesco:</label>
						  <?php echo $row['p_rlegal']; ?>
						</div>
						</div>
				 </div>
					</div>						
				
				 <?php } ?>
		<?php }} ?>
 </div>
 
  <?php if(is_array($historia_medica) && count($historia_medica) ) {
		foreach($historia_medica as $row){ ?>	
	
 <h4 style="font-size:bold">Antecedentes Personales y Familiares</h4>
		 
		 <div class="box">
             <br>     		

					<div class="row">				   
						<div class="form-group col-xs-6">
						  <label>Médicos</label>
						 <textarea readonly name="med_cabecera" class="form-control"><?= $row['med_cabecera']; ?></textarea>
						</div>
						<div class="form-group col-xs-6">
						  <label>Alergias</label>
						   <textarea readonly name="alergias" class="form-control"><?= $row['alergias']; ?></textarea>
						</div>
					</div>	
					
					<div class="row">
						<div class="form-group col-xs-6">
						  <label>Qx</label>
						   <textarea readonly name="qx"  class="form-control"><?= $row['qx']; ?></textarea>
						</div>
						<div class="form-group col-xs-6">
						  <label>Ant. familiares</label>
						   <textarea  readonly name="antec_flia" class="form-control"><?= $row['antec_flia']; ?></textarea>
						</div>									 
					</div>	
			</div>
			
 <h4 style="font-size:bold">Antecedentes Gineco-obstétricos</h4>
		 
		 <div class="box">
             <br>   			
					<div class="row">				   
						<div class="form-group col-xs-4">
						  <label>Menarquia</label>
						  <input type="text" readonly class="form-control" name="menarquia" value="<?= $row['menarquia']; ?>">
						</div>
						<div class="form-group col-xs-4">
						  <label>Mentruación</label>
						  <input type="text" readonly class="form-control" name="menstruacion" value="<?= $row['menstruacion']; ?>">
						</div>
					<div class="form-group col-xs-4">
						  <label>Regularidad</label>
						  <input type="text" readonly class="form-control" name="regularidad_menst" value="<?= $row['regularidad_menst']; ?>">
						</div>
					</div>
					<div class="row">				   
						<div class="form-group col-xs-3">
						  <label>Embarazos</label>
						  <input type="text" readonly class="form-control" name="embarazos" value="<?= $row['embarazos']; ?>">
						</div>
						<div class="form-group col-xs-3">
						  <label>Partos</label>
						  <input type="text" readonly class="form-control" name="partos" value="<?= $row['partos']; ?>">
						</div>
					<div class="form-group col-xs-3">
						  <label>Cesareas</label>
						  <input type="text" readonly class="form-control" name="cesarias" value="<?= $row['cesarias']; ?>">
						</div>
						<div class="form-group col-xs-3">
						  <label>Abortos</label>
						  <input type="text" readonly class="form-control" name="abortos" value="<?= $row['abortos']; ?>">
						</div>
					</div>
			</div>	
			
<h4 style="font-size:bold">Hábitos Alimenticios</h4>
		 
		 <div class="box">
             <br> 
					<div class="row">				   
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select readonly class="form-control" name="leche">
								  <option value="<?= $row['leche']; ?>"><?= $row['leche']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Leche</label>						 
						</div>
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select readonly class="form-control" name="vegetales">
								  <option value="<?= $row['vegetales']; ?>"><?= $row['vegetales']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Vegetales</label>						 
						</div>
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select readonly class="form-control" name="frutas">
								  <option value="<?= $row['frutas']; ?>"><?= $row['frutas']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Frutas</label>						 
						</div>
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select readonly class="form-control" name="cereales">
								  <option value="<?= $row['cereales']; ?>"><?= $row['cereales']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Cereales</label>						 
						</div>
					</div>	
					<div class="row">				   
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select readonly class="form-control"  name="carnes">
								<option value="<?= $row['carnes']; ?>"><?= $row['carnes']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Carnes</label>						 
						</div>
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select readonly class="form-control" name="granos">
								  <option value="<?= $row['granos']; ?>"><?= $row['granos']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Granos</label>						 
						</div>
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select readonly class="form-control" name="grasas">
								  <option value="<?= $row['grasas']; ?>"><?= $row['grasas']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Grasas</label>						 
						</div>
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select readonly class="form-control" name="almidones">
								 <option value="<?= $row['almidones']; ?>"><?= $row['almidones']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Almidones</label>						 
						</div>
					</div>	
					<div class="row">
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select readonly class="form-control" name="dulces">
								  <option value="<?= $row['dulces']; ?>"><?= $row['dulces']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Dulces</label>						 
						</div>
						<div class="form-group col-xs-3">
						 <div class="col-xs-5">
						  <select readonly class="form-control" name="cafe_leche">
								  <option value="<?= $row['cafe_leche']; ?>"><?= $row['cafe_leche']; ?></option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  <option value="6">6</option>
								  <option value="7">7</option>
						</select>
						</div>
						  <label>/7 Café con Leche</label>						 
						</div>						
					</div>						
		 </div>	

<h4 style="font-size:bold">Hábitos Psicobiológicos</h4>
		 
		 <div class="box">
             <br>   			
					<div class="row">				   
						<div class="form-group col-xs-4">
						  <label>Alcohol</label>
						  <input type="text" class="form-control" name="alcohol" readonly value="<?= $row['alcohol']; ?>">
						</div>
						<div class="form-group col-xs-4">
						  <label>Tábaquicos</label>
						  <input type="text" class="form-control" name="tabaquicos" readonly value="<?= $row['tabaquicos']; ?>">
						</div>
						<div class="form-group col-xs-4">
						  <label>Cafeicos</label>
						  <input type="text" class="form-control" name="cafeicos" readonly value="<?= $row['cafeicos']; ?>">
						</div>
					</div>
					<div class="row">				   
						<div class="form-group col-xs-6">
						  <label>Medicamentos</label>
						 <textarea  name="medicamentos"  class="form-control" readonly><?= $row['medicamentos']; ?></textarea>
						</div>
						<div class="form-group col-xs-6">
						  <label>Otros</label>
						 <textarea  name="otros" class="form-control" readonly><?= $row['otros']; ?></textarea>
						</div>
					</div>
			</div>	
			
<h4 style="font-size:bold">Examen Funcional</h4>
		 
		 <div class="box">
             <br>   			
					<div class="row">				   
						<div class="form-group col-xs-6">
						  <label>Evaciaciones</label>
						  <input type="text" class="form-control" name="evacuacion" readonly value="<?= $row['evacuacion']; ?>">
						</div>
						<div class="form-group col-xs-6">
						  <label>Micciones</label>
						  <input type="text" class="form-control" name="miccion" readonly value="<?= $row['miccion']; ?>">
						</div>
					</div>
					<div class="row">				   
						<div class="form-group col-xs-6">
						  <label>Observaciones</label>
						 <textarea  name="obs"  class="form-control" readonly ><?= $row['obs']; ?></textarea>
						</div>
					</div>
			</div>		
	</div>	<!-- /.box-body -->			
 
</div>
<?php }} ?>
