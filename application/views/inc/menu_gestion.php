
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Gestión</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><?php echo anchor("/gestion/index", "Inicio (Usuarios)", "title='Gestionar usuarios'") ?></li>
                <li><?php echo anchor("/gestion/personas", "Personas", "title='Gestionar personas'") ?></li>
                <li><?php echo anchor("/gestion/personajes", "Personajes", "title='Gestionar personajes'") ?></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reparto <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                		<li><?php echo anchor("/gestion/repartos", "Actores", "title='Gestionar personajes'") ?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Titulos <span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <li><?php echo anchor("/gestion/titulos", "Todo", "title='Gestionar titulos'") ?></li>
                        <li><?php echo anchor("/gestion/peliculas", "Peliculas", "title='Gestionar peliculas'") ?></li>
                        <li><?php echo anchor("/gestion/series", "Series", "title='Gestionar series'") ?></li>
                        <li><?php echo anchor("/gestion/episodios", "Episodios", "title='Gestionar episodios'") ?></li>
                    </ul>
                </li>
                <li><?php anchor("/gestion/repartos", "Repartos", "title='Gestionar participación de personajes en títulos'") ?></li>
                <li><?php echo anchor("/gestion/generos", "Géneros", "title='Gestionar géneros'") ?></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><?php echo anchor("/home", "Volver a la web", "title='Volver a la web'"); ?></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<nav>

	[<?php ; ?>]
	[<?php echo anchor("/gestion/titulos", "Titulos", "title='Gestionar titulos'"); ?>]
	[<?php ; ?>]
	[<?php ; ?>]
	[<?php ; ?>]
	{<?php echo anchor("/home", "Volver a la web", "title='Volver a la web'"); ?>}

</nav>