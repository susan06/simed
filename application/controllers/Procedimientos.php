<?php 

 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Procedimientos extends CI_Controller {

	public function __construct() {
				parent::__construct();

				$this->load->library(array('session'));
				$this->load->library( 'session_php' );
				$this->load->helper(array('url','form','html','date')); 								
				$this->load->database('default');
				$this->load->model('crud_model');
				$this->load->model('procedimientos_model');				
				$this->removeCache();
	
				$nick = $this->session_php->get();
				$rol = $this->session_php->get_rol();
				$sexo = $this->session_php->get_sexo();
				$url = current_url();
				
				if($this->session->userdata('is_logued_in') == FALSE)
				{
					$this->session->set_flashdata('nick', $nick );
					$this->session->set_flashdata('rol',  $rol);
					$this->session->set_flashdata('sexo',  $sexo);
					$this->session->set_flashdata('url_actual', $url );
					redirect(base_url() . 'login/lock_screen', 'refresh' );
				}
	}
	
	
	public function removeCache()
	{
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
	}
	
	public function registrar(){
			
			date_default_timezone_set('America/Caracas');
		
			$data['page_title'] = 'Procedimientos';
			$data['system_title'] = 'Registrar';		

			$this->load->view('procedimientos/registrar', $data);
		
    }
	
	public function permisos() 
	{
		
		$modulo = $this->crud_model->get_id_mod("procedimientos"); 
		$permisos = $this->crud_model->get_permisos($this->session->userdata('rol'),$modulo);
		return $permisos;
	}	

	public function guardar(){		

		 $data['expediente_id']= $this->input->post('expediente_id');
		 $data['fecha_proced']= date("Y-m-d",strtotime($this->input->post('fecha')));
		 $data['descrip_proced']= ucwords($this->input->post('descrip'));	
		 $data['obs_proced']= $this->input->post('obs_proced');			 
		 
		$this->procedimientos_model->guardar($data);
	}

	public function buscar(){
		
			$data['page_title'] = 'Procedimientos';
			$data['system_title'] = 'Buscar';		

			$this->load->view('procedimientos/busqueda', $data);
		
    }	
	
	public function procedimientos_busqueda() 
	{		
		$expediente= $this->input->post('expediente');
		
		$procedimientos = $this->procedimientos_model->get_procedimientos_pac($expediente);
		
		$data['editar'] = 2;
		$data['borrar'] = 3;
		$data['permisos'] = $this->permisos();
		
		if($procedimientos){
			$data['procedimientos'] =  $procedimientos;
		}else{
			$data['procedimientos'] =  NULL;
		}
		
		return $this->load->view('procedimientos/busqueda_procedimientos', $data);		
    }	
}


