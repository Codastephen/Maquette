<!DOCTYPE html>
<html lang="en">
  <head>
	<?php
		require_once('header.php');
	?>
  </head>
 <body>

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
		
	<?php
		$cli = new Client();
		
		$cli->toString();
	?>
    <!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

  </body>
</html>
