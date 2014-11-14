<?php 
require_once("autoload.php");
?>

<div class="row">
	<div class="col-xs-10 col-xs-offset-1">
		<h1 class="text-center">Qui êtes-vous?</h1>
		<p class="text-center"><i>Choisissez votre nom dans la liste ci-dessous :</i></p>
		<div class="tableresize" style="overflow-y:auto">
			<table class="table tablevisitor table-striped">
				<?php
				$conn = new connexionBDD();
				$reponse = $conn->afficherClient();

				while ($donnees = $reponse->fetch())
				{
					echo "<tr>
					<td width='75%'> ".$donnees['Nom']." </td>
					<td class='no-padding' width='25%'>
					<a href='validatedeconnexion.php?nomprenom=".$donnees['Nom']."&societe=".$donnees['Societe']."' class='btn btn-danger pull-right big' style='display:none;width:100%'>Partir</a>
					</td>
					</tr>";
				}


				?>
			</table>
		</div>

	</div>
</div>
