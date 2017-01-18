<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera_gestion.php');
?>

	<main>
		<div>
			<?php echo $output; ?>
		</div>
	</main>

<?php
	$this->load->view('inc/pie.php');
?>
