<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Centro_model extends CI_Model {

   function __construct() {
        parent::__construct();
    }
 

	function get_clinica(){	
		$this->db->select("*");
		$this->db->from('clinica');
		$this->db->where('id', 1);				
		$query = $this->db->get();		
		return $query->result_array();			
	}	


	function actualizar($data)
	{	
	
	$this->db->where('id', $data['id']);
    $updateSQL=$this->db->update('clinica', $data);	
		
		if($updateSQL) {								
			$this->session->set_flashdata('info', 'Se realizaron los cambios con éxito');
			redirect(base_url() . 'centro_medico', 'refresh');	
		}else{
			$this->session->set_flashdata('error', 'Intente actualizar los datos de nuevo');
			redirect(base_url() . 'centro_medico', 'refresh');	
		}
		
	}

}
