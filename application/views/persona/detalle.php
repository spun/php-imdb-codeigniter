<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>


<!-- Main content -->
<div class="col-sm-8">
	<h1>Detalles de "<?= $persona->nombre ?>"</h1>
	<?php
		echo('<ul class="bio-persona">');
		echo '<li class="foto img-thumbnail pull-right">'.img(array(
			'src'   => base_url("assets/personas/" . ((isset($persona->foto) && !empty($persona->foto)) ? $persona->foto : 'default.jpg' )),
			'class' => 'overview-image',
			'width'	=> '150'
		)).'</li>';
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
