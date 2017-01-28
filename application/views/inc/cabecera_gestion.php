<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Gestión</title>

	<?php foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>

	<link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>" />
</head>
<body>

	<header>
		<?php
			$this->load->view('inc/menu_gestion.php');
		?>
	</header>

	<main>