<html>
<head>
    <meta charset="UTF-8">
    <title>Orden de terapia</title>
		<link href="<?=base_url()?>favicon.ico" rel="shortcut icon" type="image/ico" />    
<style type='text/css'>
	@page { margin:15px; }
	body { 
	margint-top:25px;
	margin-left:15px;
	margin-right:15px;
	 }
	 	.separador{ 
	 border-left:2px solid #000;
	 }
</style>
</head> 
<body onload="window.print();">
 <div align='center'>
 
 <?php if(is_array($orden) && count($orden) ){
	foreach($orden as $row){ ?> 
	
 <div style="height:60px; margin-bottom:2%">
 
   <table cellpadding="1" style="float:left">
  <tr>
    <td><img src='<?=base_url()?>assets/dist/img/logo_impreso.png' width='100' height='45'/></td>
    <td align="center" style="font-size:14px; font-weight: bold;">
	CENTRO M&Eacute;DICO DOCENTE<br>
      Las Cocuizas, C.A.<br>
      <span style="font-size:12px"> RIF. <?= $clinica[0]['rif']; ?></span>
     </td>
  </tr>
</table>

   <div align="center" style="width:230px; float:right; margin-top:2%; margin-right:3%;">
		<label style='font-weight:bold; font-size:18px'>ORDEN DE TERAPIA</label>
		<label style='font-weight:bold;'>Fecha: </label><?php echo date_format(date_create($row['fecha']), 'd/m/Y'); ?> 
		<br>
		 <label style='font-weight:bold; margin-left:3%'>N&deg; de Orden: </label><?= $row['id'] ?>
   </div> 

 </div> 
 
	<div align='left'>
		 
	 </div>
	 		
 
 <div align='left'>
   <label style='font-weight:bold;'>Paciente: </label> 
	 <?php echo $row['pnombre']; ?> <?php echo $row['papellido']; ?>     
      
     <label style='margin-left:3%;  font-weight:bold'>C.I: </label> 
	 <?php echo $row['cedula_pac'] ?>
	
	<label style='margin-left:3%;  font-weight:bold'>DR: </label>
	<?php echo $row['nombre_doc']; ?> <?php echo $row['apellido_doc']; ?>  
 </div>
 
  <div align='left' style='font-weight:bold; margin-top:1%;'>
     Frecuencia con que debe acudir a tratamiento:
  </div>  
 
   <div align='center'> 
     <table align='center' width="500">
      <tr>
       <td nowrap><label>
    	<input type="radio" name="frecuencia" value="1/semana" class="minimal-red" <?php if (!(strcmp($orden[0]['frecuencia'],"1/semana"))) {echo "checked=\"checked\"";} ?> /> Una vez a la semana
        </label>
       </td> 
      <td nowrap>
      <label> 
		<input type="radio" name="frecuencia" value="2/semana" class="minimal-red" <?php if (!(strcmp($orden[0]['frecuencia'],"2/semana"))) {echo "checked=\"checked\"";} ?>  /> Dos veces por semana	  
       </label>
      </td>
     <td nowrap>
     <label>
	 	<input type="radio" name="frecuencia" value="3/semana" class="minimal-red" <?php if (!(strcmp($orden[0]['frecuencia'],"3/semana"))) {echo "checked=\"checked\"";} ?>  /> Tres veces a la semana
     </label>
     </td>
      <td nowrap>
      <label>
	  	<input type="radio" name="frecuencia" value="diario" class="minimal-red" <?php if (!(strcmp($orden[0]['frecuencia'],"diario"))) {echo "checked=\"checked\"";} ?>  />  Diario
       </label>
       </td>
      </tr>
     </table>  
      </div> 
 
  	<div align="center" style="width:100%; margin-top:1%;">
    
       <table align="center">
	   <tr>
	   <td valign="top">
	   
          <table align="center" cellpadding="0">
            <tr style="font-weight:bold">
              <td>Sueros B&aacute;sicos:</td><td>N°</td>
            </tr>
			<?php 		

			if(is_array($terapias) && count($terapias) ) { foreach($terapias as $row_basico){  ?> 
			<?php if($row_basico['tipo'] == 1){  
			$terapias_check = explode(',', $orden[0]['terapias']);
			$aplicaciones = json_decode($orden[0]['aplicaciones']);
			 ?>        
            <tr>
			<td nowrap>
			<input type="checkbox"  <?php echo((in_array("".$row_basico["id"]."", $terapias_check ))?"checked":"");?>  >
			<?php echo $row_basico['descripcion']; ?>
			</td>
			  <td align="center">
				<input type="text" <?php echo((in_array("".$row_basico["id"]."", $terapias_check ))?"value='".$aplicaciones->{$row_basico['id']}."'":"disabled");?> size="1">
			 </td>
              </tr>
             <?php } }  } ?>
			 <tr style="font-weight:bold">
              <td>Sueros Expec&iacute;ficos:</td><td>N°</td>
            </tr>
			<?php 		
			if(is_array($terapias) && count($terapias) ) { foreach($terapias as $row_sueros){  ?> 
			<?php if($row_sueros['tipo'] == 2 && $row_sueros['id'] <= 11 ){  
			$terapias_check = explode(',', $orden[0]['terapias']);
			$aplicaciones = json_decode($orden[0]['aplicaciones']);
			?>   
            <tr>
			<td nowrap>
			<input type="checkbox" <?php echo((in_array("".$row_sueros["id"]."", $terapias_check ))?"checked=checked":"");?>  >
			<?php echo $row_sueros['descripcion']; ?>
		    </td>
			<td align="center">
			<input type="text"  size="1" <?php echo((in_array("".$row_sueros["id"]."", $terapias_check ))?"value='".$aplicaciones->{$row_sueros['id']}."'":"disabled");?> >
			</td>										
			 </tr>
			<?php } }  } ?>			 
          </table> 
		  
		</td>
		
	    <td valign="top">
 
           <table align="center" cellpadding="0">
            <tr style="font-weight:bold">
              <td>Sueros Expec&iacute;ficos:</td><td>N°</td>
            </tr>
			<?php 		
			if(is_array($terapias) && count($terapias) ) { foreach($terapias as $row_sueros){  ?> 
			<?php if($row_sueros['tipo'] == 2 && $row_sueros['id'] > 11 ){  
			$terapias_check = explode(',', $orden[0]['terapias']);
			$aplicaciones = json_decode($orden[0]['aplicaciones']);
			?>   
            <tr>
			<td nowrap>
			<input type="checkbox" <?php echo((in_array("".$row_sueros["id"]."", $terapias_check ))?"checked=checked":"");?>  >
			<?php echo $row_sueros['descripcion']; ?>
		    </td>
			<td align="center">
			<input type="text"  size="1" <?php echo((in_array("".$row_sueros["id"]."", $terapias_check ))?"value='".$aplicaciones->{$row_sueros['id']}."'":"disabled");?> >
			</td>										
			 </tr>
			<?php } }  } ?>
          </table>      
        
		</td>
		
	    <td valign="top"> 
           <table align="center" cellpadding="0">
            <tr style="font-weight:bold">
              <td>Terapias Complemetarias:</td><td>N°</td>
            </tr>
			<?php 		
			if(is_array($terapias) && count($terapias) ) { foreach($terapias as $row_terapias){  ?> 
			<?php if($row_terapias['tipo'] == 3){  
			$terapias_check = explode(',', $orden[0]['terapias']);
			$aplicaciones = json_decode($orden[0]['aplicaciones']);
			?>
            <tr>
			<td nowrap>
			<input type="checkbox" <?php echo((in_array("".$row_terapias["id"]."", $terapias_check ))?"checked=checked":"");?>  >
			<?php echo $row_terapias['descripcion']; ?>
			</td>	
			<td align="center">
			<input type="text" size="1" <?php echo((in_array("".$row_terapias["id"]."", $terapias_check ))?"value='".$aplicaciones->{$row_terapias['id']}."'":"disabled");?>>
			</td>										
			</tr>
			<?php } }  } ?>
          </table>   
            
        </td>

		</tr>
		</table> 
		</div> 
  
      <div align="left"  style="margin-right:2%;">	  
         <label style="font-weight:bold">Observaciones:</label> <?php echo $row['obs']; ?> 
     <br><br>
	 </div>
  
    <div align="center" style="margin-top:1%;">
         <label style="font-weight:bold">Dias de Terapia: Lunes - Viernes de 7:30 am a 3:00 pm. TELF. (0291)642.18.27</label> 
         <br>
         <label style="font-size:12px">NOTA: LAS FACTURAS SE ENTREGAN EL MISMO D&Iacute;A QUE CANCELE, NO D&Iacute;AS DESPU&Eacute;S</label>
     </div>
     
  <div align="center" style="width:100%">
			<div style="width:50%; float:left">				 
			<table width="100%" border="1" style="border:1px solid #999; border-collapse:collapse" cellpadding="0" cellspacing="0">
              <tr align="center" style="font-weight:bold">
                <td width="10%">fecha</td>
                <td width="25%">Terapia</td>
                <td width="15%">terapeuta</td>
              </tr>			  
				<?php 		
				if(is_array($aplicacion1) && count($aplicacion1) ) { 					
				foreach($aplicacion1 as $row_apli1){ 				
				?>
				<tr align="center">
				<td nowrap><?= date_format(date_create($row_apli1['fecha']), 'd/m/Y'); ?></td>
				<td nowrap><?= $row_apli1['descrip_aplic']; ?></td>
				<td align="center" nowrap><?= $row_apli1['terapista']; ?></td>
				</tr>	
				<?php } }
				for ( $i=count($aplicacion1) ; $i < 16 ; $i ++) { 
				?>				
				<tr align="center">
				<td nowrap>&nbsp;</td>
				<td nowrap>&nbsp;</td>
				<td nowrap>&nbsp;</td>
				</tr>	
				<?php }  ?>
			</table>
			</div>
			<div style="width:50%; float:right">			
			<table width="100%" border="1" style="border:1px solid #999; border-collapse:collapse" cellpadding="0" cellspacing="0">
              <tr align="center" style="font-weight:bold">
				<td width="10%" class="separador">fecha</td>
                <td width="25%">Terapia</td>
                <td width="15%">terapeuta</td>
              </tr>
				<?php 		
				if(is_array($aplicacion2) && count($aplicacion2) ) { 					
				foreach($aplicacion2 as $row_apli2){ 				
				?>
				<tr align="center">
				<td nowrap class="separador"><?= date_format(date_create($row_apli2['fecha']), 'd/m/Y'); ?></td>
				<td nowrap><?= $row_apli2['descrip_aplic']; ?></td>
				<td align="center" nowrap><?= $row_apli2['terapista']; ?></td>
				</tr>
				<?php } }
				for ( $i=count($aplicacion2) ; $i < 16 ; $i ++) { 
				?>				
				<tr align="center">
				<td nowrap class="separador">&nbsp;</td>
				<td nowrap>&nbsp;</td>
				<td nowrap>&nbsp;</td>
				</tr>	
				<?php }  ?>				
            </table>
			</div>
	</div>
     
<?php } }  ?>

  </body>
</html>

