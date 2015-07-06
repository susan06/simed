<?php 
/* file usuarios.php 
 * Location: ./application/controllers/usuarios.php 
 * @author susan medina
 * @version 1.0 */
 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct() {
				parent::__construct();
				$this->load->library(array('session'));
				$this->load->helper(array('url','form','html','date')); 
				$this->load->model('usuarios_model');
				$this->load->model('crud_model');
				$this->load->library('bcrypt');
				$this->load->database('default'); 			
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
		
		$ver = $this->crud_model->get_id_permiso("Ver");
		
		$data['page_title'] = 'Usuarios';
		$data['system_title'] = 'Ver';		
		$data['borrar'] = $this->crud_model->get_id_permiso("Borrar");
		$data['permisos'] = $this->permisos();
		
		$usuarios = $this->usuarios_model->get_lista_usuarios();

		if($usuarios){
			$data['usuarios'] =  $usuarios;
		}else{
			$data['usuarios'] =  NULL;
		}
		
		if (in_array($ver, $this->permisos())){
			
			$this->load->view('usuarios/lista', $data);
			
		}else{	
		
			$this->session->set_flashdata('warning', 'No tiene permiso para acceder al módulo de usuarios');
			redirect(base_url() . 'index.php/home', 'refresh');
			
		}
	}
	
	public function permisos() 
	{
		
		$modulo = $this->crud_model->get_id_mod("usuarios"); 
		$permisos = $this->crud_model->get_permisos($this->session->userdata('rol'),$modulo);
		return $permisos;
	}	
	

	public function registrar()
	{	
		
		$crear = $this->crud_model->get_id_permiso("Crear");
		
		$this->session->set_flashdata('key', 'key');
		
		$data['page_title'] = 'Usuarios';
        $data['page_name'] = 'usuarios/registrar';
		$data['system_title'] = 'Crear';	
		$data['page_header'] = 'header';	
		$data['page_menu'] = '';
		$data['mod'] = 'usuarios';
		$data['form'] = 'validar';
		$data['admin']= $this->session->userdata('rol');
		$data['js'] = 'form_js_usuario';
		
		if (in_array($crear, $this->permisos())){
		
			$this->load->view('index', $data);
			
		}else{	
		
			$this->session->set_flashdata('flash_message', '<p class="font1 rojo"> No tiene permiso para crear usuarios </p>');
			redirect(base_url() . 'index.php/usuarios', 'refresh');
			
		}
	}
	
	public function status(){	
		$id = $this->input->post('id');
		$this->usuarios_model->cambiar_status($id);
	}
	
	public function guardar(){	
		 
		 $data['pnombre']= ucwords($this->input->post('pnombre'));
		 $data['papellido']= ucwords($this->input->post('papellido'));
		 $data['nick']= $this->input->post('nick'); 
		 $data['clave']= $this->bcrypt->hash_password($this->input->post('clave'));
		 $data['email']= $this->input->post('email');
		 $data['roles_id']= $this->input->post('rol'); 
		 $data['pregunta_s']= $this->input->post('pregunta_secreta'); 
		 $data['respuesta_s']= $this->bcrypt->hash_password($this->input->post('respuesta_secreta')); 
		   
		 $admin = 0;
		 
		 if($this->input->post('admin'))
			$admin= $this->input->post('admin');
		
		 $data['status_id']= 0;
		 
		 if($admin == 1)
			  $data['status_id']= 1;
		  
		$this->usuarios_model->guardar($data,$admin);	
	}
	
	public function editar($id){	 
		
		$editar = $this->crud_model->get_id_permiso("Editar");
		
		$query = $this->usuarios_model->get_datos_usuario($id);	
		
		if($query){
			$data['usuario_editar'] =  $query;
		}		
		
		$data['page_title'] = 'Usuarios';
        $data['page_name'] = 'usuarios/editar';
		$data['system_title'] = 'Editar';	
		$data['page_header'] = 'header';	
		$data['page_menu'] = '';
		$data['mod'] = 'usuarios';
		$data['form'] = 'validar';
		
		
		if (in_array($editar, $this->permisos())){
		
			$this->load->view('index', $data);
			
		}else{	
		
			$this->session->set_flashdata('flash_message', '<p class="font1 rojo"> No tiene permiso para editar usuarios </p>');
			redirect(base_url() . 'index.php/usuarios', 'refresh');
			
		}
	}
	
	public function actualizar(){
		
		 $data['pnombre']= ucwords($this->input->post('pnombre'));
		 $data['papellido']= ucwords($this->input->post('papellido'));
		 $data['nick']= $this->input->post('nick'); 
		 $data['email']= $this->input->post('email');
		 $data['id']= $this->input->post('id');
		 
		$this->usuarios_model->actualizar($data);		
	}
	
    public function eliminar(){	
		
		 $id_usuario = $this->input->post('id');
		 $this->usuarios_model->eliminar($id_usuario);
		 	
	}	
	

	
	
}

/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */