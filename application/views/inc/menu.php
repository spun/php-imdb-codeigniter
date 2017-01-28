
<nav class="navbar navbar-inverse imdb-navbar">
    <div class="imdb-navbar-top"></div>
    <div class="container-fluid imdb-navbar-content">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php echo anchor('/home', webname, array('class' => 'navbar-brand imdb-logo')) ?>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Movies, TV <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">MOVIES</li>
                        <li><?php echo anchor('/chart/top', 'Top Rated Movies', "title='Top Rated Movies'") ?></li>
                        <li><?php echo anchor('/chart/popular', 'Most Popular Movies', "title='Most Popular Movies'") ?></li>

                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">CHARTS &amp; TRENDS</li>
                        <li><?php echo anchor('/generos', 'Most Popular by Genre', "title='Most Popular by Genre'") ?></li>

                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">TV &amp; VIDEO</li>
                        <li><?php echo anchor('/chart/toptv', 'Top Rated TV Shows', "title='Top Rated TV Shows'") ?></li>
                        <li><?php echo anchor('/chart/populartv', 'Most Popular TV Shows', "title='Most Popular TV Shows'") ?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Celebs &amp; Photos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">CELEBS</li>
                        <li><?php echo anchor('/chart/celebs', 'Most Popular Celebs', "title='Most Popular Celebs'") ?></li>
                        <li role="separator" class="divider"></li>

                        <li class="dropdown-header">PHOTOS (Comming soon)</li>
                        <li><a href="#">Latest Stills</a></li>
                        <li><a href="#">Latest Posters</a></li>
                    </ul>
                </li>
            </ul>
            <?php echo form_open('search/all', array(
                'class'     => 'navbar-form navbar-left',
                'method'    => 'GET'
            )); ?>
                <div class="form-group form-group-sm">
                    <input type="text" class="form-control" name="s" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-warning btn-sm">Search</button>
            <?php echo form_close(); ?>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['usuario_id'])) {
                ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['usuario_nombre'] ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">

                            <?php if (isset($_SESSION['usuario_rol']) && $_SESSION['usuario_rol'] == 'admin') {
                                echo '<li>'.anchor('/gestion', 'Gestión', "title='Gestión de contenido'").'</li>';
                                echo '<li role="separator" class="divider"></li>';
                            } ?>

                            <li class="dropdown-header">ACTIVITY (comming soon)</li>
                            <li><a href="#">Your Activity</a></li>
                            <li><a href="#">Your Lists</a></li>
                            <li><a href="#">Your Ratings</a></li>
                            <li><a href="#">Recently Viewed</a></li>
                            <li role="separator" class="divider"></li>
                            <li><?php echo anchor('/usuario/logout', 'Logout', "title='Cerrar sesión'") ?></li>
                        </ul>
                    </li>
                <?php
                } else {
                    echo '<li>'.anchor('/usuario/registro', 'Registro', "title='Registro de usuarios'").'</li>';
                    echo '<li>'.anchor('/usuario/login', 'Login', "title='Entrada de usuarios'").'</li>';
                }
                ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
