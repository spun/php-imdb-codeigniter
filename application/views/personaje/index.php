<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>

<table>
<?php
	foreach($personajes as $personaje) {
		echo("<tr>");
		echo("<td>". $personaje->id ."</td>");
		echo "<td>".anchor("/personaje/".$personaje->id, $personaje->nombre, "title='Ver detalles'")."</td>";
		echo("</tr>");
	}
?>
</table>

<?php
	$this->load->view('inc/pie.php');
?>
