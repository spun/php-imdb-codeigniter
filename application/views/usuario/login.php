<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

</head>
<body>

<div id="container">
	<h1>Login</h1>
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
echo form_close(); ?>

</div>

</body>
</html>