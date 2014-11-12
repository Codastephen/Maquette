<?php $titre = "Accueil" ?>
<?php require("autoload.php"); ?>
<?php session_start(); ?>
<?php ob_start(); ?>
<div class="row text-center">
	<h1>Qui êtes-vous?</h1>
</div>

<div class="row">
	<div class="col-xs-6 col-xs-offset-3">
		<table id="tablevisitor" class="table table-hover table-striped">
			<th class="col-md-4">
				Nom
			</th>
			<th class="col-md-4">
				Prénom
			</th>
			<th class="col-md-2"></th>
			<?php
			foreach ($_SESSION['liste']->_liste as $key=>$item) {
				echo "<tr> <td> ".$item->_nom." </td> <td> ".$item->_prenom." </td> <td><a href='listeContact.php?id=".$key."' class='btn btn-primary' style='opacity:0'>C'est bien moi</a></td><tr>";
				}
			?>
		</table>
		<a class="btn btn-default" href="selectconnexion.php">Retour</a>

	</div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>