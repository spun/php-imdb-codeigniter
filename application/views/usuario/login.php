<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>

	<h1>Entrada de usuarios</h1>


<?php

	if (isset($mensajeErrorGlobal)) {
		echo $mensajeErrorGlobal;
	}

	// Muestra los errores que se pueden generar en el formulario
	// echo validation_errors('<div class="error">', '</div>');

	// Creación del formulario
	echo form_open('usuario/login');

	// CORREO
	echo form_input(array(
		'type'			=> 'email',
        'name'          => 'correo',
        'placeholder'   => 'Correo electrónico'
	), set_value('correo'));
	// Mensaje de error del campo de correo
	echo form_error('email', '<div class="error">', '</div>');


	// CONTRASEÑA
	echo form_password(array(
        'name'          => 'password',
        'placeholder'   => 'Contraseña'
	),  set_value('password'));
	// Mensaje de error del campo de contraseña
	echo form_error('password', '<div class="error">', '</div>');

	echo form_submit('loginFormSubmit', 'Entrar');
	echo form_close();
?>

<?php
	$this->load->view('inc/pie.php');
?>
