<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("Personas_m", '', TRUE);
	}

	public function index() {
		$data['personas'] = $this->Personas_m->get_all();
		$this->load->view('persona/index', $data);
	}

	public function detail() {
		$idPersona = $this->uri->segment(2);

		$data['persona'] = $this->Personas_m->get($idPersona);
		$data['tituloHEAD'] = $data['persona']->nombre;

		$this->load->view('persona/detalle', $data);
	}
}
