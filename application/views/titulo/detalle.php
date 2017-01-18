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
	}
?>
</table>

<?php
	$this->load->view('inc/pie.php');
?>
