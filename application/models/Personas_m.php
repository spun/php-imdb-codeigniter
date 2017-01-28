<?php

class Personas_m extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

	public function get_all() {
		$this->db->select("id, nombre, descripcion, foto");
		return $this->db->get("Personas")->result();
	}

	public function get($idPersona) {
		$this->db->select("id, nombre, descripcion, foto");
		return $this->db->get_where('Personas', array('id' => $idPersona))->row();
	}

	public function search($match) {
		$this->db->select("id, nombre, descripcion, foto");
		$this->db->from("Personas");
		$this->db->like('nombre', $match, 'both');
		$this->db->limit(25);
		return $this->db->get()->result();
	}
}

?>