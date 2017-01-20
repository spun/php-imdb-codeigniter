<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>

<!-- Main content -->
<div class="col-sm-8">
	<h1>Lista de personas</h1>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Persona</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($personas as $persona) {
				echo("<tr>");
				echo("<td>". $persona->id ."</td>");
				echo "<td>".anchor("/persona/".$persona->id, $persona->nombre, "title='Ver detalles'")."</td>";
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
