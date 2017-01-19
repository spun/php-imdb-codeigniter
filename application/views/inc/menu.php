<nav>

	[<?php echo anchor("/home/index", "Inicio", "title='Volver a la página principal'"); ?>]
	[<?php echo anchor("/titulo", "Titulos", "title='Titulos disponibles'"); ?>]
	[<?php echo anchor("/persona", "Personas", "title='Personas disponibles'"); ?>]
	[<?php echo anchor("/personaje", "Personajes", "title='Personajes disponibles'"); ?>]
	[<?php echo anchor("/usuario/registro", "Registro", "title='Registro de usuarios'"); ?>]
	[<?php echo anchor("/usuario/login", "Login", "title='Entrada de usuarios'"); ?>]
	<?php
		if (isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] == 'admin') {
			echo anchor("/gestion", "Gestion", "title='Gestión de contenido'");
		}
	?>

</nav>