<?php $titre = "Accueil" ?>

<?php ob_start(); ?>
<div class="row" style="margin-bottom : 50px">
	<div class="col-lg-4 col-lg-offset-4">
		<img src="./img/designal.jpg"/>
	</div>
</div>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="row">
			<div class="col-sm-5">
				<button type="button" class="btn btn-lg btn-success btn-block" onclick="self.location.href='presence.php'"  >Signaler votre présence</button> </br></br>
			</div>
			<div class="col-sm-5 col-sm-offset-2">
				<button type="button" class="btn btn-lg btn-danger btn-block" onclick="self.location.href='depart.php'">Signaler votre départ</button> </br></br>
			</div>	
		</div>
		<div class="row">
			<div class="col-sm-5">
				<button type="button" class="btn btn-lg btn-primary btn-block" onclick="self.location.href='plan.php'">Obtenir le plan</button> </br></br>
			</div>	
			<div class="col-sm-5 col-sm-offset-2">
				<button type="button" class="btn btn-lg btn-info btn-block">Aide </button> </br></br>
			</div>	
		</div>
	</div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>