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
				$this->load->library( 'session_php' );
				$this->load->helper(array('url','form','html','date')); 
				$this->load->model('usuarios_model');
				$this->load->model('crud_model');
				$this->load->library('bcrypt');
				$this->load->database('default'); 			
				$this->removeCache();

				$nick = $this->session_php->get();
				$rol = $this->session_php->get_rol();
				$url = current_url();
				
				if($this->session->userdata('is_logued_in') == FALSE)
				{
					$this->session->set_flashdata('nick', $nick );
					$this->session->set_flashdata('rol',  $rol);
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
		
			$this->session->set_flashdata('warning_modal', 'No tiene permiso para ver los usuarios registrados');
			redirect(base_url() . 'home', 'refresh');
			
		}
	}
	
	public function permisos() 
	{
		
		$modulo = $this->crud_model->get_id_mod("usuarios"); 
		$permisos = $this->crud_model->get_permisos($this->session->userdata('rol'),$modulo);
		return $permisos;
	}	
	
	public function permisos_rol() 
	{	

		//permisos para el modulo de doctores
		$data['admin_3'] = $this->crud_model->get_permisos(1,3);
		
		//permisos para el modulo de terapias
		$data['admin_8']	= $this->crud_model->get_permisos(1,8);
		
		$data['page_title'] = 'Usuarios';
		$data['system_title'] = 'Permisos';
		
		$this->load->view('usuarios/permisos', $data);
	}	
	
	public function permisos_admin(){	
		 

		$doctores= $this->input->post('doctores'); 
		$status_doc= $this->input->post('status_doc'); 
		$rol= $this->input->post('rol_id'); 
		
		for ($i = 2; $i <= 3; $i++) {
				$this->db->where('id', $doctores[$i] );
				$this->db->update('rol_permiso', array('status'=> $status_doc[$i] ));			
		}
		
		$terapias= $this->input->post('terapias'); 
		$status_ter= $this->input->post('status_ter');
		
		for ($i = 1; $i <= 4; $i++) {
				$this->db->where('id', $terapias[$i] );
				$this->db->update('rol_permiso', array('status'=> $status_ter[$i] ));			
		}
		
		$this->session->set_flashdata('info', 'Cambios realizados con éxito');
		redirect(base_url() . 'usuarios/permisos_rol', 'refresh');	

	}
	
	public function permisos_rol22() 
	{	
		$data['d'] = $this->crud_model->get_id_permiso("Ver");
		$data['crear'] = $this->crud_model->get_id_permiso("Crear");
		$data['editar'] = $this->crud_model->get_id_permiso("Editar");
		$data['borrar'] = $this->crud_model->get_id_permiso("Borrar");
		

			//permisos para el modulo de doctores
		$data['admin_3'] = $this->crud_model->get_permisos(1,3);
	
		//permisos para el modulo de citas
		//$admin_4 	= $this->crud_model->get_permisos(1,4);
		//$enf_4 	= $this->crud_model->get_permisos(2,4);
		$data['doc_4'] 	= $this->crud_model->get_permisos(3,4);
		$data['ter_4'] 	= $this->crud_model->get_permisos(4,4);
		//$sec_4 	= $this->crud_model->get_permisos(5,4);
	
		//permisos para el modulo de citas
		//$admin_4 	= $this->crud_model->get_permisos(1,4);
		//$enf_4 	= $this->crud_model->get_permisos(2,4);
		$data['doc_4'] 	= $this->crud_model->get_permisos(3,4);
		$data['ter_4'] 	= $this->crud_model->get_permisos(4,4);
		//$sec_4 	= $this->crud_model->get_permisos(5,4);
	
		//permisos para el modulo de sala de espera
		//$admin_5 	= $this->crud_model->get_permisos(1,5);
		$data['enf_5 '] = $this->crud_model->get_permisos(2,5);
		$data['doc_5'] 	= $this->crud_model->get_permisos(3,5);
		$data['ter_5'] 	= $this->crud_model->get_permisos(4,5);
		//$sec_5 	= $this->crud_model->get_permisos(5,5);
	
		//permisos para el modulo de consultas
		//$data['admin_6 ']	= $this->crud_model->get_permisos(1,6);
		//$data['enf_6 '] = $this->crud_model->get_permisos(2,6);
		//$data['doc_6'] 	= $this->crud_model->get_permisos(3,6);
		//$data['ter_6'] 	= $this->crud_model->get_permisos(4,6);
		//$data['sec_6'] 	= $this->crud_model->get_permisos(5,6);

		//permisos para el modulo de expediente
		$data['admin_7 ']	= $this->crud_model->get_permisos(1,7);
		$data['enf_7 '] = $this->crud_model->get_permisos(2,7);
		//$data['doc_7'] 	= $this->crud_model->get_permisos(3,7);
		$data['ter_7'] 	= $this->crud_model->get_permisos(4,7);
		$data['sec_7'] 	= $this->crud_model->get_permisos(5,7);

		//permisos para el modulo de terapias
		$data['admin_8']	= $this->crud_model->get_permisos(1,8);
		//$data['enf_8 '] = $this->crud_model->get_permisos(2,8);
		$data['doc_8'] 	= $this->crud_model->get_permisos(3,8);
		//$data['ter_8'] 	= $this->crud_model->get_permisos(4,8);
		$data['sec_8'] 	= $this->crud_model->get_permisos(5,8);
		
		$data['page_title'] = 'Usuarios';
		$data['system_title'] = 'Permisos';
		
		$this->load->view('usuarios/permisos', $data);
	}
	
	public function roles()
	{	
		
		$crear = $this->crud_model->get_id_permiso("Crear");
		
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
		
		if (in_array($crear, $this->permisos())){
		
			$this->load->view('usuarios/roles', $data);
			
		}else{	
		
			$this->session->set_flashdata('warning_modal', 'No tiene permiso para ver roles');
			redirect(base_url() . 'home', 'refresh');
			
		}
	}
	
	public function status(){	
		$id = $this->input->post('id');
		$this->usuarios_model->cambiar_status($id);
	}
	
	public function cambiar_rol(){	
		$id = $this->input->post('id');
		$rol = $this->input->post('rol');
		$this->usuarios_model->cambiar_rol($id,$rol);
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