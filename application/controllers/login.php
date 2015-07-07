<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* file login.php 
 * Location: ./application/controllers/login.php 
 * @author susan medina
 * @version 1.0 */
 
class Login extends CI_Controller {

	public function __construct() {
				parent::__construct();

				$this->load->library(array('session'));
				$this->load->helper(array('url','form','html')); 								
				$this->load->database('default');  				
				$this->load->library('bcrypt');	
				$this->load->model('login_model');	     
				$this->removeCache();
		
	}
	
	public function removeCache()
	{
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
	}
	
	public function index(){
	
		$data['page_title'] = 'SIGSAM';
        $data['page_name'] = 'login';
		$data['system_title'] = 'Login';	
		
		$data['token'] =  $this->token();
		
		$this->load->view('login', $data);

	}	
	
	public function process(){	
	
		if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
		{
		
		$username = $this->input->post('nick');
        $password = $this->input->post('clave'); 
		
		$check_user = $this->login_model->login_user($username,$password);
		
		if($check_user == TRUE)
							{
								redirect(base_url() . 'home', 'refresh');
								
							}else{	
							
								$this->session->set_flashdata('error', 'E-mail o Contraseña incorrecta');
								$this->session->set_flashdata('nick', $username);
								redirect(base_url() . 'login', 'refresh');
							}	
		}else{
				$this->session->set_flashdata('error', 'E-mail o Contraseña incorrecta');
				$this->session->set_flashdata('nick', $username);
				redirect(base_url() . 'login', 'refresh');
				return FALSE;
			}	
	}

	
	public function token()
	{
		$token = $this->bcrypt->hash_password(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}
	
	public function logout()
	{
		$this->session->set_flashdata('warning', 'Cierre de sesión');
		$this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect(base_url() . 'login', 'refresh');
	}	
	
	
}
/* file login.php 
 * Location: ./application/controllers/login.php 
 * @author susan medina
 * @version 1.0 */

