<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Citas extends CI_Controller {

	public function __construct() {
				parent::__construct();
				$this->load->library(array('session'));
				$this->load->library( 'session_php' );
				$this->load->helper(array('url','form','html','date')); 				
				$this->load->model('crud_model');
				$this->load->model('citas_model');
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
	
		
	public function programar(){	

		$data['page_title'] = 'Citas';
		$data['system_title'] = 'Programar';		
		
		$this->load->model('doctores_model');
		
		$doctores = $this->doctores_model->get_lista_doctores();

		if($doctores){
			$data['doctores'] =  $doctores;
		}else{
			$data['doctores'] =  NULL;
		}
		
		$this->load->view('citas/programar', $data);

	}

	public function programar_cita(){	
		
		date_default_timezone_set('America/Caracas');
		
		$data['page_title'] = 'Citas';
		$data['system_title'] = 'Programar';		
		
		$this->load->model('doctores_model');
		
		$doctores = $this->doctores_model->get_lista_doctores();

		if($doctores){
			$data['doctores'] =  $doctores;
		}else{
			$data['doctores'] =  NULL;
		}
		
		$this->load->view('citas/programar_sin_cita', $data);

	}
	
	public function agenda($doctor){	

		$data['page_title'] = 'Agenda';
		$data['system_title'] = 'Doctor';		
		$data['permisos'] = $this->permisos();
		$data['borrar'] = 3;
		$data['editar'] = 2;
		
		$this->load->model('doctores_model');
		
		$data['doctor'] = $this->doctores_model->get_datos_doctor($doctor);	
		
		$citas = $this->citas_model->get_citas_doc($doctor);

		if($citas){
			$data['citas'] =  $citas;
		}else{
			$data['citas'] =  NULL;
		}
		
		$this->load->view('citas/citas_doctor', $data);

	}

	public function citas_doctor(){	
	
		$doctor= ($this->input->post('doctor'));
		$fecha= date("Y-m-d",strtotime($this->input->post('fecha')));
		
		$query=$this->citas_model->citas_doc($doctor, $fecha);		
		if($query){
			$data['citas'] =  $query;
		}else{
			$data['citas'] =  NULL;
		}
		$data['permisos'] = $this->permisos();
		$data['borrar'] = 3;
		$data['editar'] = 2;
		
       return $this->load->view('citas/load_citas_doctor', $data);	
	}	
	
	public function permisos() 
	{
		
		$modulo = $this->crud_model->get_id_mod("Citas"); 
		$permisos = $this->crud_model->get_permisos($this->session->userdata('rol'),$modulo);
		return $permisos;
	}	

	public function horas(){
				
		$doctor = $this->input->get('doctor');
		$turno = $this->input->get('turno');
		$fecha = date("Y-m-d",strtotime($this->input->get('fecha')));	
		$this->citas_model->horas_disponibles($doctor,$turno,$fecha);
		
	}	
	
	//citas de pacientes	
	public function paciente($paciente){	

		$data['page_title'] = 'Citas';
		$data['system_title'] = 'Paciente';		
		$data['permisos'] = $this->permisos();
		$data['editar'] = 2;
		$data['borrar'] = 3;
		
		$citas = $this->citas_model->get_citas_pac($paciente);

		if($citas){
			$data['citas'] =  $citas;
		}else{
			$data['citas'] =  NULL;
		}
		
		$this->load->view('citas/citas_paciente', $data);

	}	
	
	//ver cita en modal
	public function ver($id) 
	{		

		$cita = $this->citas_model->get_datos_cita($id);
		if($cita){
			$data['cita'] =  $cita;
		}else{
			$data['cita'] =  NULL;
		}
		
		return $this->load->view('citas/ver', $data);		
    }
	
	//ver citas hoy en modal
	public function hoy() 
	{		

		$citas = $this->citas_model->get_citas();
		if($citas){
			$data['citas'] =  $citas;
		}else{
			$data['citas'] =  NULL;
		}
		
		return $this->load->view('citas/hoy', $data);		
    }
	
	public function guardar(){		

		 $data['pacientes_id']= $this->input->post('pacientes_id');
		 $data['fecha']= date("Y-m-d",strtotime($this->input->post('fecha')));
		 $data['turno']= $this->input->post('turno');
		 $data['status']= 1;
		 $data['doctores_id']= $this->input->post('doctores_id');
		 $data['especialidades_id']= $this->input->post('especialidades_id');
		 $data['hora_id']= $this->input->post('hora_id');
		 	
		$this->citas_model->guardar($data);
	}
	
	public function guardar_cita(){		

		 $data['pacientes_id']= $this->input->post('pacientes_id');
		 $data['fecha']= date("Y-m-d",strtotime($this->input->post('fecha')));
		 $data['turno']= $this->input->post('turno');
		 $data['status']= 1;
		 $data['doctores_id']= $this->input->post('doctores_id');
		 $data['especialidades_id']= $this->input->post('especialidades_id');
		 
		 $espera['hora_llegada']= $this->input->post('hora');
		 	
		$this->citas_model->guardar_cita($data,$espera);
	}
	
	public function editar($id,$type='') 
	{		
		$data['page_title'] = 'Citas';
		$data['system_title'] = 'Editar';
		
		$cita = $this->citas_model->get_datos_cita($id);
		if($cita){
			$data['cita'] =  $cita;
		}else{
			$data['cita'] =  NULL;
		}
		
		$data['type'] = 0;	
		if($type == 1){
		$data['url'] = 'citas/paciente';
		$data['type'] = 1;
		}else{
		$data['url'] = 'citas/agenda';	
		}
		$this->load->model('doctores_model');
		$doctores = $this->doctores_model->get_lista_doctores();

		if($doctores){
			$data['doctores'] =  $doctores;
		}else{
			$data['doctores'] =  NULL;
		}
		
		$this->load->view('citas/editar', $data);		
    }	
	
	public function actualizar(){

		 $data['fecha']= date("Y-m-d",strtotime($this->input->post('fecha')));
		 $data['turno']= $this->input->post('turno');
		 $data['doctores_id']= $this->input->post('doctores_id');
		 $data['especialidades_id']= $this->input->post('especialidades_id');
		 $data['hora_id']= $this->input->post('hora_id');
		 $data['id']= $this->input->post('id');
		 $url= $this->input->post('url_cita');
		 
		$this->citas_model->actualizar($data,$url);		
	}
	
    public function eliminar(){	
		
		 $id_cita = $this->input->post('id');
		 $this->citas_model->eliminar($id_cita);
		 	
	}	
	

	
}
