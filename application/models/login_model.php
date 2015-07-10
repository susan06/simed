<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Login_model extends CI_Model {

   function __construct() {
        parent::__construct();
		$this->load->library('bcrypt');
		$this->load->model('crud_model');
		$this->load->library( 'session_php' );		
    }
	
	public function login_user($username,$password){
		
		$this->db->where('nick',$username); 
		$query = $this->db->get('usuarios');
		
		if($query->num_rows() == 1)
        {
            $user = $query->row();
            $pass = $user->clave;
				
			if($user->status_id == 1)
			{
			
				if($this->bcrypt->check_password($password, $pass))
				{
				
					$data = array(
									'is_logued_in' 	=> 		TRUE,
									'nombre'    	=>      $user->pnombre,
									'apellido'  	=>      $user->papellido,
									'rol'      		=>      $user->roles_id,
									'nick'      	=>      $user->nick,
									'created_at' 	=>      $user->created_at,
					);	
					
					$this->session_php->set($user->nick);	
					$this->session_php->set_rol($user->roles_id);						
					$this->session->set_userdata($data);
					return TRUE;
					
				}else{
						$this->session->set_flashdata('error', 'Contraseña incorrecta');
						$this->session->set_flashdata('nick', $username);
						redirect(base_url() . 'index.php/login', 'refresh');
						return FALSE;

					}
			

			}else{
					$this->session->set_flashdata('warning', 'Su usuario aún no esta activado, Contacte al administrador');
					$this->session->set_flashdata('nick', $username);
					redirect(base_url() . 'index.php/login', 'refresh');
					return FALSE;
			
			}
		
		}else{
			$this->session->set_flashdata('error', 'E-mail o Contraseña incorrecta');
				redirect(base_url() . 'index.php/login', 'refresh');
				return FALSE;
			
			}
			
    }
	

	
}
