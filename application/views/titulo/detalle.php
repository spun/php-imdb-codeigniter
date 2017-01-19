<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>

<table>
<?php
	foreach($titulos as $titulo) {
		echo("<tr>");
		echo("<td>". $titulo->id ."</td>");
		echo("</tr>");
		echo("<tr>");
		echo("<td>". $titulo->titulo ."</td>");
		echo("</tr>");
		echo("<tr>");
		echo("<td>". $titulo->anyo ."</td>");
		echo("</tr>");
		echo("<tr>");
		echo("<td>". $titulo->descripcion ."</td>");
		echo("</tr>");
		echo("<tr>");
		echo("<td>". $titulo->puntuacion ."</td>");
		echo("</tr>");
		echo("<tr>");
		echo("<td>". $titulo->num_votos ."</td>");
		echo("</tr>");
		echo("<tr><td>");
		if(isset($titulo->imagen) && !empty($titulo->imagen)) {
			echo img(array(
			        'src'   => base_url("assets/posters/" . $titulo->imagen),
			        'height'=> '200',
			        /*
			        'width' => '200',
			        'alt'   => 'alt',
			        'class' => 'post_images',
			        'title' => 'That was quite a night',
			        'rel'   => 'lightbox'*/
			));
			echo("</td></tr>");
		}
	}
?>
</table>


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


<?php
	$this->load->view('inc/pie.php');
?>
