<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
	$this->load->view('inc/cabecera.php');
?>


<!-- Main content -->
<div class="col-sm-8 main-content">
	<h4>Most Popular by Genre</h4>
	<p>Love romantic-comedies? Action-thrillers? Film noir? Explore genres and popular sub-genres below.</p>

	<?php
		$numGeneros = sizeOf($generos);
		$generosColIzq = round($numGeneros / 2, 0, PHP_ROUND_HALF_UP);
	?>

	<div class="row lista-generos">
		<div class="col-lg-6">
			<?php
			for ($i = 0; $i < $generosColIzq; $i++) {
				echo '<h4>'.anchor('/generos/'.$generos[$i]->id, $generos[$i]->nombre.' >>', "title='Top".$generos[$i]->nombre."'").'</h4>';
			}
			?>
		</div>

		<div class="col-lg-6">
			<?php
			for ($i = $generosColIzq; $i < $numGeneros; $i++) {
				echo '<h4>'.anchor('/generos/'.$generos[$i]->id, $generos[$i]->nombre.' >>', "title='Top".$generos[$i]->nombre."'").'</h4>';
			}
			?>
		</div>
	</div>
</div>

<!-- Sidebar content -->
<div class="sidebar-box well col-sm-4">
	Sidebar
</div>


<?php
	$this->load->view('inc/pie.php');
?>
