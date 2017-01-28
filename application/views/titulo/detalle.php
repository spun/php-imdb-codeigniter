<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>


<!-- Main content -->
<div class="col-sm-8">
	<div class="detail-overview-box" >

		<!-- main info -->
		<div class="row">

			<div class="col-sm-5">
				<h1><?= $titulo->titulo ?> <small>(<?= $titulo->anyo ?>)</small></h1>
			</div>

			<div class="scores">
				<div class="col-sm-2 user-score pull-right">
					<span class="dropdown-toggle" style="cursor:pointer" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span class="glyphicon glyphicon-star-empty star" aria-hidden="true"></span><?= $votoUsuario ?></span>
					<?php if (isset($_SESSION['usuario_id'])) { ?>
					  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
					  	<?php
					  		if (isset($_SESSION['usuario_id'])) {
							  	for ($i = 10; $i >= 1; $i--) {
								    echo '<li>' . anchor("/titulo/".$titulo->id."/votar/".$i, $i, "title='Votar con un " . $i . "'") . '</li>';
								}
							}
					    ?>
					    <li role="separator" class="divider"></li>
					    <?php
							echo '<li>' . anchor("/titulo/".$titulo->id."/votar/".$i, '<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Remove', "title='Votar con un " . $i . "'") . '</li>';
					    ?>
					  </ul>
					 <?php } ?>
				</div>

				<div class="col-sm-3 global-score pull-right">
					<span class="glyphicon glyphicon-star star" aria-hidden="true"></span>
					<?= number_format($titulo->puntuacion, 1, '.', ' ') ?><span class="max-score">/10</span>
					<span class="num-score">(<?= $titulo->num_votos ?>)</span>
				</div>
			</div>

		</div>

		<!-- extra data -->
		<div class="row overview-extra">
			<?php
				echo $titulo->duracion.' min | ';
				$numGeneros = sizeOf($generos);
				for ($i = 0; $i < $numGeneros; $i++) {
					$genero = $generos[$i];
					if ($i != 0) {
						echo ", ";
					}
					echo anchor("/generos/".$genero->genero_id, $genero->nombre, "title='Ver detalles'");
				}
				echo ' | '.$titulo->anyo;
			?>


		</div>

		<!-- media -->
		<div class="row">
			<?php
				echo img(array(
					'src'   => base_url("assets/posters/" . ((isset($titulo->imagen) && !empty($titulo->imagen)) ? $titulo->imagen : 'default.jpg' )),
					'class'   => 'overview-image'
				));

				echo img(array(
					'src'   => base_url("assets/images/video_placeholder.png"),
					'class' => 'overview-image pull-right'
				));
			?>
		</div>
	</div>

	<div class="main-content">
		<p><?= $titulo->descripcion ?></p>

		<hr/>

		<?php if (isset($temporadas)) {?>
			<h2>Episodes</h2>
			<span><strong>Seasons: </strong>
			<?php foreach ($temporadas as $temporada) {
				echo '['.anchor("/titulo/".$titulo->id."/temporada/".$temporada->num, $temporada->num, "title='Ver temporada'").'] ';
			} ?>
			</span>
			<hr/>
		<?php } ?>

		<h2>Cast</h2>
		<p>Cast overview, first billed only:</p>


		<?php
		if (sizeOf($cast) != 0) {
		?>
			<table style="width: 100%;">
				<tbody>
					<?php foreach($cast as $c) {
						echo("<tr>");
						if($c->persona_id) {
							echo '<td>'.img(array(
								'src'   => base_url("assets/personas/" . ((isset($c->foto) && !empty($c->foto)) ? $c->foto : 'default.jpg' )),
								'class'   => 'overview-image',
								'width'=> '35'
							)).'</td>';
							echo "<td>".anchor("/persona/".$c->persona_id, $c->persona, "title='Ver detalles'")."</td>";

						} else {
							echo '<td>'.img(array(
								'src'   => base_url("assets/personas/default.jpg"),
								'class'   => 'overview-image',
								'width'=> '35'
							)).'</td>';
							echo("<td>". $c->persona_alt ."</td>");
						}

						echo "<td> ... </td>";

						if($c->personaje_id) {
							echo "<td>".anchor("/personaje/".$c->personaje_id, $c->personaje, "title='Ver detalles'")."</td>";
						} else {
							echo("<td>". $c->personaje_alt ."</td>");
						}
						echo("</tr>");
					} ?>
				</tbody>
			</table>

		<?php
		} else {
			echo '<div class="well well-lg">No cast available</div>';
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
