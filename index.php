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
			<!-- <div id="defilor2" class="col-xs-12">
				<div class="marquee">
					<ul>
						<li>
							<div class="imgs">
								<p>toto tutu titi toto tutu titi toto tutu titi toto tutu titi toto tutu titi toto tutu titi toto tutu titi toto tutu titi toto tutu tititoto tutu titi toto tutu titi toto tutu titi toto tutu titi toto tutu titi toto tutu titi</p>
							</div>
						</li>
						<li>
							<div class="imgs">
																
								<p>toto tutu titi toto tutu titi toto tutu titi toto tutu titi toto tutu titi toto tutu titi toto tutu titi toto tutu titi toto tutu tititoto tutu titi toto tutu titi toto tutu titi toto tutu titi toto tutu titi toto tutu titi</p>

							</div>
						</li>
					</ul>
				</div>
				
			</div> -->
			<marquee id="defilor" direction="left" scrolldelay="80" scrollamount="5" scrolldelay="0">
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
<div id="helper" class="text-center">
	<div class="row">
		<div class="col-xs-12">
			<p>Besoin d'aide?</p>
		</div>
	</div>
	<div class="row">
		<div id="content" class="col-xs-12">
			<a id="helperA" href="#home">
				<div class="row">
					<div class="col-xs-4 col-xs-offset-4">
						<img src="./img/help_black.PNG" class="img-responsive">
					</div>
				</div>
				<h3>Appel à l'aide</h3>
			</a>
		</div>
	</div>
</div>

<?php $contenu = ob_get_clean(); ?>


<?php require 'layout.php'; ?>