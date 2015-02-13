<?php 
$titre = "Accueil";

require_once("autoload.php");
session_start();

if(isset($_SESSION['visiteur'])){
	unset($_SESSION['visiteur']);
}
	
ob_start(); ?>
<div class="row">
	<div class="col-sm-2 no-padding border-white" role="tabpanel">
		<ul id="myTab" class="nav nav-stacked" role="tablist">
			<li role="presentation">
				<a href="#home" aria-controls="home" role="tab" data-toggle="tab">
					<div class="col-xs-12 wrapper-img text-center">
						<img src="./img/home.png" class="img-responsive">
						<h3>Accueil</h3>
					</div>
				</a>
			</li>
			<li role="presentation">
				<a href="#reconnexion" aria-controls="signal" role="tab" data-toggle="tab">
					<div class="col-xs-12 wrapper-img text-center">
						<img src="./img/id.png" class="img-responsive">
						<h3>Déjà sur place</h3>
					</div>
				</a>
			</li>
			<li role="presentation">
				<a href="#leave" aria-controls="depart" role="tab" data-toggle="tab">
					<div class="col-xs-12 wrapper-img text-center">
						<img src="./img/leave.png" class="img-responsive">
						<h3>Départ</h3>
					</div>
				</a>
			</li>
			<li role="presentation">
				<a href="#map" aria-controls="map" role="tab" data-toggle="tab">
					<div class="col-xs-12 wrapper-img text-center">
						<img src="./img/office.png" class="img-responsive">
						<h3>Plan et numéros utiles</h3>
					</div>
				</a>
			</li>
		</ul>

		<!-- Tab panes -->


	</div>
	<div class="col-sm-10 borderer">
		<div id="defilor-container" class="row">
			<div id="defilor" data-duration='30000'>
			</div>
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
				<?php include 'reconnexion.php' ?>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="leave">
				<?php include 'deconnexion.php';?>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="map">
				<?php include 'plan.php';?>
			</div>
		</div>
	</div>
	<!--<div id="helper" class="text-center">
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
							<img src="./img/bell-black.png" class="img-responsive">
						</div>
					</div>
					<h3>Appel à l'aide</h3>
				</a>
			</div>
		</div>
	</div>-->
</div>

<?php $contenu = ob_get_clean(); ?>


<?php require 'layout.php'; ?>