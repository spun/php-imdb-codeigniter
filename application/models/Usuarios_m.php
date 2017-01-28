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

	public function get($correo, $password) {
		$this->db->select("id, nombre, rol");
		return $this->db->get_where('Usuarios', array('correo' => $correo, 'password' => $password))->result();
	}

	public function add($nombre, $correo, $password) {
		return $this->db->insert("Usuarios", array('nombre' => $nombre, 'correo' => $correo, 'password' => $password));
	}

	public function get_user_score($idUsuario, $idTitulo) {
		$this->db->select("puntuacion");
		$this->db->from("Votos");
		$this->db->where('usuario', $idUsuario);
		$this->db->where('titulo', $idTitulo);
		return $this->db->get()->row();	}
}

?>