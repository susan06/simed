<?php 
/* file cuenta.php 
 * Location: ./application/controllers/cuenta.php 
 * @author susan medina
 * @version 1.0 */
 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cuenta extends CI_Controller {

	public function __construct() {
				parent::__construct();
				$this->load->library(array('session'));
				$this->load->helper(array('url','form','html','date')); 
				$this->load->model('usuarios_model');
				$this->load->model('cuenta_model');
				$this->load->library('bcrypt');
				$this->load->database('default'); 

			}
	
	public function removeCache()
	{
		$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
		$this->output->set_header('Pragma: no-cache');
	}
	
	public function crear_usuario(){	
		
		$data['page_title'] = 'Usuarios';
		$data['system_title'] = 'Crear';		

		$this->load->view('usuarios/register', $data);
	
	}
	
	public function guardar_usuario(){	
		 
		 $data['pnombre']= ucwords($this->input->post('pnombre'));
		 $data['papellido']= ucwords($this->input->post('papellido'));
		 $data['nick']= $this->input->post('nick'); 
		 $data['clave']= $this->bcrypt->hash_password($this->input->post('clave'));
		 $data['email']= $this->input->post('email');
		 $data['roles_id']= $this->input->post('rol'); 
		 $data['pregunta_s']= $this->input->post('pregunta_secreta'); 
		 $data['respuesta_s']= $this->bcrypt->hash_password($this->input->post('respuesta_secreta')); 
		 $data['status_id']= 0;
		  
		$this->cuenta_model->guardar_usuario($data);	
	}
	
	public function validar_usuario(){	
		$nick = $this->input->post('nick');
		$this->cuenta_model->get_nick($nick);
	}
	
	public function validar_email(){	
		$email = $this->input->post('email');
		$this->cuenta_model->get_email($email);
	}
	
	public function pregunta(){	
		$email = $this->input->post('email');
		$this->cuenta_model->get_pregunta($email);
	}
	
	public function usuario(){	
		$email = $this->input->post('email');
		$this->cuenta_model->get_usuario($email);
	}
	
	public function validar_respuesta(){	
		$rsp = $this->input->post('rsp');
		$email = $this->input->post('email');
		$this->cuenta_model->validar_respuesta($rsp,$email);
	}
	
	public function guardar_contrasena(){	
		 
		 $data['clave']= $this->bcrypt->hash_password($this->input->post('clave'));		   
		 $id= $this->input->post('id');	

		$this->cuenta_model->guardar_contrasena($id,$data);	
	}
	
	public function contrasena(){
		
		$data['page_title'] = 'Usuarios';
        $data['page_name'] = 'usuarios/contrasena';
		$data['system_title'] = 'Crear';	
		$data['page_header'] = 'header-usuarios';	
		$data['page_menu'] = '';
		$data['mod'] = 'usuarios';
		$data['form'] = 'validar';
		$data['js'] = 'form_js_key';

		$this->load->view('index', $data);	
	}

	
}
