<?php

class Usuarios_m extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

	public function get_all() {
		$this->db->select("id, nombre, correo, password");
		return $this->db->get("Usuarios")->result();
	}

	public function check($correo, $password) {
		$this->db->select("id, nombre, correo, password");

		return $this->db->get_where('Usuarios', array('correo' => $correo, 'password' => $password))->result();
	}
}

?>