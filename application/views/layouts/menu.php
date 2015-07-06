      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?=base_url()?>assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
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
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>Home</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
			
			<?Php if($this->session->userdata('rol') == 1): ?>
            <li class="treeview">
              <a href="<?= base_url();?>index.php/usuarios">
                <i class="fa fa-dashboard"></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
			
			
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Centro Médico</span>
              </a>
            </li>
			
			<?php endif;?>
			
            <li>
              <a href="../widgets.html">
                <i class="fa fa-th"></i> <span>Pacientes</span>
              </a>
			   <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i>Ver</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Registrar</a></li>
              </ul>
            </li> 
			
			<li>
              <a href="../widgets.html">
                <i class="fa fa-th"></i> <span>Doctores</span>
              </a>
			   <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i>Ver</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Registrar</a></li>
              </ul>
            </li>   

			<li>
              <a href="../widgets.html">
                <i class="fa fa-th"></i> <span>Citas Médicas</span>
              </a>
			   <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i>Ver</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Registrar</a></li>
              </ul>
            </li>

			<li>
              <a href="../widgets.html">
                <i class="fa fa-th"></i> <span>Sala de Espera</span>
              </a>
			   <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i>Ver</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Registrar</a></li>
              </ul>
            </li>

			<li>
              <a href="../widgets.html">
                <i class="fa fa-th"></i> <span>Consulta Médica</span>
              </a>
			   <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i>Ver</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Registrar</a></li>
              </ul>
            </li>

			<li>
              <a href="../widgets.html">
                <i class="fa fa-th"></i> <span>Expediente Médico</span>
              </a>
			   <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i>Ver</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Registrar</a></li>
              </ul>
            </li>

			<li>
              <a href="../widgets.html">
                <i class="fa fa-th"></i> <span>Terapias</span>
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