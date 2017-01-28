<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("Titulos_m", '', TRUE);
		$this->load->model("Personas_m", '', TRUE);
		$this->load->model("Personajes_m", '', TRUE);
	}

	public function all() {
		$data['tituloHEAD'] = "Búsqueda";

		// Texto a buscar
		$match = $this->input->get('s');
		$data['query'] = $match;

		// Resultados
		$data['titulos'] = $this->Titulos_m->search($match);
		$data['personas'] = $this->Personas_m->search($match);
		$data['personajes'] = $this->Personajes_m->search($match);
		$this->load->view('search/index', $data);
	}


}
