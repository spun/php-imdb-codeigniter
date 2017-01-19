<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title><?php echo "TituloHEAD"/*$tituloHEAD;*/ ?></title>

	<link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/custom/css/style.css"); ?>" />
</head>
<body>
	<div class="container">

		<?php
			$this->load->view('inc/menu.php');
		?>

		<header>
			<?php

				if (isset($_SESSION['usuario_id'])) {
					echo $_SESSION['usuario_nombre'] . '(' . $_SESSION['usuario_rol'] .')';
					echo anchor("/usuario/logout", "Logout", "title='Cerrar sesion'");
				}
			?>
		</header>

		<main class="row">
