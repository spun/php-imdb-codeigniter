<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>




<div class="col-sm-6 col-sm-offset-3 login-form">
	<h2>Entrada de usuarios</h2>

	<?php if (isset($mensajeErrorGlobal)) { ?>
		<div class="alert alert-danger">
			<?= $mensajeErrorGlobal ?>
		</div>
	<?php }

	// Muestra los errores que se pueden generar en el formulario
	// echo validation_errors('<div class="error">', '</div>');

	// Creación del formulario
	echo form_open('usuario/login');

	// CORREO
	echo '<div class="form-group">';
	echo form_label('Correo electrónico', 'correo');
	echo form_input(array(
		'type'			=> 'email',
		'id'			=> 'correo',
        'name'          => 'correo',
        'placeholder'   => 'Correo electrónico',
        'class'			=> 'form-control'
	), set_value('correo'));
	// Mensaje de error del campo de correo
	echo form_error('email', '<span class="help-block">', '</span>');
	echo '</div>';


	// CONTRASEÑA
	echo '<div class="form-group">';
	echo form_label('Contraseña', 'password');
	echo form_password(array(
        'name'          => 'password',
        'id'          	=> 'password',
        'placeholder'   => 'Contraseña',
        'class'			=> 'form-control'
	),  set_value('password'));
	// Mensaje de error del campo de contraseña
	echo form_error('password', '<span class="help-block">', '</span>');
	echo '</div>';

	echo form_submit('loginFormSubmit', 'Entrar', array(
        'class'			=> 'btn btn-primary'
	));
	echo form_close();
?>


</div>

<?php
	$this->load->view('inc/pie.php');
?>
