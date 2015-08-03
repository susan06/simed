<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pacientes extends CI_Controller {

	public function __construct() {
				parent::__construct();
				$this->load->library(array('session'));
				$this->load->library( 'session_php' );
				$this->load->helper(array('url','form','html','date')); 
				$this->load->model('pacientes_model');
				$this->load->model('crud_model');
				$this->load->library('bcrypt');
				$this->load->database('default'); 			
				$this->removeCache();

				$nick = $this->session_php->get();
				$rol = $this->session_php->get_rol();
				$rol = $this->session_php->get_sexo();
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
	
		
	public function index(){	
		
		$ver = 1;
		
		$data['page_title'] = 'Pacientes';
		$data['system_title'] = 'Ver';		
		$data['editar'] = 2;
		$data['borrar'] = 3;
		$data['permisos'] = $this->permisos();
		$permisos = $this->permisos();
		
		$pacientes = $this->pacientes_model->get_lista_pacientes();

		if($pacientes){
			$data['pacientes'] =  $pacientes;
		}else{
			$data['pacientes'] =  NULL;
		}
			
		$this->load->view('pacientes/lista', $data);

	}
	
	public function registrar(){	
		
		$data['page_title'] = 'Pacientes';
		$data['system_title'] = 'Registrar';		
					
		$this->load->view('pacientes/registrar', $data);
			
	}
	
	public function permisos() 
	{
		
		$modulo = $this->crud_model->get_id_mod("pacientes"); 
		$permisos = $this->crud_model->get_permisos($this->session->userdata('rol'),$modulo);
		return $permisos;
	}	

	public function guardar(){		
		 $data['cedula']= ($this->input->post('cedula'));
		 $data['pnombre']= ucwords($this->input->post('pnombre'));
		 $data['papellido']= ucwords($this->input->post('papellido'));
		 $data['snombre']= ucwords($this->input->post('snombre'));
		 $data['sapellido']= ucwords($this->input->post('sapellido'));
		 $data['edad']= $this->input->post('edad');
		 $data['sexo']= $this->input->post('sexo');
		 $data['lnacimiento']= $this->input->post('lnacimiento');
		 $data['fnacimiento']= date("Y-m-d",strtotime($this->input->post('fnacimiento')));
		 $data['profesion']= ucwords($this->input->post('profesion'));
		 $data['civil']= $this->input->post('civil');
		 $data['edad']= $this->input->post('edad');
		 $data['direccion']= $this->input->post('direccion');
		 $data['email']= $this->input->post('email');
		 $data['tlf']= $this->input->post('tlf');
		 $data['rlegal']= ucwords($this->input->post('rlegal'));
		 $data['p_rlegal']= ucwords($this->input->post('p_rlegal'));
		
		$this->pacientes_model->guardar($data);
	}
	
	public function actualizar(){

		 $data['cedula']= ($this->input->post('cedula'));
		 $data['pnombre']= ucwords($this->input->post('pnombre'));
		 $data['papellido']= ucwords($this->input->post('papellido'));
		 $data['snombre']= ucwords($this->input->post('snombre'));
		 $data['sapellido']= ucwords($this->input->post('sapellido'));
		 $data['edad']= $this->input->post('edad');
		 $data['sexo']= $this->input->post('sexo');
		 $data['lnacimiento']= $this->input->post('lnacimiento');
		 $data['fnacimiento']= date("Y-m-d",strtotime($this->input->post('fnacimiento')));
		 $data['profesion']= ucwords($this->input->post('profesion'));
		 $data['civil']= $this->input->post('civil');
		 $data['edad']= $this->input->post('edad');
		 $data['direccion']= $this->input->post('direccion');
		 $data['email']= $this->input->post('email');
		 $data['tlf']= $this->input->post('tlf');
		 $data['rlegal']= ucwords($this->input->post('rlegal'));
		 $data['p_rlegal']= ucwords($this->input->post('p_rlegal'));
		 $data['id']= $this->input->post('id');
		 
		$this->pacientes_model->actualizar($data);		
	}
	
    public function eliminar(){	
		
		 $id_paciente = $this->input->post('id');
		 $this->pacientes_model->eliminar($id_paciente);
		 	
	}	
	
	public function ver($id) 
	{		

		$paciente = $this->pacientes_model->get_datos_paciente($id);
		if($paciente){
			$data['paciente'] =  $paciente;
		}else{
			$data['paciente'] =  NULL;
		}
		
		return $this->load->view('pacientes/ver', $data);		
    }
	
		
	public function editar($id) 
	{		
		$data['page_title'] = 'Pacientes';
		$data['system_title'] = 'Editar';
		
		$paciente = $this->pacientes_model->get_datos_paciente($id);
		if($paciente){
			$data['paciente'] =  $paciente;
		}else{
			$data['paciente'] =  NULL;
		}
		
		$this->load->view('pacientes/editar', $data);		
    }
}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */