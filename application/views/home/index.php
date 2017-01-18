<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>


<?php
	foreach($usuarios as $usuario) {
		echo("<tr>");
		echo("<td>". $usuario->id ."</td>");
		echo("<td>". $usuario->nombre ."</td>");
		echo("<td>". $usuario->password ."</td>");
		echo("</tr>");
	}
?>

<?php
	$this->load->view('inc/pie.php');
?>
