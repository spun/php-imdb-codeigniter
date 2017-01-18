<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>

<table>
<?php
	foreach($personas as $persona) {
		echo("<tr>");
		echo("<td>". $persona->id ."</td>");
		echo("</tr>");
		echo("<tr>");
		echo("<td>". $persona->nombre ."</td>");
		echo("</tr>");
		echo("<tr>");
		echo("<td>". $persona->descripcion ."</td>");
		echo("</tr>");
	}
?>
</table>

<?php
	$this->load->view('inc/pie.php');
?>
