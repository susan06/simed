<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Recipe</title>
		<link href="<?=base_url()?>favicon.ico" rel="shortcut icon" type="image/ico" /> 
	<style type="text/css" media="print">
  @page { 
		size: landscape; 
		margin: 15px;
		}
 body { margin: 10px; } 
</style>
  </head>
  <body onload="window.print();">

<table width="850" align="center">	 

<?php if(is_array($recipe) && count($recipe) ){
	foreach($recipe as $row){ ?> 
  <tr>
    <td align="center">
	<img src="<?=base_url()?>assets/dist/img/logo_impreso.png" class="logo" alt="logo"/><br>
	<span style="font-weight: bold;">CENTRO M&Eacute;DICO DOCENTE</span><br>
    <span style="font-weight: bold;">LAS COCUIZAS, C.A.</span><br>
    RIF. <?= $clinica[0]['rif']; ?> <br>
    <?= $clinica[0]['direccion']; ?> <br>
    <?= $clinica[0]['ciudad']; ?> -Estado <?= $clinica[0]['estado']; ?>. Zona Postal <?= $clinica[0]['postal']; ?>. Tel&eacute;fono: <?= $clinica[0]['tlf']; ?> </td>
    
    <td width="10">&nbsp; &nbsp;</td>
    
 <td align="center">
	<img src="<?=base_url()?>assets/dist/img/logo_impreso.png" class="logo" alt="logo"/><br>
	<span style="font-weight: bold;">CENTRO M&Eacute;DICO DOCENTE</span><br>
    <span style="font-weight: bold;">LAS COCUIZAS, C.A.</span><br>
    RIF. <?= $clinica[0]['rif']; ?> <br>
    <?= $clinica[0]['direccion']; ?> <br>
    <?= $clinica[0]['ciudad']; ?> -Estado <?= $clinica[0]['estado']; ?>. Zona Postal <?= $clinica[0]['postal']; ?>. Tel&eacute;fono: <?= $clinica[0]['tlf']; ?> </td>
  </tr>
  
  <tr>
    <td class="padding-top"><span class="margen-top"><span style="text-decoration:underline; font-weight: bold">Datos del M&eacute;dico: </span><br>
	Nombre y Apellido: <span style="font-weight: bold;"><?= $row['nombre_doc']; ?> <?= $row['apellido_doc']; ?></span> <br>
	RIF: <?= $row['rif']; ?> &nbsp;&nbsp; M.P.P.S: <span> <?= $row['mpps']; ?></span></td>

<td width="10">&nbsp;&nbsp;</td>

   <td class="padding-top"><span class="margen-top"><span style="text-decoration:underline; font-weight: bold">Datos del M&eacute;dico: </span><br>
	Nombre y Apellido: <span style="font-weight: bold;"><?= $row['nombre_doc']; ?> <?= $row['apellido_doc']; ?></span> <br>
	RIF: <?= $row['rif']; ?> &nbsp;&nbsp; M.P.P.S: <span> <?= $row['mpps']; ?></span></td>
  </tr>
  
  <tr>
    <td align="left">Fecha: <?php echo date_format(date_create($row['fecha_emision']), 'd/m/Y'); ?> &nbsp;&nbsp; Fecha de Expiraci&oacute;n: <?php if($row['fecha_expiracion']){ echo date_format(date_create($row['fecha_expiracion']), 'd/m/Y');}?> </td>
    
    <td width="10">&nbsp;&nbsp;</td>
    
    <td align="left">Fecha de Emisi&oacute;n: <?php echo date_format(date_create($row['fecha_emision']), 'd/m/Y'); ?></td>
  </tr>
  
  <tr>
    <td height="340" width="390" valign="top" style="border:1px #666666 solid;"><p>&nbsp;&nbsp;R&eacute;cipe:</p>
     <pre style="border:0"><?= $row['rp']; ?> </pre> </td>
    
    <td width="10">&nbsp;&nbsp;</td>
    
    <td height="340" width="390" valign="top" style="border:1px #666666 solid;"><p>&nbsp;&nbsp;Indicaciones:</p>
     <pre style="border:0"><?= $row['indicaciones']; ?> </pre> </td>
  </tr>
  
  <tr>
    <td style="border:1px #666666 solid; padding-top:1%">
    <span style="text-decoration:underline; font-weight: bold">Datos del Paciente:</span><br>
	Nombre y Apellido: <?php echo $row['pnombre']; ?> <?php echo $row['papellido']; ?><br>
	C.I.: <?php echo $row['cedula_pac']; ?> &nbsp;&nbsp;
	A&ntilde;o de Nacimiento: <?php echo date_format(date_create($row['fnacimiento']), 'd/m/Y'); ?> 
	</td>

    <td width="10">&nbsp;&nbsp;</td>
    
    <td style="border:1px #666666 solid; padding-top:1%">
    <span style="text-decoration:underline; font-weight: bold">Datos del Paciente:</span><br>
	Nombre y Apellido: <?php echo $row['pnombre']; ?> <?php echo $row['papellido']; ?></td>
  </tr>
</table>
<?php } }  ?>

  </body>
</html>