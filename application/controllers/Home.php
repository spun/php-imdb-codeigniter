<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->model("Titulos_m", '', TRUE);
	}


	public function index() {
		// Título de la página
		$data['tituloHEAD'] = "Inicio";

		// Últimos títulos añadidos
		$data['titulos'] = $this->Titulos_m->get_all();
		$this->load->view('home/index', $data);
	}

}
