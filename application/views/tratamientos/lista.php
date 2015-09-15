	<?php $this->load->view('layouts/doctype.php');	 ?>	
	
    <div class="wrapper">
	
	<?php $this->load->view('layouts/header.php');	 ?>	
	<?php $this->load->view('layouts/menu.php');	 ?>	
  
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Terapias<small></small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
		
			<?php if($this->session->flashdata('warning') != ''): ?>
					  <div class="alert alert-warning alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Advertencia!</h4>
							<?php echo $this->session->flashdata('warning'); ?>
					  </div>
				<?php endif;?>
				
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
            <div class='col-md-12'>
			  <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Terapias registradas</h3>
				  <input type="text" id="buscar_table" class="form-control input-sm pull-right" style="width: 200px;" placeholder="Buscar">
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="terapias_table" class="table table-bordered table-striped">
                    <thead>
                      <tr>
						<th>#</th>
						<th>Nombre</th>
						<th>tipo</th>
						<th width="10%">Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php if(is_array($terapias) && count($terapias) ){
						$numero=1;
						foreach($terapias as $row){ ?>
							<tr <?Php if( $this->session->flashdata('terapia') == $row['descripcion']){echo 'class="td_select"';} ?> >
		  
						  <td><?=  $numero++ ?></td>
						  <td>						  
						  <span id="nedit<?=  $row['id']; ?>"><?=  $row['descripcion']; ?></span>
								  <span id="edit<?=  $row['id']; ?>" style="display:none">
								  <a href="#" class="xedit" data-pk="<?=  $row['id']; ?>" data-placement="right" data-placeholder="Nombre de la terapia"><?=  $row['descripcion']; ?></a> 
								  </span>
						  </td>
						  <td>
						  <?Php if($row['tipo'] == 1) echo 'Sueros básicos'; ?>
						  <?Php if($row['tipo'] == 2) echo 'Sueros Expecíficos'; ?>
						  <?Php if($row['tipo'] == 3) echo 'Terapias Complemetarias'; ?>
						  </td>
						  <td>

							<i title="Editar" data-rel="tooltip" data-placement="top"  style="cursor:pointer" onclick="editar(<?=  $row['id']; ?>)" title="Editar" class="icon fa fa-edit"></i>	
&nbsp;
							<i title="Eliminar" data-rel="tooltip" data-placement="top"  style="cursor:pointer" class="fa fa-trash-o" onclick="eliminar(<?= $row['id'];?>, '<?= base_url(); ?>terapias/eliminar')"></i>
																		
						   </td>			

						 </tr>
									<?php }} ?>
		
                     </tbody>
                    <tfoot>
                      <tr>
						<th>#</th>
						<th>Nombre</th>
						<th>tipo</th>
						<th>Opciones</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col-->
          </div><!-- ./row -->
		 
			
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
	<script src="<?=base_url()?>assets/bootstrap/js/bootbox.min.js" type="text/javascript"></script>
      <!-- DATA TABES SCRIPT -->
    <script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
	<!-- SlimScroll -->
    <script src="<?=base_url()?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=base_url()?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url()?>assets/dist/js/app.min.js" type="text/javascript"></script>

	  <!-- all -->
    <script src="<?=base_url()?>assets/js/scripts.js" type="text/javascript"></script>
	 
	 <!-- x-editable -->
	<script src="?=base_url()?>assets/js/bootstrap-editable.js"></script>
	<!--X-Editable--> 
	<script type="text/javascript" src="<?=base_url()?>assets/plugins/x-editable/bootstrap-editable.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/plugins/x-editable/select2.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/plugins/x-editable/jquery.mockjax.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/plugins/x-editable/moment.min.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/plugins/x-editable/typeahead.js"></script>
	<script type="text/javascript" src="<?=base_url()?>assets/plugins/x-editable/typeaheadjs.js"></script>	
	
	<!-- page script -->
    <script type="text/javascript">
	
      $(document).ready(function () {
		 
		 $("#terapias_table").dataTable();
		 
		 oTable = $('#terapias_table').dataTable();
		 
		 $('#buscar_table').keyup(function(){ oTable.fnFilter( $(this).val() )});
		
		 $('[data-rel=tooltip]').tooltip();
		 $('[data-rel=popover]').popover({html:true});
	
 	$.fn.editableform.buttons = 
		'<button type="submit" class="btn btn-success  btn-sm"><i class="icon fa fa-check"></i></button>' +
		'<button type="button" class="btn editable-cancel  btn-sm">Cancelar</button>';
		
	 $.fn.editable.defaults.mode = 'popup';
	 
    $('.xedit').editable({
            validate: function(value) {
                if($.trim(value) == '') 
                    return 'Se requiere un valor';
        },
        type: 'text',
        url:'<?=base_url()?>terapias/editar_terapia',  
        title: 'Nombre de la terapia',
        placement: 'top', 
        send:'always',
        ajaxOptions: {
        dataType: 'json'
        },
		success: function(response, newValue) {
			$("#nedit"+response.id).html(newValue);
			$("#nedit"+response.id).show();
			$("#edit"+response.id).hide();				
		} 
     })
 
       
	  });	
	 	    
		
		function eliminar(id, url_delete){
		
			bootbox.confirm("Estas seguro de eliminar el registro?", function(result) {
			if(result){
			  $.ajax({ 
							url: url_delete,
							type:'POST',
							data:'id='+id,
							success: function(){
							 location.reload();
							}
					   })
			}
			}); 
		}

 function editar(id){
	  $("#nedit"+id).hide();
	  $("#edit"+id).show();
 }
 

    </script>
	
  </body>
</html>

