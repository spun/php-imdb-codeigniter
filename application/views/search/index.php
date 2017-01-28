<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>


<!-- Main content -->
<div class="col-sm-8 main-content">
	<h4>Búsqueda global</h4>
	<h3>Resultados de búsqueda de "<?= htmlspecialchars($query) ?>"</h3>
	</br>


	<?php if (sizeOf($titulos) > 0) { ?>
	<div class="well">
		<h4>Títulos</h4>
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

				foreach($titulos as $titulo) {
					echo('<tr>');
					echo '<td>'.img(array(
						'src'   => base_url("assets/posters/" . ((isset($titulo->imagen) && !empty($titulo->imagen)) ? $titulo->imagen : 'default.jpg' )),
						'class'   => 'overview-image',
						'width'=> '45'
					)).'</td>';
					echo '<td valign="middle">'.anchor("/titulo/".$titulo->id, $titulo->titulo, "title='Ver detalles'").' ('.$titulo->anyo.')</td>';

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
				}

				?>
			</tbody>
		</table>
	</div>
	<?php } ?>


	<?php if (sizeOf($personas) > 0) { ?>
	<div class="well">
		<h4>Personas</h4>
		<table class="table imdb-chart">
			<thead>
				<tr>
					<th>Photo</th>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>
				<?php

				foreach($personas as $persona) {
					echo('<tr>');
						echo '<td>'.img(array(
							'src'   => base_url("assets/personas/" . ((isset($persona->foto) && !empty($persona->foto)) ? $persona->foto : 'default.jpg' )),
							'class'   => 'overview-image',
							'width'=> '45'
						)).'</td>';

						echo '<td valign="middle">'.anchor("/persona/".$persona->id, $persona->nombre, "title='Ver detalles'").'<br></td>';
					echo('</tr>');
				}

				?>
			</tbody>
		</table>
	</div>
	<?php } ?>


	<?php if (sizeOf($personajes) > 0) { ?>
	<div class="well">
		<h4>Personajes</h4>
		<table class="table imdb-chart">
			<thead>
				<tr>
					<th>Photo</th>
					<th>Name</th>
				</tr>
			</thead>
			<tbody>
				<?php

				foreach($personajes as $personaje) {
					echo('<tr>');
						echo '<td>'.img(array(
							'src'   => base_url("assets/personajes/" . ((isset($personaje->foto) && !empty($personaje->foto)) ? $personaje->foto : 'default.jpg' )),
							'class'   => 'overview-image',
							'width'=> '45'
						)).'</td>';

						echo '<td valign="middle">'.anchor("/personaje/".$personaje->id, $personaje->nombre, "title='Ver detalles'").'<br></td>';
					echo('</tr>');
				}

				?>
			</tbody>
		</table>
	</div>
	<?php }

	if (sizeOf($titulos) <= 0 && sizeOf($personas) <= 0 && sizeOf($personajes) <= 0 ) { ?>
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
