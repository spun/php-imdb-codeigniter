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
				<th>Photo</th>
				<th>Name</th>
			</tr>
		</thead>
		<tbody>
			<?php

			$index = 1;
			foreach($personas as $persona) {
				echo('<tr>');
					echo '<td>'.$index.'</td>';
					echo '<td>'.img(array(
						'src'   => base_url("assets/personas/" . ((isset($persona->foto) && !empty($persona->foto)) ? $persona->foto : 'default.jpg' )),
						'class'   => 'overview-image',
						'width'=> '45'
					)).'</td>';

					echo '<td valign="middle">'.anchor("/persona/".$persona->id, $persona->nombre, "title='Ver detalles'").'<br></td>';
				echo('</tr>');
				$index++;
			}

			?>
		</tbody>
	</table>
	<?php if (sizeOf($personas) <= 0) { ?>
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
