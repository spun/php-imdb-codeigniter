<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title><?php echo isset($tituloHEAD) ? $tituloHEAD . ' - '.webname : webname /*$tituloHEAD;*/ ?></title>

	<link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/custom/css/style.css"); ?>" />
</head>
<body>
	<div class="container">

		<header>
		<?php
			$this->load->view('inc/menu.php');
		?>

		</header>

		<main class="row">
