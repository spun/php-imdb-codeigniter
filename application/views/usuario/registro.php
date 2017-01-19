<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>

	<h1>Registro</h1>

<?php

	if (isset($mensajeErrorGlobal)) {
		echo $mensajeErrorGlobal;
	}

	// Muestra los errores que se pueden generar en el formulario
	// echo validation_errors('<div class="error">', '</div>');

	// Creación del formulario
	echo form_open('usuario/registro');

	// NOMBRE
	// Campo de nombre de usuario
	echo form_input(array(
        'name'          => 'nombre',
        'placeholder'   => 'Nombre de usuario'
        /*
        'id'            => 'username',
        'value'         => 'johndoe',
        'maxlength'     => '100',
        'size'          => '50',
        'style'         => 'width:50%'
        */
	), set_value('nombre'));
	// Mensaje de error del campo de usuario
	echo form_error('nombre', '<div class="error">', '</div>');


	// CORREO
	echo form_input(array(
		'type'			=> 'email',
        'name'          => 'correo',
        'placeholder'   => 'Correo electrónico'
	), set_value('correo'));
	// Mensaje de error del campo de correo
	echo form_error('correo', '<div class="error">', '</div>');


	// CONTRASEÑA
	echo form_password(array(
        'name'          => 'password',
        'placeholder'   => 'Contraseña'
	), set_value('password'));
	// Mensaje de error del campo de contraseña
	echo form_error('password', '<div class="error">', '</div>');


	// REPETICIÓN DE CONTRASEÑA
	echo form_password(array(
        'name'          => 'passwordConf',
        'placeholder'   => 'Repite la contraseña'
	), set_value('passwordConf'));
	// Mensaje de error del campo de repeticion de contraseña
	echo form_error('passwordConf', '<div class="error">', '</div>');

	echo form_submit('registroFormSubmit', 'Registrarse');
	echo form_close();
?>

<?php
	$this->load->view('inc/pie.php');
?>
