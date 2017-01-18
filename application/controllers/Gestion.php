<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestion extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->database();	// puede hacerse en autoload
		$this->load->library('grocery_CRUD');
	}

	public function index()
	{
		/*
		$data["tituloHEAD"] = "Bienvenido a mi sitio web";
		$data["tituloH1"] = "Bienvenido a mi sitio web";
		*/

		$crud = new grocery_CRUD();
		$crud->set_table('Usuarios');
		$crud->set_subject('usuarios');

		$output = $crud->render();

		$this->load->view('gestion/index', $output);
	}
}
