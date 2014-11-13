<?php $titre = "Accueil" ?>
<?php require_once("autoload.php"); ?>
<?php session_start(); ?>
<?php ob_start(); ?>
<div class="row text-center">
	<h1>Qui êtes-vous?</h1>
</div>

<div class="row">
	<div class="col-xs-6 col-xs-offset-3">
		<table id="tablevisitor" class="table table-hover table-striped">
			<th class="col-md-4">
				Nom et prénom
			</th>
			<th class="col-md-2"></th>
			<?php
			
			$conn = new connexionBDD();
			$reponse = $conn->afficherClient();
			
			while ($donnees = $reponse->fetch())
			{
				echo "<tr> <td> ".$donnees['Nom']." </td><tr>";
			}
				
			?>
		</table>
		<a class="btn btn-default" href="selectconnexion.php">Retour</a>

	</div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>