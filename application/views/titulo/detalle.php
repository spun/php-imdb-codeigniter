<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>


<!-- Main content -->
<div class="col-sm-8">
	<div class="title-hero" >
		<h1><?= $titulos->titulo ?> <small>(<?= $titulos->anyo ?>)</small></h1>
		<p>
			<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
			<?= $titulos->puntuacion ?> (<?= $titulos->num_votos ?>)
		</p>

		<?php
			if(isset($titulos->imagen) && !empty($titulos->imagen)) {
				echo img(array(
					'src'   => base_url("assets/posters/" . $titulos->imagen),
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

<?= $titulos->id ?>
<?= $titulos->titulo ?>
<?= $titulos->anyo ?>
<?= $titulos->descripcion ?>
<?= $titulos->puntuacion ?>
<?= $titulos->num_votos ?>
<?= $titulos->imagen ?>


<table>
<?php
	foreach($cast as $c) {
		echo("<tr>");
		if($c->persona_id) {
			echo "<td>".anchor("/persona/".$c->persona_id, $c->persona, "title='Ver detalles'")."</td>";
		} else {
			echo("<td>". $c->persona_alt ."</td>");
		}

		if($c->personaje_id) {
			echo "<td>".anchor("/personaje/".$c->personaje_id, $c->personaje, "title='Ver detalles'")."</td>";
		} else {
			echo("<td>". $c->personaje_alt ."</td>");
		}
		echo("</tr>");
	}
?>
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

</div>

<!-- Sidebar content -->
<div class="well col-sm-4">
	Sidebar
</div>

<?php
	$this->load->view('inc/pie.php');
?>
