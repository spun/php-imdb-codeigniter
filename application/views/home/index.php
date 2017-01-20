<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>


<!-- Main content -->
<div class="col-sm-8">
	<h1>Página de inicio</h1>
	<h2>Lista de usuarios</h2>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Password</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($usuarios as $usuario) {
				echo("<tr>");
				echo("<td>". $usuario->id ."</td>");
				echo("<td>". $usuario->nombre ."</td>");
				echo("<td>". $usuario->password ."</td>");
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
