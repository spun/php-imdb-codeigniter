<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personaje extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("Personajes_m", '', TRUE);
	}

	public function index() {
		$data['personajes'] = $this->Personajes_m->get_all();
		$this->load->view('personaje/index', $data);
	}

	public function detail() {
		$idPersonaje = $this->uri->segment(2);

		$data['personajes'] = $this->Personajes_m->get($idPersonaje);

		$this->load->view('personaje/detalle', $data);
	}
}
