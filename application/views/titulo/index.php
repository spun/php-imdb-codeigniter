<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>


<!-- Main content -->
<div class="col-sm-8">
	<h1>Lista de títulos</h1>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Titulo</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($titulos as $titulo) {
				echo("<tr>");
				echo("<td>". $titulo->id ."</td>");
				echo "<td>".anchor("/titulo/".$titulo->id, $titulo->titulo, "title='Ver detalles'")."</td>";
				echo("</tr>");
			} ?>
		</tbody>
	</table>
</div>

<!-- Sidebar content -->
<div class="sidebar-box well col-sm-4">
	Sidebar
</div>




<?php
	$this->load->view('inc/pie.php');
?>
