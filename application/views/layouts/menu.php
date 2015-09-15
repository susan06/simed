	  <?php $permisos_espec = $this->crud_model->get_permisos($this->session->userdata('rol'),10); ?>
	  <?php $permisos_pac 	= $this->crud_model->get_permisos($this->session->userdata('rol'),2); ?>
	  <?php $permisos_doc 	= $this->crud_model->get_permisos($this->session->userdata('rol'),3); ?>
	  <?php $permisos_cit 	= $this->crud_model->get_permisos($this->session->userdata('rol'),4); ?>
	  <?php $permisos_esp 	= $this->crud_model->get_permisos($this->session->userdata('rol'),5); ?>
	  <?php $permisos_exp 	= $this->crud_model->get_permisos($this->session->userdata('rol'),7); ?>
	  <?php $permisos_ter 	= $this->crud_model->get_permisos($this->session->userdata('rol'),8); ?>
	  <?php $permisos_pro 	= $this->crud_model->get_permisos($this->session->userdata('rol'),12); ?>
	  <?php $permisos_exa 	= $this->crud_model->get_permisos($this->session->userdata('rol'),13); ?>
	  <?php $id_doctor 		= $this->crud_model->get_id_doc($this->session->userdata('id')); ?>
	   
	  <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
                 <?php if($this->session->userdata('rol') == 1 ){ ?>
                  <img src="<?=base_url()?>assets/dist/img/admin.jpg" class="img-circle" alt="User Image"/>
				<?php } ?>  
				<?php if($this->session->userdata('rol') == 2 && $this->session->userdata('sexo') == "F"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/enfermera.png" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 2 && $this->session->userdata('sexo') == "M"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/enfermero.png" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 3 && $this->session->userdata('sexo') == "F"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/doctora.png" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 3 && $this->session->userdata('sexo') == "M"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/doctor.png" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 4 && $this->session->userdata('sexo') == "F"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/terapista.png" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 4 && $this->session->userdata('sexo') == "M"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/terapeuta.png" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 5 ){ ?>
                  <img src="<?=base_url()?>assets/dist/img/secretaria.png" class="img-circle" alt="User Image"/>
				<?php } ?> 
            </div>
            <div class="pull-left info">
              <p><?php echo $this->session->userdata('nombre'); ?> <?php echo  $this->session->userdata('apellido'); ?></p>

              <a href="#"><i class="fa fa-circle text-success"></i> <?= $this->crud_model->get_name_rol($this->session->userdata('rol')); ?></a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">PANEL</li>
			
			 <li class="treeview">
              <a href="<?= base_url();?>home">
                <i class="fa fa-home"></i> <span>Home</span>
              </a>
            </li>
			
			<?Php if($this->session->userdata('rol') == 1): ?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-group"></i> <span>Usuarios</span> 
              </a>
			    <ul class="treeview-menu">
                <li><a href="<?= base_url();?>usuarios"><i class="fa fa-reorder"></i>Ver</a></li>
                <li><a href="<?= base_url();?>usuarios/roles"><i class="fa fa-plus-square"></i>Roles</a></li>
				<li><a href="<?= base_url();?>usuarios/permisos_rol"><i class="fa  fa-exclamation-circle"></i>Permisos</a></li>
              </ul>
            </li>
			<?Php endif ?>
			
            <li class="treeview">
              <a href="<?= base_url();?>centro_medico">
                <i class="fa fa-hospital-o"></i>
                <span>Centro Médico</span>
              </a>
            </li>
	
			
			<?php	if($permisos_espec[1]['status'] == 1 || $permisos_espec[4]['status'] == 1 ){ ?>
			
            <li class="treeview">
               <a href="#">
                <i class="fa fa-certificate"></i> <span>Especialidades</span> 
              </a>
			    <ul class="treeview-menu">
				<?php	if ($permisos_espec[1]['status'] == 1 ){ ?>
                <li><a href="<?= base_url();?>especialidades"><i class="fa fa-reorder"></i>Ver</a></li>
				<?php } ?>
				<?php	if ($permisos_espec[4]['status'] == 1 ){ ?>
                <li><a href="<?= base_url();?>especialidades/crear"><i class="fa fa-plus-square"></i>Crear</a></li>
				<?php } ?>
              </ul>
            </li>
			
			<?php } ?>
			
			<?php	if($permisos_pac[1]['status'] == 1 || $permisos_pac[4]['status'] == 1 ){ ?>			
            <li>
              <a href="#">
                <i class="fa fa-wheelchair"></i> <span>Pacientes</span>
              </a>
			   <ul class="treeview-menu">
			   <?php	if ($permisos_pac[1]['status'] == 1 ){ ?>
                <li><a href="<?= base_url();?>pacientes"><i class="fa fa-reorder"></i>Ver</a></li>
				<?php } ?>
				<?php	if ($permisos_pac[4]['status'] == 1 ){ ?>
                <li><a href="<?= base_url();?>pacientes/registrar"><i class="fa fa-user-plus"></i>Registrar</a></li>
				<?php } ?>
              </ul>
            </li> 			
			<?php } ?>
			
			<li>			 
              <a href="<?= base_url();?>historias/buscar">
                <i class="fa  fa-heartbeat"></i> <span>Historias médicas</span>
              </a>
			</li>
			
			<?php	if($permisos_doc[1]['status'] == 1 ){ ?>			
			<li>
              <a href="#">
                <i class="fa fa-user-md"></i> <span>Doctores</span>
              </a>
			   <ul class="treeview-menu">
			   <?php	if ($permisos_doc[1]['status'] == 1 ){ ?>
                <li><a href="<?= base_url();?>doctores"><i class="fa fa-reorder"></i>Ver-Doctores</a></li>
				<li><a href="<?= base_url();?>doctores/calendario_doctores"><i class="fa fa-calendar"></i>Calendario-Doctores</a></li>
				<?php } ?>	
				<?Php if($this->session->userdata('rol') == 3): ?>
                <li><a href="<?= base_url();?>doctores/especialidades"><i class="fa fa-certificate"></i>Mis Especialidades</a></li>
				<li><a href="<?= base_url();?>doctores/calendario"><i class="fa fa-calendar-o"></i>Mi calendario</a></li>
				<li><a href="<?= base_url();?>doctores/datos"><i class="fa fa-file-text"></i>Mi perfil</a></li>
				<?Php endif ?>
              </ul>
            </li>   
			
			<?php } ?>	
			
			<?php	if($permisos_cit[1]['status'] == 1 || $permisos_cit[4]['status'] == 1 ){ ?>
			<li>
              <a href="../widgets.html">
                <i class="fa fa-calendar"></i><span>Citas Médicas</span>
              </a>
			   <ul class="treeview-menu">
			    <?php	if ($permisos_cit[1]['status'] == 1 ){ ?>
				<?Php if($this->session->userdata('rol') != 3){ ?>
                <li><a href="#" onclick="seleccionar_doctores()"><i class="fa fa-calendar-o"></i>Agenda</a></li>
				<?Php }else{ ?>
				<li><a href="<?= base_url(); ?>citas/agenda/<?= $id_doctor;?>"><i class="fa fa-calendar-o"></i>Agenda</a></li>
				<?php } ?>
                <?php } ?>
				<?php	if ($permisos_cit[4]['status'] == 1 ){ ?>
			   <li><a href="<?= base_url();?>citas/programar"><i class="fa fa-plus-square"></i>Programar</a></li>
              <?php } ?>
			  </ul>
            </li>
			<?php } ?>
			
			<?php	if ($permisos_esp[1]['status'] == 1 ){ ?>
			<li>			 
              <a href="../widgets.html">
                <i class="fa fa-group"></i> <span>Sala de Espera</span>
              </a>
			   <ul class="treeview-menu">
                <li><a href="<?= base_url();?>sala_espera/consultas"><i class="fa fa-wheelchair"></i>Consultas</a></li>
                <li><a href="<?= base_url();?>sala_espera/terapias"><i class="fa fa-medkit"></i>Terapias</a></li>
              </ul>
            </li>
			<?php } ?>	
			<?Php if($this->session->userdata('rol') == 3): ?>
			<li>
              <a href="<?= base_url();?>consulta/sala_espera">
                <i class="fa fa-stethoscope"></i> <span>Consulta Médica</span>
              </a>
            </li>
			<?Php endif ?>
			
			<li>
              <a href="../widgets.html">
                <i class="fa fa-medkit"></i> <span>Aplicación de Terapias</span>
              </a>
			   <ul class="treeview-menu">
			   <li><a href="<?= base_url();?>terapias/sala_espera"><i class="fa fa-wheelchair"></i>En espera</a></li>
			    <?php	if ($permisos_ter[1]['status'] == 1 ){ ?>
                <li><a href="<?= base_url();?>terapias/agenda"><i class="fa fa-calendar-o"></i>Agenda</a></li>
				<?Php } ?>
				<?php	if ($permisos_ter[4]['status'] == 1 ){ ?>
                <li><a href="<?= base_url();?>terapias/crear_orden"><i class="fa fa-plus-square"></i>Crear orden</a></li>
				<?Php } ?>
				<li><a href="<?= base_url();?>terapias/busqueda"><i class="fa fa-search"></i>Buscar orden</a></li>
              </ul>
            </li>

			<li class="treeview">
               <a href="#">
                <i class="fa fa-certificate"></i> <span>Lista de terapias</span> 
              </a>
			    <ul class="treeview-menu">
                <li><a href="<?= base_url();?>terapias"><i class="fa fa-reorder"></i>Ver</a></li>
                <li><a href="<?= base_url();?>terapias/crear"><i class="fa fa-plus-square"></i>Crear</a></li>
              </ul>
            </li>
			
			<?php	if($permisos_pro[1]['status'] == 1 || $permisos_pro[4]['status'] == 1 ){ ?>			
			<li>			 
              <a href="../widgets.html">
                <i class="fa fa-arrow-circle-right"></i> <span>Procedimientos</span>
              </a>
			   <ul class="treeview-menu">
			   <?php	if ($permisos_pro[4]['status'] == 1 ){ ?>
                <li><a href="<?= base_url();?>procedimientos/registrar"><i class="fa fa-plus-square"></i>Registrar</a></li>
                <?php } ?>
				<?php	if ($permisos_pro[1]['status'] == 1 ){ ?>				
				<li><a href="<?= base_url();?>procedimientos/buscar"><i class="fa fa-search"></i>Buscar</a></li>
                <?php } ?>	
			  </ul>
            </li>			
			 <?php } ?>	

			<?php	if($permisos_exa[1]['status'] == 1 || $permisos_exa[4]['status'] == 1 ){ ?>			
			<li>			 
              <a href="../widgets.html">
                <i class="fa fa-file-text-o"></i> <span>Exámenes</span>
              </a>
			   <ul class="treeview-menu">
			   <?php	if ($permisos_exa[4]['status'] == 1 ){ ?>
                <li><a href="<?= base_url();?>examenes/registrar"><i class="fa fa-plus-square"></i>Registrar</a></li>
                <?php } ?>
				<?php	if ($permisos_exa[1]['status'] == 1 ){ ?>				
				<li><a href="<?= base_url();?>examenes/buscar"><i class="fa fa-search"></i>Buscar</a></li>
                <?php } ?>	
			  </ul>
            </li>			
			 <?php } ?>	

			<?php	if ($permisos_exp[1]['status'] == 1 ){ ?>
			<li>
              <a href="<?= base_url();?>expedientes/buscar">
                <i class="fa fa-folder-open"></i> <span>Expediente Médico</span>
              </a>
            </li>
			<?Php } ?>
			
			<?Php if($this->session->userdata('rol') == 5): ?>
            <li class="treeview">
              <a href="<?= base_url();?>eventos/imprimir">
                <i class="fa fa-print"></i> <span>Impresiones</span> 
              </a>
            </li>
			<?Php endif ?>
			
          </ul>
		  <br><br><br><br><br>
        </section>
        <!-- /.sidebar -->
      </aside>
	  
		<div class="modal" id="modalDocDialog" role="dialog">
		  <div class="modal-dialog"  role="document" style="width: 40%;">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Seleccione al Doctor para ver su agenda</h4>
				</div>
						<div class="modal-body" id="doc-body">
						</div>
			 <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			  </div>
			</div>
			<!-- /.modal-content --> 
		  </div>
		  <!-- /.modal-dialog --> 
		</div>	
			  
   <script type="text/javascript">
   
	function seleccionar_doctores(){

			$( "#doc-body" ).load( "<?= base_url(); ?>doctores/ver");
			$('#modalDocDialog').modal();
	}    
	
	</script>	
      <!-- =============================================== -->