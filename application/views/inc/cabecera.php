<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title><?php echo "TituloHEAD"/*$tituloHEAD;*/ ?></title>
</head>
<body>

	<header>
		<h1><?php echo "Titulo"/*$tituloH1;*/ ?></h1>

		<?php
			$this->load->view('inc/menu.php');
		?>

	</header>