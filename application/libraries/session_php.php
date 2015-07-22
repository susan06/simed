<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Session_php
{
    public function __construct()
    {
        session_start();
    }

    public function set( $nick)
    {
        $_SESSION['nick'] = $nick;
    }
	
    public function set_rol( $rol)
    {
        $_SESSION['rol'] = $rol;
    }
	
	public function set_sexo( $sexo)
    {
        $_SESSION['sexo'] = $sexo;
    }
	
    public function get()
    {
        return isset( $_SESSION['nick'] ) ? $_SESSION['nick'] : null;
    }
	
	public function get_rol()
    {
        return isset( $_SESSION['rol'] ) ? $_SESSION['rol'] : null;
    }
	
	public function get_sexo()
    {
        return isset( $_SESSION['sexo'] ) ? $_SESSION['sexo'] : null;
    }
	
    public function delete( )
    {
        unset( $_SESSION['nick'] );
		unset( $_SESSION['rol'] );
		unset( $_SESSION['sexo'] );
    }
}