<?php

class Titulos_m extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

	public function get_all() {
		$this->db->select("id, titulo");
		return $this->db->get("Titulos")->result();
	}

	public function get($idTitulo) {
		$this->db->select("id, titulo, anyo, descripcion");
		return $this->db->get_where('Titulos', array('id' => $idTitulo))->result();
	}
}

?>