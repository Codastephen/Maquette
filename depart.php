<?php 
require_once("autoload.php");
$titre = "Départ";
session_start();
ob_start(); ?>
<div class="row text-center">
	<h1>Qui êtes-vous?</h1>
</div>

<div class="row">
	<div class="col-xs-6 col-xs-offset-3">
		<table id="tablevisitor" class="table table-hover table-striped">
			<thead>
				<tr>
					<th col-width=4>
						Nom et prénom
					</th>
					<th col-width=2></th>
				</tr>
			</thead>
			<tbody>
			<?php
			
			$conn = new connexionBDD();
			$reponse = $conn->afficherClient();
			
			while ($donnees = $reponse->fetch())
			{
				echo "<tr> <td> ".$donnees['Nom']." </td><tr>";
			}
				
			?>
			</tbody>
		</table>
		<a class="btn btn-danger btn-lg pull-right" href="index.php">Retour</a>

	</div>
</div>

<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>
