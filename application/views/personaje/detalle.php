<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>

<!-- Main content -->
<div class="col-sm-8">
	<h1>Detalles del personaje</h1>
	<?php
		echo("<ul>");
		echo("<li><strong>ID: </strong>". $personaje->id ."</li>");
		echo("<li><strong>Nombre: </strong>". $personaje->nombre ."</li>");
		echo("<li><strong>Descripción: </strong>". $personaje->descripcion ."</li>");
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
