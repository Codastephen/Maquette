<?php 
$titre = "Accueil";

require_once("autoload.php");
session_start();

// $linkdepart = '<div class="wrapper-img" style="background-image :url(\'./img/depart-gray.png\')"></div>';
$linkdepart = '<a href="#depart" aria-controls="depart" role="tab" data-toggle="tab">
<div class="col-xs-12 wrapper-img text-center">
<img src="./img/depart-logo.PNG" class="img-responsive">
<h3>Partir</h3>
</div>
</a>';
?>

<?php ob_start(); ?>
<div class="row">
	<div class="col-sm-2 no-padding" role="tabpanel">
		<ul class="nav nav-stacked" role="tablist">
			<li role="presentation" class="active">
				<a href="#home" aria-controls="home" role="tab" data-toggle="tab">
					<div class="col-xs-12 wrapper-img text-center">
						<img src="./img/people.PNG" class="img-responsive">
						<h3>Accueil</h3>
					</div>
				</a>
			</li>
			<li role="presentation">
				<a href="#signal" aria-controls="signal" role="tab" data-toggle="tab">
					<div class="col-xs-12 wrapper-img text-center active">
						<img src="./img/people.PNG" class="img-responsive">
						<h3>Signaler sa présence</h3>
					</div>
				</a>
			</li>
			<li role="presentation">
				<?php echo $linkdepart ?>
			</li>
			<li role="presentation">
				<a href="#map" aria-controls="map" role="tab" data-toggle="tab">
					<div class="col-xs-12 wrapper-img text-center">
						<img src="./img/map-logo.PNG" class="img-responsive">
						<h3>Plan du site</h3>
					</div>
				</a>
			</li>
		</ul>

		<!-- Tab panes -->


	</div>
	<div class="col-sm-10 borderer">
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="home">
				<?php include 'home.php';?>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="signal">
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