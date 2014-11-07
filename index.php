<?php $titre = "Accueil" ?>

<?php ob_start(); ?>
<div class="col-lg-4 col-lg-offset-4">
	<img src="./img/designal.jpg"/>
</div>
<div class="col-lg-4 col-lg-offset-4">
	<div class="col-lg-6">
		<button type="button" class="btn btn-default" onclick="self.location.href='presence.php'"  >Signaler votre présence</button> </br></br>
		<button type="button" class="btn btn-default" onclick="self.location.href='plan.php'">Obtenir le plan</button> </br></br>

		<button type="button" class="btn btn-default" onclick="self.location.href='depart.php'">Signaler votre départ</button> </br></br>
		<button type="button" class="btn btn-default">Aide </button> </br></br>
	</div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>