<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("Titulos_m", '', TRUE);
		$this->load->model("Personas_m", '', TRUE);
	}

	public function top() {
		// Título de la página
		$data['tituloHEAD'] = "Top Rated Movies";

		// Texto cabecera
		$data['chart_title'] = "Top Rated Movies";
		$data['chart_description'] = "Top 250 as rated by Users";

		$data['titulos'] = $this->Titulos_m->get_top_rated('pelicula');
		$this->load->view('chart/index', $data);
	}

	public function popular() {
		// Título de la página
		$data['tituloHEAD'] = "Most Popular Movies";

		// Texto cabecera
		$data['chart_title'] = "Most Popular Movies";
		$data['chart_description'] = "As determined by Users";

		$data['titulos'] = $this->Titulos_m->get_top_popular('pelicula');
		$this->load->view('chart/index', $data);
	}

	public function toptv() {
		// Título de la página
		$data['tituloHEAD'] = "Top Rated TV Shows";

		// Texto cabecera
		$data['chart_title'] = "Top Rated TV Shows";
		$data['chart_description'] = "Top 250 as rated by Users";

		$data['titulos'] = $this->Titulos_m->get_top_rated('serie');
		$this->load->view('chart/index', $data);
	}

	public function populartv() {
		// Título de la página
		$data['tituloHEAD'] = "Most Popular TV Shows";

		// Texto cabecera
		$data['chart_title'] = "Most Popular TV Shows";
		$data['chart_description'] = "As determined by Users";

		$data['titulos'] = $this->Titulos_m->get_top_popular('serie');
		$this->load->view('chart/index', $data);
	}


	public function celebs() {
		// Título de la página
		$data['tituloHEAD'] = "Most Popular Celebs";

		// Texto cabecera
		$data['chart_title'] = "Most Popular Celebs";
		$data['chart_description'] = "Most Popular Females/Males";

		$data['personas'] = $this->Personas_m->get_all();
		$this->load->view('chart/celebs', $data);
	}

}
