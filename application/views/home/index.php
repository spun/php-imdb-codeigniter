<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

<nav>
	[<?php echo anchor("/home/index", "Inicio", "title='Volver a la página principal'"); ?>]
	[<?php echo anchor("/usuario/registro", "Registro", "title='Registro de usuarios'"); ?>]
	[<?php echo anchor("/usuario/login", "Login", "title='Entrada de usuarios'"); ?>]

	<?php
		foreach($usuarios as $usuario) {
			echo("<tr>");
			echo("<td>". $usuario->id ."</td>");
			echo("<td>". $usuario->nombre ."</td>");
			echo("<td>". $usuario->password ."</td>");
			echo("</tr>");
		}
	?>
</nav>
</body>
</html>