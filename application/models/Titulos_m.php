<?php

class Titulos_m extends CI_Model {

    public function __construct() {
        // Call the CI_Model constructor
        parent::__construct();
    }

	public function get_all() {
		$this->db->select("id, titulo, imagen");
		$this->db->order_by('id', 'DESC');
		return $this->db->get("Titulos")->result();
	}

	public function get($idTitulo) {
		$this->db->select("Titulos.id id, "
			."Titulos.titulo titulo, "
			."Titulos.anyo anyo, "
			."Titulos.tipo tipo, "
			."Titulos.duracion duracion, "
			."Titulos.descripcion descripcion, "
			."Titulos.imagen imagen, "
			."avg(puntuacion) puntuacion, "
			."count(puntuacion) num_votos");
		$this->db->from("Titulos");
		$this->db->join('Votos', 'Votos.titulo = Titulos.id', 'inner');
		$this->db->where('Titulos.id', $idTitulo);
		return $this->db->get()->row();
	}

	public function get_top_rated($tipo) {
		$this->db->select("Titulos.id id, "
			."Titulos.titulo titulo, "
			."Titulos.anyo anyo, "
			."Titulos.imagen imagen, "
			."avg(puntuacion) puntuacion_media, "
			."count(puntuacion) num_votos");
		$this->db->from("Titulos");
		$this->db->join('Votos', 'Votos.titulo = Titulos.id', 'left');
		$this->db->where('tipo', $tipo);
		$this->db->group_by('id, titulo, anyo, imagen');
		$this->db->order_by('puntuacion_media', 'DESC');
		$this->db->limit(250);
		return $this->db->get()->result();
	}


	public function get_top_popular($tipo) {
		$this->db->select("Titulos.id id, "
			."Titulos.titulo titulo, "
			."Titulos.anyo anyo, "
			."Titulos.imagen imagen, "
			."avg(puntuacion) puntuacion_media, "
			."count(puntuacion) num_votos");
		$this->db->from("Titulos");
		$this->db->join('Votos', 'Votos.titulo = Titulos.id', 'left');
		$this->db->where('tipo', $tipo);
		$this->db->group_by('id, titulo, anyo, imagen');
		$this->db->order_by('num_votos', 'DESC');
		$this->db->limit(250);
		return $this->db->get()->result();
	}

	public function get_cast($idTitulo) {
		$this->db->select("Personas.id persona_id, "
			."Personas.nombre persona, "
			."Personas.foto foto, "
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

	public function get_genres($idTitulo) {
		$this->db->select("id genero_id, nombre");
		$this->db->from("Generos");
		$this->db->join('GeneroTitulos', 'GeneroTitulos.genero = Generos.id', 'inner');
		$this->db->where('GeneroTitulos.titulo', $idTitulo);
		return $this->db->get()->result();
	}

	public function get_seasons($idTitulo) {
		$this->db->select("DISTINCT(temporada) num");
		$this->db->from("Titulos");
		$this->db->where('Titulos.serie', $idTitulo);
		$this->db->order_by('num', 'ASC');
		return $this->db->get()->result();
	}

	public function get_epidodes($idTitulo, $temporada) {
		$this->db->select("Titulos.id id, "
			."Titulos.titulo titulo, "
			."Titulos.anyo anyo, "
			."Titulos.imagen imagen, "
			."avg(puntuacion) puntuacion_media, "
			."count(puntuacion) num_votos");
		$this->db->from("Titulos");
		$this->db->join('Votos', 'Votos.titulo = Titulos.id', 'left');
		$this->db->where('tipo', 'episodio');
		$this->db->where('Titulos.serie', $idTitulo);
		$this->db->where('Titulos.temporada', $temporada);
		$this->db->group_by('id, titulo, anyo, imagen');
		$this->db->order_by('Titulos.temporada', 'DESC');
		$this->db->order_by('Titulos.capitulo', 'DESC');
		return $this->db->get()->result();
	}


	public function add_user_score($idTitulo, $idUser, $score) {

		$this->db->where('titulo',$idTitulo);
		$this->db->where('usuario', $idUser);
		$q = $this->db->get('Votos');

		if ($q->num_rows() > 0) {
		  	$this->db->where('titulo', $idTitulo);
			$this->db->where('usuario', $idUser);
		  	$this->db->update('Votos', array('puntuacion' => $score));
		} else {
			$data = array(
		        'titulo' => $idTitulo,
		        'usuario'  => $idUser,
		        'puntuacion'  => $score
			);
		  	$this->db->insert('Votos', $data);
		}

	}

	public function delete_user_score($idTitulo, $idUser) {
		$this->db->where('titulo',$idTitulo);
		$this->db->where('usuario', $idUser);
		$q = $this->db->delete('Votos');
	}


	public function search($match) {
		$this->db->select("Titulos.id id, "
			."Titulos.titulo titulo, "
			."Titulos.anyo anyo, "
			."Titulos.imagen imagen, "
			."avg(puntuacion) puntuacion_media, "
			."count(puntuacion) num_votos");
		$this->db->from("Titulos");
		$this->db->join('Votos', 'Votos.titulo = Titulos.id', 'left');
		$this->db->like('Titulos.titulo', $match, 'both');
		$this->db->group_by('id, titulo, anyo, imagen');
		$this->db->order_by('puntuacion_media', 'DESC');
		$this->db->limit(25);
		return $this->db->get()->result();
	}
}

?>