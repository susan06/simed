<?php
/* file sala_espera.php */
/* Location: ./application/controllers/sala_espera.php 
* @autor: susan medina
* version 1.0
*/
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sala_espera extends CI_Controller {

	public function __construct() {
				parent::__construct();
				$this->load->library(array('session'));
				$this->load->library( 'session_php' );
				$this->load->helper(array('url','form','html','date')); 				
				$this->load->model('crud_model');
				$this->load->model('espera_model');
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
	
	public function permisos() 
	{
		
		$modulo = $this->crud_model->get_id_mod("Espera"); 
		$permisos = $this->crud_model->get_permisos($this->session->userdata('rol'),$modulo);
		return $permisos;
	}

	public function consultas(){

		$data['page_title'] = 'Sala de espera';
		$data['system_title'] = 'Consultas';		
		$data['permisos'] = $this->permisos();
		$data['borrar'] = 3;
		
		$query = $this->espera_model->get_lista_consulta();
		if($query){
			$data['pac_consultas'] =  $query;
		}else{
			$data['pac_consultas'] =  NULL;
		}
		
		$this->load->view('espera/lista_consulta', $data);	
	}

	public function agregar_consulta($cita){
		
		date_default_timezone_set('America/Caracas');
		
		$hoy = date("Y-m-d H:i:s");
		
		$data['citas_id']= $cita;
		$data['hora_llegada']= date("h:i a",strtotime($hoy));
		$data['estado']=1;
		
		$insertSQL= $this->db->insert('espera_consulta', $data);
		
		if($insertSQL) {
					$this->session->set_flashdata('info', 'El Paciente ahora esta en sala de espera');
					redirect(base_url() . 'sala_espera/consultas', 'refresh');		 
		}else{
					$this->session->set_flashdata('error', 'Ocurrió un error, intentelo de nuevo');
					redirect(base_url() . 'sala_espera/consultas', 'refresh');	
		}
	}	
	
	public function borrar_lista_consultas(){	
		 $this->espera_model->borrar_lista_consultas();		
	}
	
	public function borrar_lista_terapias(){	
		 $this->espera_model->borrar_lista_terapias();		
	}	
	
    public function eliminar_consulta(){	
		
		 $id_espera = $this->input->post('id');
		 $this->espera_model->eliminar_consulta($id_espera);
		 	
	}	
		
	public function eliminar_terapia(){	
		
		 $id_espera = $this->input->post('id');
		 $this->espera_model->eliminar_terapia($id_espera);
		 	
	}	
	
	public function cambiar_status_consulta(){	
		
		 $data['id'] = $this->input->get('id');
		 $data['estado'] = $this->input->get('status');
		 $this->espera_model->cambiar_status_consulta($data);
		 	
	}	
	
	public function cambiar_status_terapia(){	
		
		 $data['id'] = $this->input->get('id');
		 $data['estado'] = $this->input->get('status');
		 $this->espera_model->cambiar_status_terapia($data);
		 	
	}	
	
	
	
	
	
	
	public function espera_terapias(){	
		$query = $this->espera_model->get_lista_terapia();
		if($query){
			$data['pac_terapias'] =  $query;
		}else{
			$data['pac_terapias'] =  NULL;
		}
		return $this->load->view('espera/pacientes_terapia', $data);	
	}
	
    public function borrar_pac_consulta(){	
		 $lista = $this->input->post('id');
		 $this->espera_model->borrar_pac_consulta($lista);		
	}

	public function borrar_pac_terapia(){	
		 $lista = $this->input->post('id');
		 $this->espera_model->borrar_pac_terapia($lista);		
	}
	
	public function citas_programadas(){	
		$query = $this->espera_model->citas_programadas();
		if($query){
			$data['citas_programadas'] =  $query;
		}else{
			$data['citas_programadas'] =  NULL;
		}
		return $this->load->view('espera/citas_programadas', $data);	
	}
	
	public function agregar_cita(){
		$cita = $this->input->get('id');
		$query = $this->espera_model->get_cita($cita);
		if($query){
			$data['datos_cita'] =  $query;
		}else{
			$data['datos_cita'] =  NULL;
		}
		return $this->load->view('espera/datos_cita', $data);
	}
	
	public function agregar_lista_consulta(){
		$turno= ($this->input->post('turno_cita'));
		$cita= ($this->input->post('cod_cita'));
		$estado= ($this->input->post('estado'));
		$hora= ($this->input->post('hora_llegada'));
		$this->espera_model->lista_espera($cita,$estado,$hora,$turno);
	}

	public function autocomplete_pac(){	
		if(isset($_GET['term'])){	
		 $paciente = strtolower($_GET['term']);
		 $this->espera_model->autocompletar_paciente($paciente);
		}
	}

	public function nueva_cita(){					   
		$paciente= ($this->input->post('num_pac'));
		$doctor= ($this->input->post('id_doctor'));
		$fecha= ($this->input->post('fecha_cita'));
		$especialidad= ($this->input->post('cod_especialidad'));
		$turno= ($this->input->post('turno_cita'));
		$estado= ($this->input->post('estado'));
		$hora= ($this->input->post('hora_llegada'));
		$this->espera_model->nueva_cita($paciente,$doctor,$fecha,$especialidad,$turno,$estado,$hora);		
	}	
	
	public function agregar_pac_terapia(){					   
		$paciente= ($this->input->post('num_pac'));
		$fecha= ($this->input->post('fecha_actual'));
		$estado= ($this->input->post('estado'));
		$this->espera_model->agregar_pac_terapia($paciente,$fecha,$estado);		
	}
	
	public function cambiar_estado(){	
		 $paciente = $this->input->post('id');
		 $this->espera_model->cambiar_estado($paciente);		
	}	
}

/* End of file sala_espera.php */
/* Location: ./application/controllers/sala_espera.php */