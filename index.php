<?php $titre = "Accueil" ?>

<?php ob_start(); ?>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="row">
			<div class="col-sm-5">
				<a href="presence.php">
					<img src="./img/arrivee.png" class="img-responsive"/>
				</a>
			</div>
			<div class="col-sm-5 col-sm-offset-2">
				<a href="depart.php">
					<img src="./img/depart.png" class="img-responsive"/>
				</a>
			</div>
		</div>
	</div>
</div>
<div class="row" style="margin-top : 5%">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="row">
			<div class="col-sm-5">
				<a href="plan.php">
					<img src="./img/map.png" class="img-responsive"/>
				</a>
			</div>
			<div class="col-sm-5 col-sm-offset-2">
				<a href="help.php">
					<img src="./img/help.png" class="img-responsive"/>
				</a>
			</div>	
		</div>
	</div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>