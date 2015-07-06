<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Crud_model extends CI_Model {

   function __construct() {
        parent::__construct();
    }
 
	function get_name_rol($roles_id)
	{

		$query	=	$this->db->get_where('roles' , array('id' => $roles_id));

		$res	=	$query->result_array();

		foreach($res as $row)

			return $row['name'];

	}
	
	function get_permisos($roles_id,$modulo)
	{

		$query	=	$this->db->get_where('rol_permiso' , array('roles_id' => $roles_id, 'modulos_id' => $modulo));

		$res	=	$query->result_array();

		foreach($res as $row){

			 $array_permisos[] = $row['permisos_id'];
			
		}
		
		return $array_permisos;
		
	}
	
		function get_id_mod($mod)
	{

		$query	=	$this->db->get_where('modulos' , array('name' => $mod));

		$res	=	$query->result_array();

		foreach($res as $row)

			return $row['id'];

	}
	
	function get_id_permiso($permiso)
	{

		$query	=	$this->db->get_where('permisos' , array('name' => $permiso));

		$res	=	$query->result_array();

		foreach($res as $row)

			return $row['id'];

	}
}
