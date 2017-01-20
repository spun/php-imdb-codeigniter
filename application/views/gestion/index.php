<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera_gestion.php');
?>

	<div>
		<?php echo $output; ?>
	</div>

<?php
	$this->load->view('inc/pie_gestion.php');
?>
