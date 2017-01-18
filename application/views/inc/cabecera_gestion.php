<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title><?php echo "Gestión TituloHEAD"/*$tituloHEAD;*/ ?></title>

	<?php foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>

	<?php foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>
</head>
<body>

	<header>
		<h1><?php echo "Gestión BO"/*$tituloH1;*/ ?></h1>

		<?php
			$this->load->view('inc/menu_gestion.php');
		?>

	</header>