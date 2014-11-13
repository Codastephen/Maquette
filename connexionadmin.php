<?php $titre = "Admin" ?>
<?php require_once("autoload.php"); ?>
<?php session_start(); ?>
<?php ob_start(); ?>
<div class="row text-center">
	<h1>Qui êtes-vous?</h1>
</div>

<div class="row">
	<div class="col-xs-6 col-xs-offset-3">
		<form Action ="connexion.php" method ="post" role="form" act>
			<div class="form-group">
				<label for="password">Password :</label>
				<input type="password" class="form-control" id="password" name ="password" required>
			</div>
			<input type="hidden" name="type" value="admin">

			<button type="submit" class="btn btn-success btn-lg">Valider</button>
			<a class="btn btn-danger btn-lg" href="index.php">Retour</a>
		</form>
	</div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>