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
		$this->db->select("Titulos.id id, "
			."Titulos.titulo titulo, "
			."Titulos.anyo anyo, "
			."Titulos.descripcion descripcion, "
			."Titulos.imagen imagen, "
			."avg(puntuacion) puntuacion, "
			."count(puntuacion) num_votos");
		$this->db->from("Titulos");
		$this->db->join('Votos', 'Votos.titulo = Titulos.id', 'inner');
		$this->db->where('Titulos.id', $idTitulo);
		return $this->db->get()->result();
	}

	public function get_cast($idTitulo) {
		$this->db->select("Personas.id persona_id, "
			."Personas.nombre persona, "
			."RepartoActores.persona_alternativo persona_alt, "
			."Personajes.id personaje_id, "
			."Personajes.nombre personaje, "
			."RepartoActores.personaje_alternativo personaje_alt");
		$this->db->from("RepartoActores");
		$this->db->join('Personas', 'Personas.id = RepartoActores.persona', 'left');
		$this->db->join('Personajes', 'Personajes.id = RepartoActores.personaje', 'left');
		$this->db->where('RepartoActores.titulo', $idTitulo);
		return $this->db->get()->result();
	}
}

?>