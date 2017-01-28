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

    // Usuarios
	public function index() {

		if ($this->checkUserPermissions()) {

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

			// Fichero de poster
			$crud->set_field_upload('imagen','assets/posters');
			// Relación con generos
			$crud->set_relation_n_n('Generos', 'GeneroTitulos', 'Generos', 'titulo', 'genero', 'nombre');

			$output = $crud->render();

			$this->load->view('gestion/index', $output);
		}
	}


	public function peliculas() {

		if($this->checkUserPermissions()) {
			$crud = new grocery_CRUD();
			$crud->set_table('Titulos');
			$crud->set_subject('pelicula');
			$crud->where('Titulos.tipo','pelicula');

			$crud->columns('imagen','titulo', 'descripcion', 'anyo','duracion','Generos');
			$crud->unset_fields('capitulo','temporada', 'serie');
			$crud->field_type('tipo', 'hidden', 'pelicula');

			// Fichero imagen
			$crud->set_field_upload('imagen','assets/posters');
			// Relación con generos
			$crud->set_relation_n_n('Generos', 'GeneroTitulos', 'Generos', 'titulo', 'genero', 'nombre');

			$output = $crud->render();

			$this->load->view('gestion/index', $output);
		}
	}


	public function series() {

		if($this->checkUserPermissions()) {
			$crud = new grocery_CRUD();
			$crud->set_table('Titulos');
			$crud->set_subject('serie');
			$crud->where('Titulos.tipo','serie');

			$crud->columns('imagen','titulo', 'descripcion', 'anyo','duracion','Generos');
			$crud->unset_fields('capitulo','temporada', 'serie');
			$crud->field_type('tipo', 'hidden', 'serie');

			// Fichero imagen
			$crud->set_field_upload('imagen','assets/posters');
			// Relación con generos
			$crud->set_relation_n_n('Generos', 'GeneroTitulos', 'Generos', 'titulo', 'genero', 'nombre');

			$output = $crud->render();

			$this->load->view('gestion/index', $output);
		}
	}


	public function episodios() {

		if($this->checkUserPermissions()) {
			$crud = new grocery_CRUD();
			$crud->set_table('Titulos');
			$crud->set_subject('episodio');
			$crud->where('Titulos.tipo','episodio');

			$crud->columns('imagen','titulo', 'descripcion', 'anyo','duracion','Generos', 'serie', 'temporada', 'capitulo');
			$crud->field_type('tipo', 'hidden', 'episodio');

			// Fichero imagen
			$crud->set_field_upload('imagen','assets/posters');
			// Relación con generos
			$crud->set_relation_n_n('Generos', 'GeneroTitulos', 'Generos', 'titulo', 'genero', 'nombre');
			// Relacion con titulos (serie)
			$crud->set_relation('serie', 'Titulos', 'titulo', array('tipo' => 'serie'));

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

			// Fichero imagen
			$crud->set_field_upload('foto','assets/personas');

			$output = $crud->render();

			$this->load->view('gestion/index', $output);
		}
	}

	public function personajes() {

		if($this->checkUserPermissions()) {
			$crud = new grocery_CRUD();
			$crud->set_table('Personajes');
			$crud->set_subject('personaje');

			// Fichero imagen
			$crud->set_field_upload('foto','assets/personajes');

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


	public function generos() {

		if($this->checkUserPermissions()) {
			$crud = new grocery_CRUD();
			$crud->set_table('Generos');
			$crud->set_subject('género');

			$output = $crud->render();

			$this->load->view('gestion/index', $output);
		}
	}

}
