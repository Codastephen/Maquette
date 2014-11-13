<?php $titre = "Plan d'évacuation";
require_once('autoload.php');
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(!$_SESSION['admin']){
	header('Location:connexionadmin.php');
}
ob_start(); 
?>
<div class="row text-center">
	<h1>Interface d'administration</h1>
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
					echo "<tr>
					<td> ".$donnees['Nom']." </td>
					<td style='vertical-align:middle;'>
					<a class='btn btn-danger btn-hidden' href='validatedeconnexion.php?nomprenom=".$donnees['Nom']."&societe=".$donnees['Societe']."&type=admin' style='vertical-align:middle'>Valider</a>
					</td>
					</tr>";
				}
				
				?>
			</tbody>
		</table>
		<a class="btn btn-lg btn-default pull-right" href="index.php">
			Retour
		</a>
	</div>
</div>
<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>