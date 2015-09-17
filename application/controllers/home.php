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
				$this->load->library( 'session_php' );
				$this->load->helper(array('url','form','html','date')); 								
				$this->load->database('default');
				$this->load->model('crud_model');
				$this->load->model('home_model');				
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
		
		$data['page_title'] = 'Home';
		$data['system_title'] = 'Bienvenido';		
		
		$data['pacientes'] = count($this->home_model->get_pacientes());
		
		$data['doctores'] = count($this->home_model->get_doctores());
		
		$data['terapistas'] = count($this->home_model->get_terapistas());
		
		$data['enfermeras'] = count($this->home_model->get_enfermeras());
		
		$data['sexo'] = $this->home_model->get_sexo();
		
		$data['edad'] = $this->home_model->get_edad();
		
		$data['data_consulta'] = $this->home_model->get_consulta();
		
		$data['data_terapia'] = $this->home_model->get_terapia();
		
		$data['terapias'] = $this->home_model->get_terapias();
		
		$this->load->view('home', $data);
		
    }
	
}

/* file home.php 
 * Location: ./application/controllers/home.php 
 * @author susan medina
 * @version 1.0 */
