<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gestion extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->database();	// puede hacerse en autoload
		$this->load->library('grocery_CRUD');
	}



	public function checkUserPermissions() {

		// Comprobamos que el usuario que intenta acceder es un administrador
        if($this->session->userdata('usuario_rol') != 'admin') {
            redirect("home");
        }
        return true;
    }

	public function index() {

		if ($this->checkUserPermissions()) {
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
	}

	public function titulos() {

		if($this->checkUserPermissions()) {
			$crud = new grocery_CRUD();
			$crud->set_table('Titulos');
			$crud->set_subject('titulo');

			$crud->set_field_upload('imagen','assets/posters');
			// Relación con generos
			$crud->set_relation_n_n('Generos', 'GeneroTitulos', 'Generos', 'titulo', 'genero', 'nombre');

			$output = $crud->render();

			$this->load->view('gestion/index', $output);
		}
	}

	public function personas() {

		if($this->checkUserPermissions()) {
			$crud = new grocery_CRUD();
			$crud->set_table('Personas');
			$crud->display_as('f_nacimiento','Fecha nacimiento');
			$crud->set_subject('persona');

			$output = $crud->render();

			$this->load->view('gestion/index', $output);
		}
	}

	public function personajes() {

		if($this->checkUserPermissions()) {
			$crud = new grocery_CRUD();
			$crud->set_table('Personajes');
			$crud->set_subject('personaje');

			$output = $crud->render();

			$this->load->view('gestion/index', $output);
		}
	}


	public function repartos() {

		if($this->checkUserPermissions()) {
			$crud = new grocery_CRUD();
			$crud->set_table('RepartoActores');
			$crud->set_subject('reparto');

			$crud->set_relation('titulo','Titulos','titulo');
			$crud->set_relation('personaje','Personajes','nombre');
			$crud->set_relation('persona','Personas','nombre');

			$output = $crud->render();

			$this->load->view('gestion/index', $output);
		}
	}

}
