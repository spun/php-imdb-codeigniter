<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera_gestion.php');
?>

	<div style="margin: 50px 10px;">
		<?php echo $output; ?>
	</div>

<?php
	$this->load->view('inc/pie_gestion.php');
?>
