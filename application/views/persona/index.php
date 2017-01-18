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
		echo "<td>".anchor("/persona/".$persona->id, $persona->nombre, "title='Ver detalles'")."</td>";
		echo("</tr>");
	}
?>
</table>

<?php
	$this->load->view('inc/pie.php');
?>
