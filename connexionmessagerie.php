<?php $titre = "Admin" ?>
<?php require_once("autoload.php"); ?>
<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
} ?>
<?php ob_start(); ?>
<div class="row text-center">
	<h1>Qui êtes-vous?</h1>
</div>

<div class="row">
	<div class="col-xs-6 col-xs-offset-3">
		<form Action ="ldap.php" method ="post" role="form" act>
			<div class="form-group">
				<label for="name">Name :</label>
				<input type="text" class="form-control" id="name" name ="name" required>
			</div>
			<div class="form-group">
				<label for="password">Password :</label>
				<input type="password" class="form-control" id="password" name ="password" required>
			</div>

			<button type="submit" class="btn btn-success btn-lg">Valider</button>
		</form>
	</div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>