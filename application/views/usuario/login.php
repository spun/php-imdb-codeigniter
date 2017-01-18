<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>

<?php
	$this->load->helper('form');
	$correo = 'correo@email.com';
	$password = 'password';
	echo form_open('/usuario/doLogin');
?>

<input type="email" name="correo" value="<?php echo $correo; ?>" />
<input type="password" name="password" value="<?php echo $password; ?>" />

<?php
	echo form_submit('mysubmit', 'Login!');
	echo form_close();
?>

<?php
	$this->load->view('inc/pie.php');
?>
