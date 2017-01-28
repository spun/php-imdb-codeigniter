<?php

class Generos_m extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

	public function get_all() {
		$this->db->select("id, nombre");
		return $this->db->get("Generos")->result();
	}

	public function get($genero) {
		$this->db->select("id, nombre");
		$this->db->where('id', $genero);
		return $this->db->get("Generos")->row();
	}


	public function get_top_movies_by_genre($genero) {
		$this->db->select("Titulos.id id, "
			."Titulos.titulo titulo, "
			."Titulos.anyo anyo, "
			."Titulos.imagen imagen, "
			."avg(puntuacion) puntuacion_media, "
			."count(puntuacion) num_votos");
		$this->db->from("Titulos");
		$this->db->join('Votos', 'Votos.titulo = Titulos.id', 'left');
		$this->db->join('GeneroTitulos', 'GeneroTitulos.titulo = Titulos.id', 'left');
		$this->db->where('tipo', 'pelicula');
		$this->db->where('genero', $genero);
		$this->db->group_by('id, titulo, anyo, imagen');
		$this->db->order_by('puntuacion_media', 'DESC');
		$this->db->limit(250);
		return $this->db->get()->result();
	}
}

?>