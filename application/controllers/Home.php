<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	function __construct() {
		parent::__construct();
		$this->load->model("Usuarios_m", '', TRUE);
	}


	public function index() {

		$data['usuarios'] = $this->Usuarios_m->get_all();
		$this->load->view('home/index', $data);
	}

}
