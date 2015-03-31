<?php $titre =" cerfil"?>
<?php require_once("autoload.php"); ?>
<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<?php ob_start(); ?>
<br/><br/><br/>
<div class="col-xs-10 col-xs-offset-1 text-center">
	<h1>Pour recevoir la liste des personnes présentes sur les lieux, merci de saisir le mot de passe</h1>
</div>

<div class="row">
	<div class="col-xs-6 col-xs-offset-3">
		<form Action ="listing.php" method ="post" role="form" act>
			<div class="form-group">
				<label for="password">Mot de passe :</label>
				<input type="password" class="form-control borne" id="password" name ="password" required>
			</div>

			<button type="submit" class="btn btn-success btn-lg">Valider</button>
			<button class="btn btn-warning btn-lg" onclick="window.location='./index.php'">Retour à l'accueil de la borne</button>
		</form>
		<br/>
		<?php include("alert.php") ?>
	</div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>