<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestion extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->database();	// puede hacerse en autoload
		$this->load->library('grocery_CRUD');
	}

	public function index() {
		/*
		$data["tituloHEAD"] = "Bienvenido a mi sitio web";
		$data["tituloH1"] = "Bienvenido a mi sitio web";
		*/

		$crud = new grocery_CRUD();
		$crud->set_table('Usuarios');
		$crud->set_subject('usuario');

		$output = $crud->render();

		$this->load->view('gestion/index', $output);
	}

	public function titulos() {
		$crud = new grocery_CRUD();
		$crud->set_table('Titulos');
		$crud->set_subject('titulo');

		$output = $crud->render();

		$this->load->view('gestion/index', $output);
	}

	public function personas() {
		$crud = new grocery_CRUD();
		$crud->set_table('Personas');
		$crud->display_as('f_nacimiento','Fecha nacimiento');
		$crud->set_subject('persona');

		$output = $crud->render();

		$this->load->view('gestion/index', $output);
	}

	public function personajes() {
		$crud = new grocery_CRUD();
		$crud->set_table('Personajes');
		$crud->set_subject('personaje');

		$output = $crud->render();

		$this->load->view('gestion/index', $output);
	}


	public function repartos() {
		$crud = new grocery_CRUD();
		$crud->set_table('Repartos');
		$crud->set_subject('reparto');

		$crud->set_relation('titulo','Titulos','titulo');
		$crud->set_relation('personaje','Personajes','nombre');
		$crud->set_relation('persona','Personas','nombre');

		$output = $crud->render();

		$this->load->view('gestion/index', $output);
	}

}
