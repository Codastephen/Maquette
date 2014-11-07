<?php $titre = "Départ" ?>
<?php require('Client.php'); ?>
<?php require_once('ListeClient.php'); ?>

<?php ob_start(); ?>
<h3> Veuillez séléctionner votre nom dans la liste ci-dessous </h3> </br> </br>
<table class="table">
	<th>
		Nom
	</th>
	<th>
		Prénom
	</th>
	<th>
		Société
	</th>
	<tr>
		<td>
			Coda	
		</td>
		<td>
			Stephen
		</td>
		<td>
			<button type="button" class="btn btn-default" onclick="self.location.href='presence.php'">Signaler mon départ</button> </br></br>
		</td>
	</tr>
</table>

<button type="button" class="btn btn-default" onclick="self.location.href='presence.php'">Retour</button> </br></br>




<?php $contenu = ob_get_clean(); ?>

<?php require 'layout.php'; ?>
