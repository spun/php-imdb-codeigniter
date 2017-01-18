
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Gestión clientes</title>


	<?php foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>

	<?php foreach($js_files as $file): ?>
		<script src="<?php echo $file; ?>"></script>
	<?php endforeach; ?>

</head>
<body>

	<header>
		<h1>Gestión BO</h1>
	</header>

	<main>
		<div>
			<?php echo $output; ?>
		</div>
	</main>

	<footer>
		<p>Footer</p>
	</footer>

</body>
</html>