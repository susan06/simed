<?php 

/* file home.php 
 * Location: ./application/controllers/home.php 
 * @author susan medina
 * @version 1.0 */
 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Centro_medico extends CI_Controller {

	public function __construct() {
				parent::__construct();

				$this->load->library(array('session'));
				$this->load->library( 'session_php' );
				$this->load->helper(array('url','form','html','date')); 								
				$this->load->database('default');
				$this->load->model('crud_model');
				$this->load->model('centro_model');				
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
			
			
			$data['page_title'] = 'Centro Médico';
			$data['system_title'] = 'Datos';		
			$data['editar'] = 2;
			$data['permisos'] = $this->permisos();
			
			$query = $this->centro_model->get_clinica();
			
			if($query){
				$data['clinica'] =  $query;
			}
			
			$this->load->view('centro/index', $data);
		
    }
	
	public function permisos() 
	{
		
		$modulo = $this->crud_model->get_id_mod("clinica"); 
		$permisos = $this->crud_model->get_permisos($this->session->userdata('rol'),$modulo);
		return $permisos;
	}	
	
	
	public function actualizar(){	   
		 
		 $data['nombre']= ucwords($this->input->post('nombre'));
		 $data['tlf']= $this->input->post('tlf');
		 $data['rif']= $this->input->post('rif'); 
		 $data['lema']= $this->input->post('lema');
		 $data['ciudad']= $this->input->post('ciudad');
		 $data['estado']= $this->input->post('estado'); 
		 $data['direccion']= $this->input->post('direccion'); 
		 $data['postal']= $this->input->post('postal'); 
		 $data['id']= $this->input->post('id');
		  
		$this->centro_model->actualizar($data);
	}
}


