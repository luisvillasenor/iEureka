<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_model extends CI_Model{

	function __construct()
	{
	    // Call the Model constructor
	    parent::__construct();
	        
	}

	public function get_users($id_user = FALSE){
		if ( $id_user === FALSE ) {
			# si NO hay valor en el parametro, devuelve todos los registros en forma de array
			$query = $this->db->get('users');
			return $query->result_array();
		}
		# devuelve 1 registro tipo array
		$query = $this->db->get_where('users',array('id_user' => $id_user));
		return $query->row_array();
	}

	public function new_user($correo,$id_rol,$password,$terminos)
	{
       $data = array(
            'email_address' => $correo,
            'id_rol' => $id_rol,
            'password' => sha1($password),
            'terminos' => $terminos,
            'fecha_creacion' => date('Y-m-d H:i:s')
        );
        $this->db->insert('users', $data);
        $id_user = $this->db->insert_id();
        // genera user id random para activacion
   		return $id_user;
    }

	public function activate_id($id_user)
	{
		$data = array(
            'fecha_activacion' => date('Y-m-d H:i:s'),
            'status' => 1
        );
        $this->db->where('id_user',$id_user);
        $this->db->update('users', $data);
        return TRUE;
    }

	public function show($id_user = FALSE){
		if ( $id_user === FALSE ) {
			# si NO hay valor en el parametro, devuelve todos los registros en forma de array
			$query = $this->db->get('user');
			return $query->result_array();
		}
		# devuelve 1 registro tipo array
		$query = $this->db->get_where('users',array('id_user' => $id_user));
		//return $query->row_array();
		return $query->result();
	}

	public function update()
	{
       $data = array(
            'nombreCompleto' => $this->input->post('nombreCompleto'),
            'pais' => $this->input->post('pais'),
            'domicilio1' => $this->input->post('domicilio1'),
            'domicilio2' => $this->input->post('domicilio2'),
            'ciudad' => $this->input->post('ciudad'),
            'estado' => $this->input->post('estado'),
            'cp' => $this->input->post('cp'),
            'telefono' => $this->input->post('telefono')
        );
        $this->db->where('id_user',$this->input->post('id_user'));
        $this->db->update('users', $data);
        return $this->input->post('id_user');
    }


}