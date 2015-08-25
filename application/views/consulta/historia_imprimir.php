<html>
<head>
   <meta charset="UTF-8">
    <title>Historia médica</title>
		<link href="<?=base_url()?>favicon.ico" rel="shortcut icon" type="image/ico" /> 
		    <!-- Bootstrap 3.3.4 -->
    <link href="<?=base_url()?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- Theme style -->
    <link href="<?=base_url()?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
</head>  
<style type='text/css'>
	@page { margin:25px; }
	body { 
	margint-top:20px;
	margin-left:15px;
	margin-right:15px;
	 }
</style>
<body >

<div style="height:60px; margin-bottom:2%; width:95%">
 
   <table cellpadding="1" style="float:left">
  <tr>
    <td><img src='<?=base_url()?>assets/dist/img/logo_impreso.png' width='100' height='45'/></td>
    <td align="center" style="font-size:14px; font-weight: bold;">
	CENTRO M&Eacute;DICO DOCENTE<br>
      Las Cocuizas, C.A.<br>
      <span style="font-size:12px"> RIF. <?= $clinica[0]['rif']; ?> </span>
     </td>
  </tr>
</table>

   <div align="center" style="width:230px; font-weight:bold; float:right; margin-top:2%; margin-right:3%; font-size:18px">
		HISTORIA M&Eacute;DICA
   </div> 

 </div>   
 <?php if(is_array($historia) && count($historia) ){
					foreach($historia as $row){ ?>
					
 <div style="height:50px; width:95%">
       
  <div style="font-size:15px; width:50%; float:left" >
        
  <table align="left" width="50%">
          
     <tr valign="baseline">
      <td nowrap align="left">N&deg; Historia M&eacute;dica: <?php echo $row['id']; ?></td>
     </tr>
             
   <tr valign="baseline">
    <td nowrap align="left">N&deg; Expediente M&eacute;dico: <?php echo $row['expediente_id']; ?></td>
   </tr>

  </table>
  
  </div>
  
   <div style="font-size:15px; width:50%; float:right" >  
    
   <table align="right" width="50%">
                
    <tr valign="baseline">
     <td nowrap align="right">Doctor(a): <span> <?php echo $row['nombre_doc']; ?> <?php echo $row['apellido_doc']; ?></span></td>
  </tr>
                
   <tr valign="baseline">
    <td nowrap align="right">Fecha de Apertura: <?php echo date_format($date = date_create($row['fecha']), 'd/m/Y'); ?></td>
    </tr>
             
   </table>
    
      </div>
         
  </div>
       
       
  	<h4 style="font-size:bold">Datos personales</h4>
		 
		 <div class="box">
  				
				   <div class="row">
				   
						<div class="col-xs-5">
						  <label>Paciente:</label>
						  <?= $row['pnombre']; ?> <?= $row['snombre']; ?> <?= $row['papellido']; ?> <?= $row['sapellido']; ?>
						</div>	
				 	  <div class="col-xs-4">
						  <label>Cédula:</label>
						   <?= $row['cedula']; ?>
						</div>
						<div class="col-xs-3">
						  <label>Edad:</label>
						  <?php echo $row['edad']; ?> 
						</div>	
					</div>

					<div class="row">			   					
						
						<div class="col-xs-4">
						  <label>Fecha de Nac.:</label>
						  <?= date_format(date_create($row['fnacimiento']), 'd/m/Y'); ?>
						</div>
						<div class="col-xs-4">
						  <label>Lugar de Nac.:</label>
						  <?=$row['lnacimiento']; ?>
						</div>
						<div class="col-xs-4">
						  <label>Sexo:</label>
						   		<?php if($row['sexo'] == "F"){ echo "Femenino"; }else{ echo "Masculino";} ?> 
						</div>
					</div>					
					
				<div class="row">
						<div class="col-xs-4">
						  <label>Estado Civil:</label>
						   <?=$row['civil']; ?>
						</div>
						<div class="col-xs-4">
						  <label>Email:</label>
						  <?php echo $row['email']; ?>
						</div> 
					<div class="col-xs-4">
						  <label>T&eacute;lefono:</label>
						  <?php echo $row['tlf']; ?>
						</div>						
				</div>	
				<div class="row">
					<div class="col-xs-4">
						  <label>Profesi&oacute;n:</label>
						  <?php echo $row['profesion']; ?>
					</div>						
						<div class="col-xs-4">
						  <label>Direcci&oacute;n:</label>
						   <?php echo $row['direccion']; ?>
						</div>										 
				</div>				
	
 </div>
 
	
 <h4 style="font-size:bold">Antecedentes Personales y Familiares</h4>
		 
		 <div class="box">
					<div class="row">				   
						<div class="form-group col-xs-6">
						  <label>Médicos</label>
						 <textarea name="med_cabecera" class="form-control"><?= $row['med_cabecera']; ?></textarea>
						</div>
						<div class="form-group col-xs-6">
						  <label>Alergias</label>
						   <textarea name="alergias" class="form-control"><?= $row['alergias']; ?></textarea>
						</div>
					</div>	
					
					<div class="row">
						<div class="form-group col-xs-6">
						  <label>Qx</label>
						   <textarea name="qx"  class="form-control"><?= $row['qx']; ?></textarea>
						</div>
						<div class="form-group col-xs-6">
						  <label>Ant. familiares</label>
						   <textarea  name="antec_flia" class="form-control"><?= $row['antec_flia']; ?></textarea>
						</div>									 
					</div>	
			</div>
			
 <h4 style="font-size:bold">Antecedentes Gineco-obstétricos</h4>
		 
		 <div class="box">		
					<div class="row">				   
						<div class="form-group col-xs-4">
						  <label>Menarquia</label>
						  <input type="text" class="form-control" name="menarquia" value="<?= $row['menarquia']; ?>">
						</div>
						<div class="form-group col-xs-4">
						  <label>Mentruación</label>
						  <input type="text" class="form-control" name="menstruacion" value="<?= $row['menstruacion']; ?>">
						</div>
					<div class="form-group col-xs-4">
						  <label>Regularidad</label>
						  <input type="text" class="form-control" name="regularidad_menst" value="<?= $row['regularidad_menst']; ?>">
						</div>
					</div>
					<div class="row">				   
						<div class="form-group col-xs-3">
						  <label>Embarazos</label>
						  <input type="text" class="form-control" name="embarazos" value="<?= $row['embarazos']; ?>">
						</div>
						<div class="form-group col-xs-3">
						  <label>Partos</label>
						  <input type="text" class="form-control" name="partos" value="<?= $row['partos']; ?>">
						</div>
					<div class="form-group col-xs-3">
						  <label>Cesareas</label>
						  <input type="text" class="form-control" name="cesarias" value="<?= $row['cesarias']; ?>">
						</div>
						<div class="form-group col-xs-3">
						  <label>Abortos</label>
						  <input type="text" class="form-control" name="abortos" value="<?= $row['abortos']; ?>">
						</div>
					</div>
			</div>	
			
<h4 style="font-size:bold">Hábitos Alimenticios</h4>
		 
		 <div class="box">
					<div class="row">				   
						<div class="col-xs-2">
						<?= $row['leche']; ?><label>/7 Leche</label>						 
						</div>
						<div class="col-xs-2">
						  <?= $row['vegetales']; ?><label>/7 Vegetales</label>						 
						</div>
						<div class="col-xs-2">
						 <?= $row['frutas']; ?><label>/7 Frutas</label>						 
						</div>
						<div class="col-xs-2">
						 <?= $row['cereales']; ?><label>/7 Cereales</label>						 
						</div>
						<div class="col-xs-2">
						 <?= $row['carnes']; ?><label>/7 Carnes</label>						 
						</div>
						<div class="col-xs-2">
						<?= $row['granos']; ?><label>/7 Granos</label>						 
						</div>
					</div>	
					<div class="row">				   					
						<div class="col-xs-2">
						<?= $row['granos']; ?><label>/7 Granos</label>						 
						</div>
						<div class="col-xs-2">
						 <?= $row['grasas']; ?><label>/7 Grasas</label>						 
						</div>
						<div class="col-xs-2">
						  <?= $row['almidones']; ?><label>/7 Almidones</label>						 
						</div>
						<div class="col-xs-2">
						 <?= $row['dulces']; ?><label>/7 Dulces</label>						 
						</div>
						<div class="col-xs-3">
						 <?= $row['cafe_leche']; ?><label>/7 Café con Leche</label>						 
						</div>						
					</div>						
		 </div>	

<h4 style="font-size:bold">Hábitos Psicobiológicos</h4>
		 
		 <div class="box">			
					<div class="row">				   
						<div class="col-xs-4">
						  <label>Alcohol</label>
						  <input type="text" class="form-control" name="alcohol" value="<?= $row['alcohol']; ?>">
						</div>
						<div class="col-xs-4">
						  <label>Tábaquicos</label>
						  <input type="text" class="form-control" name="tabaquicos" value="<?= $row['tabaquicos']; ?>">
						</div>
						<div class="col-xs-4">
						  <label>Cafeicos</label>
						  <input type="text" class="form-control" name="cafeicos" value="<?= $row['cafeicos']; ?>">
						</div>
					</div>
					<div class="row">				   
						<div class="col-xs-6">
						  <label>Medicamentos</label>
						 <textarea  name="medicamentos"  class="form-control"><?= $row['medicamentos']; ?></textarea>
						</div>
						<div class="form-group col-xs-6">
						  <label>Otros</label>
						 <textarea  name="otros" class="form-control"><?= $row['otros']; ?></textarea>
						</div>
					</div>
			</div>	
			
<h4 style="font-size:bold">Examen Funcional</h4>
		 
		 <div class="box">  			
					<div class="row">				   
						<div class="col-xs-6">
						  <label>Evaciaciones</label>
						  <input type="text" class="form-control" name="evacuacion" value="<?= $row['evacuacion']; ?>">
						</div>
						<div class="col-xs-6">
						  <label>Micciones</label>
						  <input type="text" class="form-control" name="miccion" value="<?= $row['miccion']; ?>">
						</div>
					</div>
					<div class="row">				   
						<div class="col-xs-6">
						  <label>Observaciones</label>
						 <textarea  name="obs"  class="form-control"><?= $row['obs']; ?></textarea>
						</div>
					</div>
			</div>		
	
  <?php } } ?>
</body>
</html>


