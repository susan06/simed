<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Doctores extends CI_Controller {

	public function __construct() {
				parent::__construct();
				$this->load->library(array('session'));
				$this->load->library( 'session_php' );
				$this->load->helper(array('url','form','html','date')); 
				$this->load->model('doctores_model');
				$this->load->model('crud_model');
				$this->load->library('bcrypt');
				$this->load->database('default'); 			
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
	
		
	public function index(){	
		
		$ver = 1;
		
		$data['page_title'] = 'Doctores';
		$data['system_title'] = 'Ver';		
		$data['borrar'] = 3;
		$data['permisos'] = $this->permisos();
		$permisos = $this->permisos();
		
		$doctores = $this->doctores_model->get_lista_doctores();

		if($doctores){
			$data['doctores'] =  $doctores;
		}else{
			$data['doctores'] =  NULL;
		}
			
		$this->load->view('doctores/lista', $data);

	}
	
	public function permisos() 
	{
		
		$modulo = $this->crud_model->get_id_mod("Doctores"); 
		$permisos = $this->crud_model->get_permisos($this->session->userdata('rol'),$modulo);
		return $permisos;
	}	

	public function datos($id){	
		
		$query = $this->doctores_model->get_datos_doctor($id);	
		
		if($query){
			$data['doctor_editar'] =  $query;
		}else{
			$data['doctor_editar'] =  NULL;
		}		
		
		$data['page_title'] = 'Doctor';
		$data['system_title'] = 'Perfil';	

		$this->load->view('doctores/perfil', $data);
			
	}	
	
	public function actualizar(){

		 $doctor['pnombre']= ucwords($this->input->post('pnombre'));
		 $doctor['papellido']= ucwords($this->input->post('papellido'));
		 $doctor['cedula']= $this->input->post('cedula'); 
		 $doctor['rif']= $this->input->post('rif'); 
		 $doctor['mpps']= $this->input->post('mpps'); 
		 $doctor['id']= $this->input->post('id');
		 
		$this->doctores_model->actualizar($doctor);		
	}
	
    public function eliminar(){	
		
		 $id_doctor = $this->input->post('id');
		 $this->doctores_model->eliminar($id_doctor);
		 	
	}	
	
	public function especialidades($doctor_user){	
		
		$data['doctor'] = $this->doctores_model->get_datos_doctor($doctor_user);	
		
		$query_esp = $this->doctores_model->especialidades_doctor($data['doctor'][0]['id']);
		
		if($query_esp){
			$data['espec_doctor'] =  $query_esp;
		}else{
			$data['espec_doctor'] =  NULL;
		}	
		
		$this->load->model('especialidades_model');
		$query = $this->especialidades_model->get_especialidades();
		
		if($query){
			$data['especialidades'] =  $query;
		}else{
			$data['especialidades'] =  NULL;
		}		
		
		$data['page_title'] = 'Doctor';
		$data['system_title'] = 'Especialidades';	

		$this->load->view('doctores/especialidades', $data);
			
	}	

	public function guardar_espec(){	
		 
		$data['especialidades_id']	= $this->input->post('especialidades_id');
		$data['doctores_id']		= $this->input->post('doctores_id');
		$doctor_user				= $this->input->post('doctor_user');
	  
		$this->doctores_model->guardar_espec($data,$doctor_user);	
	}
		
}
