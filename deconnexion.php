<?php 
require_once("autoload.php");
?>

<div class="row">
	<div class="col-xs-8 col-xs-offset-2">
		<h1 class="text-center">Qui êtes-vous?</h1>
		<div class="tableresize" style="overflow-y:auto">
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
						<a class='btn btn-danger btn-hidden' href='validatedeconnexion.php?nomprenom=".$donnees['Nom']."&societe=".$donnees['Societe']."' style='vertical-align:middle'>Valider</a>
						</td>
						</tr>";
					}

					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
