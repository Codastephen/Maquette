<?php 
require_once 'autoload.php';
?>

<div class="row">
  <div class="col-xs-4 col-xs-offset-1">
    <h1 class="text-center">Nouvel arrivant</h1>
    <form Action ="connexion.php" method ="post" role="form" act>
      <div class="form-group">
        <label for="nomprenom">Nom Prénom :</label>
        <input type="text" class="form-control" id="nomprenom" name ="nomprenom" placeholder="Entrer votre nom prénom" required>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Société :</label>
        <input type="text" class="form-control" id="societe" name ="societe" placeholder="Entrer votre société" required>
      </div>
      <input type="hidden" name="type" value="visitor">

      <button type="submit" class="btn btn-success btn-lg pull-right">Valider</button>
    </form>
  </div>
  <div class="col-xs-4 col-xs-offset-2">
    <h1 class="text-center">Déjà inscrit?</h1>
    <table id="tablevisitor" class="table table-hover table-striped">
      <th>
        NomPrénom
      </th>
      <th></th>
      <?php
	  		$conn = new connexionBDD();
			$reponse = $conn->afficherClient();
			
			while ($donnees = $reponse->fetch())
			{
				echo "<tr> <td> ".$donnees['Nom']." </td> <td><a href='listeContact.php?id=".$key."' class='btn btn-primary' style='opacity:0'>C'est bien moi</a></td> <tr>";
			}

				
      ?>
    </table>
  </div>
</div>
		

