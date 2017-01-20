<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>


<!-- Main content -->
<div class="col-sm-8">
	<div class="title-hero" >
		<h1><?= $titulo->titulo ?> <small>(<?= $titulo->anyo ?>)</small></h1>
		<p>
			<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
			<?= $titulo->puntuacion ?> (<?= $titulo->num_votos ?>)
		</p>

		<?php
			if(isset($titulo->imagen) && !empty($titulo->imagen)) {
				echo img(array(
					'src'   => base_url("assets/posters/" . $titulo->imagen),
					'class'   => 'poster'
					/*
					'height'=> '200',
					'width' => '200',
					'alt'   => 'alt',
					'class' => 'post_images',
					'title' => 'That was quite a night',
					'rel'   => 'lightbox'*/
				));
				echo("</td></tr>");
			}
		?>
	</div>

	<p><?= $titulo->descripcion ?></p>

	<hr/>

	<h2>Cast</h2>
	<table style="width: 100%;">
		<caption>Cast overview, first billed only:</caption>
		<tbody>
			<?php foreach($cast as $c) {
				echo("<tr>");
				if($c->persona_id) {
					echo "<td>".anchor("/persona/".$c->persona_id, $c->persona, "title='Ver detalles'")."</td>";
				} else {
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


<table>
<?php
	foreach($generos as $genero) {
		echo("<tr>");
		echo "<td>".anchor("/genero/".$genero->genero_id, $genero->nombre, "title='Ver detalles'")."</td>";
		echo("</tr>");
	}
?>
</table>

<?= $titulo->id ?>
<?= $titulo->titulo ?>
<?= $titulo->anyo ?>
<?= $titulo->descripcion ?>
<?= $titulo->puntuacion ?>
<?= $titulo->num_votos ?>
<?= $titulo->imagen ?>


</div>

<!-- Sidebar content -->
<div class="sidebar-box well col-sm-4">
	Sidebar
</div>

<?php
	$this->load->view('inc/pie.php');
?>
