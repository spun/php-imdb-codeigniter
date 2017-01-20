<?php

class Personajes_m extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

	public function get_all() {
		$this->db->select("id, nombre");
		return $this->db->get("Personajes")->result();
	}

	public function get($idPersonaje) {
		$this->db->select("id, nombre, descripcion");
		return $this->db->get_where('Personajes', array('id' => $idPersonaje))->row();
	}
}

?>