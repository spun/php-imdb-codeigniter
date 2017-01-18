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
		echo "<td>".anchor("/titulo/".$titulo->id, $titulo->titulo, "title='Entrada de usuarios'")."</td>";
		echo("</tr>");
	}
?>
</table>

<?php
	$this->load->view('inc/pie.php');
?>
