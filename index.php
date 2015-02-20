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
			<script type="text/javascript">
			function reloadMap(){
				$("#frameMap").attr("src","https://www.google.com/maps/d/embed?mid=z_9Z8qcyca8M.kmf_NMfHVoMc");
			}
			</script>
			<li role="presentation">
				<a href="#map" aria-controls="map" role="tab" data-toggle="tab" onclick="reloadMap()">
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
		<div id="defilor-container" class="row" >
			<div id="defilor" data-duration='15000'>
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
	<a href="./printSecurity.php">
		<img id="rowlogo" src="./img/designal.png" class="img-responsive"/>	
	</a>
</div>

<?php $contenu = ob_get_clean(); ?>


<?php require 'layout.php'; ?>