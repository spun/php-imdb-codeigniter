<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Titulo extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("Titulos_m", '', TRUE);
	}

	public function index() {
		$data['titulos'] = $this->Titulos_m->get_all();
		$this->load->view('titulo/index', $data);
	}

	public function detail() {
		$idTitulo = $this->uri->segment(2);

		$data['titulo'] = $this->Titulos_m->get($idTitulo);
		$data['cast'] = $this->Titulos_m->get_cast($idTitulo);
		$data['generos'] = $this->Titulos_m->get_genres($idTitulo);

		$this->load->view('titulo/detalle', $data);
	}
}
