<?php 
$titre = "Accueil";

require_once("autoload.php");
session_start();

ob_start(); ?>
<div class="row">
	<div class="col-sm-2 no-padding border-white" role="tabpanel">
		<ul id="myTab" class="nav nav-stacked" role="tablist">
			<li role="presentation">
				<a href="#home" aria-controls="home" role="tab" data-toggle="tab">
					<div class="col-xs-12 wrapper-img text-center">
						<img src="./img/people_white.PNG" class="img-responsive">
						<h3>Accueil</h3>
					</div>
				</a>
			</li>
			<li role="presentation">
				<a href="#reconnexion" aria-controls="signal" role="tab" data-toggle="tab">
					<div class="col-xs-12 wrapper-img text-center">
						<img src="./img/people_white.PNG" class="img-responsive">
						<h3>Déjà sur place</h3>
					</div>
				</a>
			</li>
			<li role="presentation">
				<a href="#leave" aria-controls="depart" role="tab" data-toggle="tab">
					<div class="col-xs-12 wrapper-img text-center">
						<img src="./img/depart-logo.PNG" class="img-responsive">
						<h3>Partir</h3>
					</div>
				</a>
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
		<div class="row">
			<marquee id="defilor" class="Scroller" direction="left" width="100%" scrolldelay="80" scrollamount="3" scrolldelay="0">
			</marquee>
			<!-- <div id="defilor" class="col-xs-12 text-center marquee">
			</div> -->
		</div>
		<div id="rowlogo" class="row" style="margin-top:50px">
			<div class="col-xs-8 col-xs-offset-2">
				<a href="index.php">
					<img src="./img/designal.png" class="img-responsive"/>
				</a>
			</div>
		</div>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade" id="home">
				<?php include 'home.php';?>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="reconnexion">
				<?php include 'connexion.php';?>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="leave">
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