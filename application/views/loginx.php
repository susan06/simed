<div class="principal-login"> 
 
 <div style="width:100%; height:440px">
 
      <div class="colum_izq">
        <img id="img1" src="<?php echo base_url(); ?>media/images/login/serv_medico1.fw.png" alt="Atenci&oacute;n M&eacute;dica">
        <img id="img2" src="<?php echo base_url(); ?>media/images/login/serv_medico2.fw.png" alt="Hematologia">
        <img id="img3" src="<?php echo base_url(); ?>media/images/login/serv_medico3.fw.png" alt="Reflexologia">
      </div>
      
      <div class="colum_central">
            <h1>BIENVENIDO</h1>
            
            <div id="p1">
            El CMD Las Cocuizas es una instituci&oacute;n m&eacute;dica que ofrece un sistema asistencial de salud que permite la rehabilitaci&oacute;n 
            integral de las personas, brindando atenci&oacute;n m&eacute;dica de calidad a sus pacientes con m&eacute;dicos especialistas y personal
            capacitado.<!-- para el cumplimiento de tratamientos m&eacute;dicos ambulatorios y tratamientos convencionales y no convencionales
            como parte de una medicina preventiva. -->
            </div>
            
            <div id="p2">
              Desde aqui podr&aacute; acceder a las funciones del sistema integral de gesti&oacute;n de servicios de atenci&oacute;n m&eacute;dica. 
              Para ingresar a la red deber&aacute; contar con el usuario y contrase&ntilde;a; sino ir al siguiente link: 
			  <a href="<?php echo base_url();?>index.php/cuenta/crear_usuario"><span class="verde"> Crear usuario </span></a>
             </div> 
          
             <div id="form_entrar">	  
              <form action="<?php echo base_url();?>index.php/login/process" method="POST" name="form_login">
			  
                  <table id="tabla_entrar">
                  <tr valign="baseline">
                  <td align="right" nowrap><strong>Usuario:</strong></td>
                  <td><input type="text" name="nick" size="20" class="textbox"></td>
                  </tr>
                  <tr valign="baseline">
                  <td align="right" nowrap><strong>Clave de Acceso:</strong></td> 
                  <td><input type="password" name="clave" size="20" class="textbox">				 				  
				  </td>
                  </tr>
				  <tr valign="baseline">
                  <td align="right" nowrap></td> 
                  <td>				 					
					<span id="tooltip">
					<a href="<?php echo base_url();?>index.php/cuenta/contrasena" title="Hacer clic para restablecer contraseña">
					<span class="verde font-12">¿Olvidó su contraseña?</span>
					</a>
					</span>
				  </td>
                  </tr>
                  </table>
                  
                  <div>
				  <input type="hidden" name="token" value="<?php echo $token; ?>">
				  
                  <input id="ingresar" type="image" src="<?php echo base_url(); ?>media/images/botones/ingresar_botton.fw.png">
                  </div>
                   
              </form>
              
              </div>
 
  </div>
    
     <div class="colum_der">
           <img id="img4" src="<?php echo base_url(); ?>media/images/login/serv_medico4.fw.png" alt="Atenci&oacute;n M&eacute;dica">
           <img id="img5" src="<?php echo base_url(); ?>media/images/login/serv_medico5.fw.png" alt="Bienestar">
           <img id="img6" src="<?php echo base_url(); ?>media/images/login/serv_medico6.fw.png" alt="Nutrici&oacute;n"> 
     </div>

   </div>
   
 <?php include 'templates/footer.php'; ?>
 
   </div>
   
