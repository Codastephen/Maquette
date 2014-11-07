<?php $titre = "Départ" ?>
<?php require("autoload.php"); ?>
<?php session_start(); ?>
<?php ob_start(); ?>
<div class="row text-center">
	<h1>Qui êtes-vous?</h1>
</div>

<div class="row">
	<div class="col-xs-6 col-xs-offset-3">
		<table id="tablevisitor" class="table table-hover table-striped">
			<thead>
				<tr>
					<th col-width=4>
						Nom
					</th>
					<th col-width=4>
						Prénom
					</th>
					<th col-width=2></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($_SESSION['liste']->_liste as $item) {
					echo "<tr> <td> ".$item->_nom." </td> <td> ".$item->_prenom." </td> <td><a href='listeContact.php' class='btn btn-primary' style='opacity:0'>C'est bien moi</a><td></tr>";
				}
				?>
			</tbody>

		</table>
		<a class="btn btn-danger btn-lg" href="#">Partir</a>
		<a class="btn btn-default btn-lg pull-right" href="index.php">Retour</a>

	</div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>
