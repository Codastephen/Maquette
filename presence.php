<?php $titre = "Présence" ?>

<?php ob_start(); ?>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="row">
			<div class="col-sm-5">
				<a class="btn btn-lg btn-success" href="formulairePresence.php">
					Signaler ma présence
				</a>
			</div>
			<div class="col-sm-5 col-sm-offset-2">
				<a class="btn btn-lg btn-danger" href="connecte.php">
					J'ai déjà signalé ma présence
				</a>
			</div>
		</div>
	</div>
</div>
<div class="row" style="margin-top : 5%">
	<div class="col-sm-6 col-sm-offset-3 text-center">
		<a class="btn btn-lg btn-default" href="index.php">
			Retour
		</a>
	</div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>