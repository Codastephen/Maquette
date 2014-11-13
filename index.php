<?php 
$titre = "Accueil";

require_once("autoload.php");
session_start();

$linkdepart = '<div class="wrapper-img" style="background-image :url(\'./img/depart-gray.png\')"></div>';
if(isset($_SESSION['liste'])){
	$size = count($_SESSION['liste']->_liste);

	if($size!=0){
		$linkdepart = '<a href="#depart" aria-controls="depart" role="tab" data-toggle="tab">
		<div class="wrapper-img" style="background-image :url(\'./img/depart.png\')"></div>
		</a>';
	}
}

?>

<?php ob_start(); ?>

<!-- <div class="row">
	<div class="col-sm-2 col-padding-less">
		<a href="formulairePresence.php">
			<div class="wrapper-img" style="background-image :url('./img/signal.png')" data-toggle="tab"></div>
		</a>
	</div>
</div>
<div class="row">
	<div class="col-sm-2 col-padding-less">
		<?php echo $linkreco ?>
	</div>
</div>
<div class="row">
	<div class="col-sm-2 col-padding-less">
		<div class="wrapper-img">
			<?php echo $linkdepart ?>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-sm-2 col-padding-less">
		<div class="wrapper-img">
			<a href="plan.php">
				<div class="wrapper-img" style="background-image :url('./img/map.png')"></div>
			</a>
		</div>
	</div>
</div>
<div class="row"> 
	<div class="col-sm-2 col-padding-less">
		<a href="help.php">
			<img src="./img/help.png" class="img-responsive"/>
		</a>
	</div>	
</div> -->
<div class="row">
	<div class="col-sm-2 no-padding" role="tabpanel">
		<!-- Nav tabs -->
		<ul class="nav nav-stacked" role="tablist">
			<li role="presentation" class="active">
				<a href="#home" aria-controls="home" role="tab" data-toggle="tab">
					<div class="wrapper-img" style="background-image :url('./img/signal.png')"></div>
				</a>
			</li>
			<li role="presentation">
				<?php echo $linkdepart ?>
			</li>
			<li role="presentation">
				<a href="#map" aria-controls="map" role="tab" data-toggle="tab">
					<div class="wrapper-img" style="background-image :url('./img/map.png')"></div>
				</a>
			</li>
		</ul>

		<!-- Tab panes -->


	</div>
	<div class="col-sm-10">
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="home">
				<?php include 'connexion.php';?>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="depart">
				<?php include 'deconnexion.php';?>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="map">
				<?php include 'plan.php';?>
			</div>
		</div>
	</div>
</div>
<?php $contenu = ob_get_clean(); ?>


<?php require 'layout.php'; ?>