<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>


<!-- Main content -->
<div class="col-sm-8">
	<h1>Detalles de la persona</h1>
	<?php
		echo("<ul>");
		echo("<li><strong>ID: </strong>". $persona->id ."</li>");
		echo("<li><strong>Nombre: </strong>". $persona->nombre ."</li>");
		echo("<li><strong>Descripción: </strong>". $persona->descripcion ."</li>");
		echo("</tr>");
	?>
</div>

<!-- Sidebar content -->
<div class="sidebar-box well col-sm-4">
	Sidebar
</div>

<?php
	$this->load->view('inc/pie.php');
?>
