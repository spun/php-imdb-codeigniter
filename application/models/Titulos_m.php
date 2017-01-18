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

	public function get_cast($idTitulo) {
		$this->db->select("Personas.nombre persona, "
			."Repartos.persona_alternativo persona_alt, "
			."Personajes.nombre personaje, "
			."Repartos.personaje_alternativo personaje_alt");
		$this->db->from("Repartos");
		$this->db->join('Personas', 'Personas.id = Repartos.persona', 'left');
		$this->db->join('Personajes', 'Personajes.id = Repartos.personaje', 'left');
		$this->db->where(array('Repartos.titulo' => $idTitulo));
		return $this->db->get()->result();
	}
}

?>