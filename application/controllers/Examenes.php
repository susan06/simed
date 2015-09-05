<?php 

 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Examenes extends CI_Controller {

	public function __construct() {
				parent::__construct();

				$this->load->library(array('session'));
				$this->load->library( 'session_php' );
				$this->load->helper(array('url','form','html','date')); 								
				$this->load->database('default');
				$this->load->model('crud_model');
				$this->load->model('examenes_model');				
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
			
			
			$data['page_title'] = 'Exámenes';
			$data['system_title'] = 'Registrar';		

			$this->load->view('examenes/registrar', $data);
		
    }
	
	public function permisos() 
	{
		
		$modulo = $this->crud_model->get_id_mod("examenes"); 
		$permisos = $this->crud_model->get_permisos($this->session->userdata('rol'),$modulo);
		return $permisos;
	}
	
	public function guardar(){		

		 $data['expediente_id']= $this->input->post('expediente_id');
		 $data['fecha_exam']= date("Y-m-d",strtotime($this->input->post('fecha')));
		 $data['tipo_exam']= ucwords($this->input->post('tipo'));	
		 $data['obs_exam']= $this->input->post('obs_exam');			 
		 
		$this->examenes_model->guardar($data);
	}
	
	public function buscar(){
		
			$data['page_title'] = 'Exámenes';
			$data['system_title'] = 'Buscar';		

			$this->load->view('examenes/busqueda', $data);
		
    }	
	
	public function examenes_busqueda() 
	{		
		$expediente= $this->input->post('expediente');
		
		$examenes = $this->examenes_model->get_examenes_pac($expediente);
		
		$data['editar'] = 2;
		$data['borrar'] = 3;
		$data['permisos'] = $this->permisos();
		
		if($examenes){
			$data['examenes'] =  $examenes;
		}else{
			$data['examenes'] =  NULL;
		}
		
		return $this->load->view('examenes/busqueda_examenes', $data);		
    }
}


