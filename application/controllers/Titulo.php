<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Titulo extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("Titulos_m", '', TRUE);
		$this->load->model("Usuarios_m", '', TRUE);
	}

	public function index() {
		$data['titulos'] = $this->Titulos_m->get_all();
		$this->load->view('titulo/index', $data);
	}

	public function detail() {
		$idTitulo = $this->uri->segment(2);

		// Título de la página
		$data['titulo'] = $this->Titulos_m->get($idTitulo);
		$data['tituloHEAD'] = $data['titulo']->titulo;

		// Voto del usurario en este título
		$data['votoUsuario'] = "-";
		if (isset($_SESSION['usuario_id'])) {
			$votoUsuario = $this->Usuarios_m->get_user_score($_SESSION['usuario_id'], $idTitulo);
			if (isset($votoUsuario)) {
				$data['votoUsuario'] = $votoUsuario->puntuacion;
			}
		}

		// Cast de actores
		$data['cast'] = $this->Titulos_m->get_cast($idTitulo);

		// Temporadas que contiene la serie
		if ($data['titulo']->tipo == 'serie') {
			$data['temporadas'] = $this->Titulos_m->get_seasons($idTitulo);
		}

		// Generos asignados
		$data['generos'] = $this->Titulos_m->get_genres($idTitulo);

		$this->load->view('titulo/detalle', $data);
	}

	public function voto() {

		// Usuario votante
		$idUsuario = $this->session->userdata('usuario_id');
		if (isset($idUsuario)) {

			$idTitulo = $this->uri->segment(2);
			$valorVoto = $this->uri->segment(4);

			// Validamos la puntuación
			if ($valorVoto == 0) {
				// Eliminamos la puntuación si 0
				$this->Titulos_m->delete_user_score($idTitulo, $idUsuario, $valorVoto);
			} else if ($valorVoto >= 1 && $valorVoto <= 10) {
				$this->Titulos_m->add_user_score($idTitulo, $idUsuario, $valorVoto);
			}

			// Recargamos la vista de detalle
            redirect("titulo/".$idTitulo);

		} else {
            redirect("usuario/login");
		}
	}


	public function episodios() {

		$idTitulo = $this->uri->segment(2);
		$idTemporada = $this->uri->segment(4);

		// Título de la página
		$data['titulo'] = $this->Titulos_m->get($idTitulo);
		$data['tituloHEAD'] = $data['titulo']->titulo;

		// Info
		$data['idSerie'] = $idTitulo;
		$data['tituloSerie'] = $data['titulo']->titulo;
		$data['temporadaSerie'] = $idTemporada;

		// Episodios de la temporada
		if ($data['titulo']->tipo == 'serie') {
			$data['temporadas'] = $this->Titulos_m->get_seasons($idTitulo);
			$data['episodios'] = $this->Titulos_m->get_epidodes($idTitulo, $idTemporada);
		} else {
			redirect("titulo/".$idTitulo);
		}

		$this->load->view('titulo/episodios', $data);
	}
}
