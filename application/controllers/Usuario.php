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


	public function login() {

		$this->load->library('form_validation');


		// Creamos las reglas de validación del formulario de login
		// - Campo correo
		$this->form_validation->set_rules('correo', 'Correo', 'required',
		    array(
		    	'required' => 'Debes introducir el correo eletrónico con el que te registraste'
		    )
		);
		// - Campo contraseña
		$this->form_validation->set_rules('password', 'Contraseña', 'required',
		    array(
		    	'required' => 'Debes introducir una contraseña'
		    )
		);


		// Validación del formulario
		if ($this->form_validation->run() == FALSE) {
			// Si no se ha podido validar,
			// mostramos los errores en el formulario
			$this->load->view('usuario/login');
		} else {
			// Si la validacion es correcta, comprobamos que el usuario existe
			// y que tiene esa contraseña
			$nombre   = $this->input->post('correo');
			$password = $this->input->post('password');

			$returnQuery = $this->Usuarios_m->get($nombre, sha1($password));

			if(sizeOf($returnQuery) == 1) {
				// Inicio de sesión
				$datosUsuario = $returnQuery[0];

				$datosNuevaSesion = array(
					'usuario_id'     => $datosUsuario->id,
			        'usuario_nombre' => $datosUsuario->nombre,
			        'usuario_rol'    => $datosUsuario->rol
				);
				$this->session->set_userdata($datosNuevaSesion);

				// Redirigimos a home
				redirect('home', 'refresh');
			} else {
				// Mensaje de error
				$data['mensajeErrorGlobal'] = "No existe ningún usuario con esos datos";
				$this->load->view('usuario/login', $data);
			}
		}
	}


	public function logout() {
		session_destroy();
		redirect('home', 'refresh');
	}


	public function registro() {

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');


		// Creamos las reglas de validación del formulario de registro
		// - Campo nombre
		$this->form_validation->set_rules('nombre', 'Nombre', 'required|min_length[4]|max_length[12]',
		    array(
		    	'required'   => 'Debes indicar un nombre',
		    	'min_length' => 'El nombre debe tener un tamaño mínimo de {param} caracteres',
		    	'max_length' => 'El nombre tener un tamaño máximo de {param} caracteres'
		    )
		);
		// - Campo correo
		$this->form_validation->set_rules('correo', 'Correo', 'required|is_unique[Usuarios.correo]',
		    array(
		    	'required'  => 'Debes indicar un correo electrónico',
		    	'is_unique' => 'El correo introducido ya está siendo usado'
		    )
		);
		// - Campo contraseña
		$this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[8]',
		    array(
		    	'required'   => 'Debes introducir una contraseña',
		    	'min_length' => 'El nombre debe tener un tamaño mínimo de {param} caracteres'
		    )
		);
		// - Campo repetición de contraseña
		$this->form_validation->set_rules('passwordConf', 'Confirmación contraseña', 'required|matches[password]',
		    array(
		    	'required' => 'Debes repetir la contraseña',
		    	'matches'  => 'Las contraseñas no coinciden'
		    )
		);


		// Validación del formulario
		if ($this->form_validation->run() == FALSE) {
			// Si no se ha podido validar,
			// mostramos los errores en el formulario
			$this->load->view('usuario/registro');
		} else {
			// Si la validacion es correcta, insertamos el usuario
			$nombre   = $this->input->post('nombre');
			$correo   = $this->input->post('correo');
			$password = $this->input->post('password');

			if($this->Usuarios_m->add($nombre, $correo, sha1($password)) == true) {
				// Redirigimos al login
				redirect('usuario/login', 'refresh');
			} else {
				// Mensaje de error
				$data['mensajeErrorGlobal'] = "Ocurrio un error al intentar registrar el usuario";
				$this->load->view('usuario/registro', $data);
			}
		}
	}
}
