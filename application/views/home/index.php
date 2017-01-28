<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>


<!-- Main content -->
<div class="col-sm-8">
	<h3>Añadido recientemente</h3>
	<div class="row lista-generos">

		<?php
		$numTiulos = sizeOf($titulos);
		for ($i = 0; $i < $numTiulos; $i = $i + 4) {
			echo  '<div class="row">';
			$limitRow = $i+4;
			for ($j = $i; ($j < $limitRow) && $j < $numTiulos; $j++){
				echo  '<div class="col-sm-3">';
					$titulo = $titulos[$j];
					echo img(array(
						'src'   => base_url("assets/posters/" . ((isset($titulo->imagen) && !empty($titulo->imagen)) ? $titulo->imagen : 'default.jpg' )),
						'height'=> '150',
						'class'=> 'img-thumbnail'
					));
					echo '<h5 class="text-center">'.anchor("/titulo/".$titulo->id, $titulo->titulo, "title='Ver detalles'").'</h5>';
				echo '</div>';
			}
			echo '</div>';
		}
		?>

	</div>
</div>

<!-- Sidebar content -->
<div class="sidebar-box well col-sm-4">
	Sidebar
</div>


<?php
	$this->load->view('inc/pie.php');
?>
