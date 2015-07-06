<?php 

/* file home.php 
 * Location: ./application/controllers/home.php 
 * @author susan medina
 * @version 1.0 */
 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
				parent::__construct();

				$this->load->library(array('session'));
				$this->load->helper(array('url','form','html','date')); 								
				$this->load->database('default');
				$this->load->model('crud_model');	 				
				$this->removeCache();
				
				if($this->session->userdata('is_logued_in')==FALSE)
				{	
					$this->session->set_flashdata('warning', 'Tiempo expirado, acceda de nuevo al sistema');
					redirect(base_url() . 'index.php/login', 'refresh');
				};

	}
	
	
	public function removeCache()
	{
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
	}
	
	public function index(){
	
			
			$data['page_title'] = 'Home';
			$data['system_title'] = 'Bienvenido';		
	
			$this->load->view('home', $data);
		
    }
	
	public function centro_medico(){	
		$authorizedUsers = array (1);
		$user = $this->session->userdata('user');
		$permiso=$user['nivel_acceso'];		
		if (in_array($permiso, $authorizedUsers ) ){		
			$this->load->model('usuarios_model');
			$query = $this->usuarios_model->get_clinica();
			if($query){
				$data['clinica'] =  $query;
			}
			$var['header'] =$this->load->view('templates/header');
			$var['clinica'] = $this->load->view('administrador/clinica', $data);
			$var['footer'] =$this->load->view('templates/footer');
			$this->load->view('layouts/clinica_default', $var);		
		}		
    }
	
	public function actualizar_clinica(){	   
		$nombre= ($this->input->post('nombre_cm'));
		$rif= ($this->input->post('rif_cm'));
		$tlf= ($this->input->post('tlf_cm'));
		$ciudad= ($this->input->post('ciudad_cm'));
		$estado= ($this->input->post('estado_cm'));
		$postal= ($this->input->post('zona_postal_cm'));
		$direccion= ($this->input->post('direccion_cm')); 
		$lema= ($this->input->post('lema_cm'));
		$this->load->model('usuarios_model');
		$this->usuarios_model->actualizar_clinica($nombre,$rif,$tlf,$ciudad,$estado,$postal,$direccion,$lema);	
	}
}

/* file home_admin.php 
 * Location: ./application/controllers/home.php 
 * @author susan medina
 * @version 1.0 */
