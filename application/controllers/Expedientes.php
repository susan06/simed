<?php 

 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expedientes extends CI_Controller {

	public function __construct() {
				parent::__construct();

				$this->load->library(array('session'));
				$this->load->library( 'session_php' );
				$this->load->helper(array('url','form','html','date')); 								
				$this->load->database('default');
				$this->load->model('crud_model');
				$this->load->model('expediente_model');				
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
	

	public function buscar(){
		
			$data['page_title'] = 'Expedientes médicos';
			$data['system_title'] = 'Buscar';		

			$this->load->view('expedientes/busqueda', $data);
		
    }	

	public function medico($id){
		
			$data['page_title'] = 'Expediente médico';
			$data['system_title'] = 'Paciente';	
			
			$data['expediente'] = $id;	
			
			$expediente = $this->expediente_model->expediente_pac($id);

			$this->load->model('pacientes_model');
			$paciente = $this->pacientes_model->get_datos_paciente($expediente[0]['pacientes_id']);
			if($paciente){
				$data['paciente'] =  $paciente;
			}else{
				$data['paciente'] =  NULL;
			}
			
			$this->load->view('expedientes/index', $data);
		
    }	

	public function historias($expediente) 
	{		
		$data['page_title'] = 'Expediente médico';
		$data['system_title'] = 'Historias';	
			
		$this->load->model('historias_model');
		$historias = $this->historias_model->get_historias_pac($expediente);
		$data['expediente'] = $expediente;	
		
		if($historias){
			$data['historias'] =  $historias;
		}else{
			$data['historias'] =  NULL;
		}
		
		return $this->load->view('expedientes/historias', $data);		
    }

	public function consultas($expediente) 
	{		
		$data['page_title'] = 'Expediente médico';
		$data['system_title'] = 'Consultas';	
		$data['expediente'] = $expediente;	
		
		$query = $this->expediente_model->get_consultas($expediente);
		if($query){
			$data['historial'] =  $query;
		}else{
			$data['historial'] =  NULL;
		}
				
		return $this->load->view('expedientes/consultas', $data);		
    }

    public function recipes($expediente) 
	{		
		$data['page_title'] = 'Expediente médico';
		$data['system_title'] = 'Recipes';	
		$data['expediente'] = $expediente;	
		
		$query = $this->expediente_model->get_recipes($expediente);
		if($query){
			$data['historial'] =  $query;
		}else{
			$data['historial'] =  NULL;
		}
				
		return $this->load->view('expedientes/recipes', $data);		
    }	
	
    public function ordenes($expediente) 
	{		
		$data['page_title'] = 'Expediente médico';
		$data['system_title'] = 'Ordenes';	
		$data['expediente'] = $expediente;	
		
		$query = $this->expediente_model->get_ordenes($expediente);
		if($query){
			$data['historial'] =  $query;
		}else{
			$data['historial'] =  NULL;
		}
				
		return $this->load->view('expedientes/ordenes', $data);		
    }	

    public function procedimientos($expediente) 
	{		
		$data['page_title'] = 'Expediente médico';
		$data['system_title'] = 'Procedimientos';	
		$data['expediente'] = $expediente;	
		
		$query = $this->expediente_model->get_procedimientos($expediente);
		if($query){
			$data['historial'] =  $query;
		}else{
			$data['historial'] =  NULL;
		}
				
		return $this->load->view('expedientes/procedimientos', $data);		
    }

    public function examenes($expediente) 
	{		
		$data['page_title'] = 'Expediente médico';
		$data['system_title'] = 'Exámenes';	
		$data['expediente'] = $expediente;	
		
		$query = $this->expediente_model->get_examenes($expediente);
		if($query){
			$data['historial'] =  $query;
		}else{
			$data['historial'] =  NULL;
		}
				
		return $this->load->view('expedientes/examenes', $data);		
    }	
}


