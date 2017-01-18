<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("Usuarios_m", '', TRUE);
	}


	public function index() {
		$this->load->view('welcome_message');
	}

	public function registro() {
		$this->load->view('usuario/registro');
	}

	public function login() {
		$this->load->view('usuario/login');
	}

	public function doLogin() {


		$correo = $this->input->post('correo');
		$password = $this->input->post('password');

		// $resultQuery = $this->Usuarios_m->check($correo, $password);


		// Comprobar resultQuery
		// Si no devuelve nada, mensaje de error (el usuario o existe)

		// Si resultQuery devuelve un resultado, redirigir a pagina de perfil

		// Si resultQuery devuelve mas de un resultado, algo ha ido mal

		$this->load->view('home/index', $data);
	}

}
