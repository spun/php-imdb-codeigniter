<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>


<!-- Main content -->
<div class="col-sm-6 main-content registro-form">
	<h1>Registro</h1>

	<?php if (isset($mensajeErrorGlobal)) { ?>
		<div class="alert alert-danger">
			<?= $mensajeErrorGlobal ?>
		</div>
	<?php }

		// Muestra los errores que se pueden generar en el formulario
		// echo validation_errors('<div class="error">', '</div>');

		// Creación del formulario
		echo form_open('usuario/registro');

		// NOMBRE
		// Campo de nombre de usuario
		echo '<div class="form-group">';
		echo form_label('Nombre de usuario', 'nombre');
		echo form_input(array(
	        'name'          => 'nombre',
	        'id'          	=> 'nombre',
	        'placeholder'   => 'Nombre de usuario',
        	'class'			=> 'form-control'
	        /*
	        'id'            => 'username',
	        'value'         => 'johndoe',
	        'maxlength'     => '100',
		echo '<div class="form-group">';
		echo form_label('Correo electrónico', 'correo');
	        'size'          => '50',
	        'style'         => 'width:50%'
	        */
		), set_value('nombre'));
		// Mensaje de error del campo de usuario
		echo form_error('nombre', '<span class="help-block">', '</span>');
		echo '</div>';


		// CORREO
		echo '<div class="form-group">';
		echo form_label('Correo electrónico', 'correo');
		echo form_input(array(
			'type'			=> 'email',
	        'name'          => 'correo',
	        'id'          	=> 'correo',
	        'placeholder'   => 'Correo electrónico',
        'class'			=> 'form-control'
		), set_value('correo'));
		// Mensaje de error del campo de correo
		echo form_error('correo', '<span class="help-block">', '</span>');
		echo '</div>';


		// CONTRASEÑA
		echo '<div class="form-group">';
		echo form_label('Contraseña', 'password');
		echo form_password(array(
	        'name'          => 'password',
	        'id'          	=> 'password',
	        'placeholder'   => 'Al menos 8 caracteres',
        'class'			=> 'form-control'
		), set_value('password'));
		// Mensaje de error del campo de contraseña
		echo form_error('password', '<span class="help-block">', '</span>');
		echo '</div>';


		// REPETICIÓN DE CONTRASEÑA
		echo '<div class="form-group">';
		echo form_label('Confirmación de contraseña', 'passwordConf');
		echo form_password(array(
	        'name'          => 'passwordConf',
	        'id'          	=> 'passwordConf',
	        'placeholder'   => 'Repite la contraseña',
        'class'			=> 'form-control'
		), set_value('passwordConf'));
		// Mensaje de error del campo de repeticion de contraseña
		echo form_error('passwordConf', '<span class="help-block">', '</span>');
		echo '</div>';

		echo form_submit('registroFormSubmit', 'Registrarse', array(
	        'class'			=> 'btn btn-primary'
		));
		echo form_close();
	?>
</div>

<!-- Sidebar content -->
<div class="col-sm-5 col-sm-offset-1 main-content">
<div id="signin-perks">
    <h2>Benefits of your free account</h2>
    <div class="signin-teaser"></div>
    <p><strong>Personalized Recommendations</strong><br>Discover shows you'll love.</p>
    <p><strong>Your Watchlist</strong><br>Track everything you want to watch and receive e-mail when movies open in theaters.</p>
    <p><strong>Your Ratings</strong><br>Rate and remember everything you've seen.</p>
  </div>
</div>

<?php
	$this->load->view('inc/pie.php');
?>
