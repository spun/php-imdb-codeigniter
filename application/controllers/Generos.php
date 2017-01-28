<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generos extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("Generos_m", '', TRUE);
	}

	public function index() {
		$data['tituloHEAD'] = "Popular by Genre";

		$data['generos'] = $this->Generos_m->get_all();
		$this->load->view('generos/index', $data);
	}

	public function top() {

		$idGenero = $this->uri->segment(2);
		$nombreGenero = $this->Generos_m->get($idGenero)->nombre;

		$data['tituloHEAD'] = $nombreGenero. " Movies";
		$data['chart_title'] = "Top \"".$nombreGenero."\" Movies";
		$data['chart_description'] = "Top 250 as rated by Users";

		$data['titulos'] = $this->Generos_m->get_top_movies_by_genre($idGenero);
		$this->load->view('chart/index', $data);
	}
}
