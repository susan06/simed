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
		
		$ver = 1;
		
		$data['page_title'] = 'Usuarios';
		$data['system_title'] = 'Ver';		
		$data['borrar'] = 3;
		$data['permisos'] = $this->permisos();
		$permisos = $this->permisos();
		
		$usuarios = $this->usuarios_model->get_lista_usuarios();

		if($usuarios){
			$data['usuarios'] =  $usuarios;
		}else{
			$data['usuarios'] =  NULL;
		}
		

		if ( $permisos[$ver]['status'] == 1 ){
			
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
		$ver = 1;
		$permisos = $this->permisos();
		//por defecto el administrador
		//permisos para el modulo de doctores
		$data['admin_3'] = $this->crud_model->get_permisos(1,3);
		
		//permisos para el modulo de terapias
		$data['admin_8']	= $this->crud_model->get_permisos(1,8);
		
		$data['page_title'] = 'Usuarios';
		$data['system_title'] = 'Permisos';			
		
		if ( $permisos[$ver]['status'] == 1 ){
			
			$this->load->view('usuarios/permisos', $data);
			
		}else{	
		
			$this->session->set_flashdata('warning_modal', 'No tiene permiso para ver los permisos de los usuarios');
			redirect(base_url() . 'home', 'refresh');
			
		}
	}	
	
	public function permisos_admin(){	
		 

		$doctores= $this->input->post('doctores'); 
		$status_doc= $this->input->post('status_doc'); 
		$rol= $this->input->post('rol_id'); 
		
	
		$this->db->where('id', $doctores[2] );
		$this->db->update('rol_permiso', array('status'=> $status_doc[2] ));			
		
		$this->db->where('id', $doctores[4] );
		$this->db->update('rol_permiso', array('status'=> $status_doc[4] ));
		
		$terapias= $this->input->post('terapias'); 
		$status_ter= $this->input->post('status_ter');
		
		for ($i = 1; $i <= 4; $i++) {
				$this->db->where('id', $terapias[$i] );
				$this->db->update('rol_permiso', array('status'=> $status_ter[$i] ));			
		}
		
		$this->session->set_flashdata('info', 'Cambios realizados con éxito');
		redirect(base_url() . 'usuarios/permisos_rol', 'refresh');	

	}
	
	public function get_permisos_rol($rol){	
		 
		if($rol == 2){
			$data['rol_name']='Enfermera';
			$data['rol']=2;
			$data['mod_2'] = $this->crud_model->get_permisos(2,2);
			$data['mod_3'] = $this->crud_model->get_permisos(2,3);
			$data['mod_4'] = $this->crud_model->get_permisos(2,4);
			$data['mod_5'] = $this->crud_model->get_permisos(2,5);
			$data['mod_6'] = $this->crud_model->get_permisos(2,6);
			$data['mod_7'] = $this->crud_model->get_permisos(2,7);
			$data['mod_8'] = $this->crud_model->get_permisos(2,8);
			$data['mod_10'] = $this->crud_model->get_permisos(2,10);
			$data['mod_11'] = $this->crud_model->get_permisos(2,11);
		}
		if($rol == 3){
			$data['rol_name']='Doctor';
			$data['rol']=3;
			$data['mod_2'] = $this->crud_model->get_permisos(3,2);
			$data['mod_3'] = $this->crud_model->get_permisos(3,3);
			$data['mod_4'] = $this->crud_model->get_permisos(3,4);
			$data['mod_5'] = $this->crud_model->get_permisos(3,5);
			$data['mod_6'] = $this->crud_model->get_permisos(3,6);
			$data['mod_7'] = $this->crud_model->get_permisos(3,7);
			$data['mod_8'] = $this->crud_model->get_permisos(3,8);
			$data['mod_10'] = $this->crud_model->get_permisos(3,10);
			$data['mod_11'] = $this->crud_model->get_permisos(3,11);
		}
		if($rol == 4){
			$data['rol_name']='Terapista';
			$data['rol']=4;
			$data['mod_2'] = $this->crud_model->get_permisos(4,2);
			$data['mod_3'] = $this->crud_model->get_permisos(4,3);
			$data['mod_4'] = $this->crud_model->get_permisos(4,4);
			$data['mod_5'] = $this->crud_model->get_permisos(4,5);
			$data['mod_6'] = $this->crud_model->get_permisos(4,6);
			$data['mod_7'] = $this->crud_model->get_permisos(4,7);
			$data['mod_8'] = $this->crud_model->get_permisos(4,8);
			$data['mod_10'] = $this->crud_model->get_permisos(4,10);
			$data['mod_11'] = $this->crud_model->get_permisos(4,11);
		}
		if($rol == 5){
			$data['rol_name']='Secretaria';
			$data['rol']=5;
			$data['mod_2'] = $this->crud_model->get_permisos(5,2);
			$data['mod_3'] = $this->crud_model->get_permisos(5,3);
			$data['mod_4'] = $this->crud_model->get_permisos(5,4);
			$data['mod_5'] = $this->crud_model->get_permisos(5,5);
			$data['mod_6'] = $this->crud_model->get_permisos(5,6);
			$data['mod_7'] = $this->crud_model->get_permisos(5,7);
			$data['mod_8'] = $this->crud_model->get_permisos(5,8);
			$data['mod_10'] = $this->crud_model->get_permisos(5,10);
			$data['mod_11'] = $this->crud_model->get_permisos(5,11);
		}
		
		return $this->load->view('usuarios/permiso_rol', $data);	
	}
	
	public function permisos_guardar(){	
		
		$rol =$this->input->post('rol_id');
		 
		if($rol == 2){			
			$terapias= $this->input->post('terapias'); 
			$status_ter= $this->input->post('status_ter');
			
			for ($i = 1; $i <= 4; $i++) {
					$this->db->where('id', $terapias[$i] );
					$this->db->update('rol_permiso', array('status'=> $status_ter[$i] ));			
			}
			
			$especialidades= $this->input->post('especialidades'); 
			$status_espec= $this->input->post('status_espec');
			
			for ($i = 1; $i <= 4; $i++) {
					$this->db->where('id', $especialidades[$i] );
					$this->db->update('rol_permiso', array('status'=> $status_espec[$i] ));			
			}

			$clinica= $this->input->post('clinica'); 
			$status_cli= $this->input->post('status_cli');
			
			for ($i = 2; $i <= 2; $i++) {
					$this->db->where('id', $clinica[$i] );
					$this->db->update('rol_permiso', array('status'=> $status_cli[$i] ));			
			}
			
		$this->session->set_flashdata('info', 'Cambios realizados con éxito');
		$this->session->set_flashdata('rol_load', $rol);
		redirect(base_url() . 'usuarios/permisos_rol', 'refresh');	
		
		}
	
	if($rol == 3){			
			
			$pacientes= $this->input->post('pacientes'); 
			$status_pac= $this->input->post('status_pac');
			
			for ($i = 1; $i <= 4; $i++) {
					$this->db->where('id', $pacientes[$i] );
					$this->db->update('rol_permiso', array('status'=> $status_pac[$i] ));			
			}
			
			$terapias= $this->input->post('terapias'); 
			$status_ter= $this->input->post('status_ter');
			
			for ($i = 1; $i <= 4; $i++) {
					$this->db->where('id', $terapias[$i] );
					$this->db->update('rol_permiso', array('status'=> $status_ter[$i] ));			
			}
			
			$citas= $this->input->post('citas'); 
			$status_cit= $this->input->post('status_cit');
			
			for ($i = 1; $i <= 4; $i++) {
					$this->db->where('id', $citas[$i] );
					$this->db->update('rol_permiso', array('status'=> $status_cit[$i] ));			
			}
			
			$espera= $this->input->post('espera'); 
			$status_esp= $this->input->post('status_esp');
			
			for ($i = 1; $i <= 4; $i++) {
					$this->db->where('id', $espera[$i] );
					$this->db->update('rol_permiso', array('status'=> $status_esp[$i] ));			
			}
			
			$especialidades= $this->input->post('especialidades'); 
			$status_espec= $this->input->post('status_espec');
			
			for ($i = 1; $i <= 4; $i++) {
					$this->db->where('id', $especialidades[$i] );
					$this->db->update('rol_permiso', array('status'=> $status_espec[$i] ));			
			}
			
			$clinica= $this->input->post('clinica'); 
			$status_cli= $this->input->post('status_cli');
			
			for ($i = 2; $i <= 2; $i++) {
					$this->db->where('id', $clinica[$i] );
					$this->db->update('rol_permiso', array('status'=> $status_cli[$i] ));			
			}
			
		$this->session->set_flashdata('info', 'Cambios realizados con éxito');
		$this->session->set_flashdata('rol_load', $rol);
		redirect(base_url() . 'usuarios/permisos_rol', 'refresh');	
		
		}
	
		if($rol == 4){			
			
			$especialidades= $this->input->post('especialidades'); 
			$status_espec= $this->input->post('status_espec');
			
			for ($i = 1; $i <= 4; $i++) {
					$this->db->where('id', $especialidades[$i] );
					$this->db->update('rol_permiso', array('status'=> $status_espec[$i] ));			
			}

			$clinica= $this->input->post('clinica'); 
			$status_cli= $this->input->post('status_cli');
			
			for ($i = 2; $i <= 2; $i++) {
					$this->db->where('id', $clinica[$i] );
					$this->db->update('rol_permiso', array('status'=> $status_cli[$i] ));			
			}
			
		$this->session->set_flashdata('info', 'Cambios realizados con éxito');
		$this->session->set_flashdata('rol_load', $rol);
		redirect(base_url() . 'usuarios/permisos_rol', 'refresh');	
		
		}
		
	if($rol == 5){			
			
			$pacientes= $this->input->post('pacientes'); 
			$status_pac= $this->input->post('status_pac');
			
			for ($i = 1; $i <= 4; $i++) {
					$this->db->where('id', $pacientes[$i] );
					$this->db->update('rol_permiso', array('status'=> $status_pac[$i] ));			
			}
			
			$terapias= $this->input->post('terapias'); 
			$status_ter= $this->input->post('status_ter');
			
			
			for ($i = 1; $i <= 4; $i++) {
					$this->db->where('id', $terapias[$i] );
					$this->db->update('rol_permiso', array('status'=> $status_ter[$i] ));			
			}
			
			$especialidades= $this->input->post('especialidades'); 
			$status_espec= $this->input->post('status_espec');
			
			for ($i = 1; $i <= 4; $i++) {
					$this->db->where('id', $especialidades[$i] );
					$this->db->update('rol_permiso', array('status'=> $status_espec[$i] ));			
			}
			
			$clinica= $this->input->post('clinica'); 
			$status_cli= $this->input->post('status_cli');
			
			for ($i = 2; $i <= 2; $i++) {
					$this->db->where('id', $clinica[$i] );
					$this->db->update('rol_permiso', array('status'=> $status_cli[$i] ));			
			}
			
		$this->session->set_flashdata('info', 'Cambios realizados con éxito');
		$this->session->set_flashdata('rol_load', $rol);
		redirect(base_url() . 'usuarios/permisos_rol', 'refresh');	
		
		}		
	}
	
	
	public function roles()
	{	
		$ver =1;
		$permisos = $this->permisos();
		
		$data['page_title'] = 'Usuarios';
		$data['system_title'] = 'Ver';				
		$data['permisos'] = $this->permisos();
		
		$usuarios = $this->usuarios_model->get_lista_usuarios();

		if($usuarios){
			$data['usuarios'] =  $usuarios;
		}else{
			$data['usuarios'] =  NULL;
		}

		if ($permisos[$ver]['status'] == 1){
		
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
	
	public function perfil($id){	
		
		$query = $this->usuarios_model->get_datos_usuario($id);	
		
		if($query){
			$data['usuario_editar'] =  $query;
		}		
		
		$data['page_title'] = 'Usuario';
		$data['system_title'] = 'Editar';	

		$this->load->view('usuarios/perfil', $data);
			
	}	
	
	public function actualizar(){
		
		 $data['pnombre']= ucwords($this->input->post('pnombre'));
		 $data['papellido']= ucwords($this->input->post('papellido'));
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