<?php 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eventos extends CI_Controller {

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

		$data['page_title'] = 'Eventos';
		$data['system_title'] = 'Crear';					 
		
		$this->load->view('eventos/index', $data);

	}
	
	public function guardar(){	
		
		$rango = explode("/", $this->input->post('fecha'));
		 
		$data['backgroundColor']	= $this->input->post('backgroundColor');
		$data['borderColor']		= $this->input->post('backgroundColor');
		$data['start']				= date("Y-m-d H:i:s",strtotime($rango[0]));
		$data['end']				= date("Y-m-d H:i:s",strtotime($rango[1]));
		$data['title']				= $this->input->post('title');
		$data['usuarios_id']		= $this->session->userdata('id');
		
		
	
		$insertSQL= $this->db->insert('eventos', $data);

		if($insertSQL) {
					$this->session->set_flashdata('info', 'Se registró el evento éxito');
					redirect(base_url() . 'doctores/calendario', 'refresh');		 
		}else{
					$this->session->set_flashdata('error', 'Intente guardar los datos de nuevo');
					redirect(base_url() . 'doctores/calendario', 'refresh');	
		}
	}

	public function imprimir(){	
		
		$ver = 1;
		
		$data['page_title'] = 'Imprimir';
		$data['system_title'] = 'Documentos';		
		
		$imprimir = $this->crud_model->get_imprimir();

		if($imprimir){
			$data['imprimir'] =  $imprimir;
		}else{
			$data['imprimir'] =  NULL;
		}
			
		$this->load->view('eventos/lista_imprimir', $data);

	}	
	
	public function eliminar_doc(){	
		
		 $id_documento = $this->input->post('id');
		 $this->crud_model->eliminar_doc($id_documento);
		 	
	}
}
