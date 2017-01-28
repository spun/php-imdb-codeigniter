<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>


<!-- Main content -->
<div class="col-sm-8 main-content">
	<h4>IMDb Charts</h4>
	<h2><?= $chart_title ?></h2>
	<p><?= $chart_description ?></p>


	<table class="table imdb-chart">
		<thead>
			<tr>
				<th></th>
				<th>Rank &amp;Title</th>
				<th>Score</th>
				<th>Votes</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$index = 1;
			foreach($titulos as $titulo) {
				echo('<tr>');
				echo '<td>'.img(array(
					'src'   => base_url("assets/posters/" . ((isset($titulo->imagen) && !empty($titulo->imagen)) ? $titulo->imagen : 'default.jpg' )),
					'class'   => 'overview-image',
					'width'=> '45'
				)).'</td>';
				echo '<td valign="middle">'.$index.'. '.anchor("/titulo/".$titulo->id, $titulo->titulo, "title='Ver detalles'").' ('.$titulo->anyo.')</td>';

				if (isset($titulo->puntuacion_media)) {
					echo('<td><span class="glyphicon glyphicon-star" aria-hidden="true"></span> '. number_format($titulo->puntuacion_media, 1, '.', ' ') .'</td>');
				} else {
					echo('<td><span class="glyphicon glyphicon-star" aria-hidden="true"></span> -</td>');
				}


				if (isset($titulo->num_votos)) {
					echo('<td>'. $titulo->num_votos .'</td>');
				} else {
					echo('<td>-</td>');
				}
				echo('</tr>');

				$index++;
			}

			?>
		</tbody>
	</table>
	<?php if (sizeOf($titulos) <= 0) { ?>
		</hr>
		<h4 class="text-center">No se han encontrado resultados</h4>
	<?php } ?>
</div>

<!-- Sidebar content -->
<div class="sidebar-box well col-sm-4">
	Sidebar
</div>


<?php
	$this->load->view('inc/pie.php');
?>
