      <?php $permisos_espec = $this->crud_model->get_permisos($this->session->userdata('rol'),10); ?>
	  
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
                  <img src="<?=base_url()?>assets/dist/img/enfermera.jpg" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 2 && $this->session->userdata('sexo') == "M"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/enfermero.jpg" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 3 && $this->session->userdata('sexo') == "F"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/doctora.jpg" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 3 && $this->session->userdata('sexo') == "M"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/doctor.jpg" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 4 && $this->session->userdata('sexo') == "F"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/terapista.jpg" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 4 && $this->session->userdata('sexo') == "M"){ ?>
                  <img src="<?=base_url()?>assets/dist/img/terapeuta.jpg" class="img-circle" alt="User Image"/>
				<?php } ?> 
				<?php if($this->session->userdata('rol') == 5 ){ ?>
                  <img src="<?=base_url()?>assets/dist/img/secretaria.jpg" class="img-circle" alt="User Image"/>
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
			
            <li>
              <a href="../widgets.html">
                <i class="fa fa-wheelchair"></i> <span>Pacientes</span>
              </a>
			   <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-reorder"></i>Ver</a></li>
                <li><a href="#"><i class="fa fa-user-plus"></i>Registrar</a></li>
              </ul>
            </li> 
			
			<li>
              <a href="../widgets.html">
                <i class="fa fa-user-md"></i> <span>Doctores</span>
              </a>
			   <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i>Ver</a></li>
                <li><a href="#"><i class="fa fa-user-plus"></i>Registrar</a></li>
              </ul>
            </li>   

			<li>
              <a href="../widgets.html">
                <i class="fa fa-calendar"></i> <span>Citas Médicas</span>
              </a>
			   <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i>Ver</a></li>
                <li><a href="#"><i class="fa fa-plus-square"></i>Registrar</a></li>
              </ul>
            </li>

			<li>
              <a href="../widgets.html">
                <i class="fa fa-group"></i> <span>Sala de Espera</span>
              </a>
			   <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i>Ver</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Registrar</a></li>
              </ul>
            </li>

			<li>
              <a href="../widgets.html">
                <i class="fa fa-stethoscope"></i> <span>Consulta Médica</span>
              </a>
			   <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i>Ver</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Registrar</a></li>
              </ul>
            </li>

			<li>
              <a href="../widgets.html">
                <i class="fa fa-folder-open-o"></i> <span>Expediente Médico</span>
              </a>
			   <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i>Ver</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Registrar</a></li>
              </ul>
            </li>

			<li>
              <a href="../widgets.html">
                <i class="fa fa-medkit"></i> <span>Terapias</span>
              </a>
			   <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i>Ver</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Registrar</a></li>
              </ul>
            </li>
			
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->