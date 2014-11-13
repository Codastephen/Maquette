<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once("autoload.php");
if(isset($_POST['type'])){
	if($_POST['type']=="admin"){
		if($_POST['password']=="toto"){
      $_SESSION['admin']=true;
			header('Location:admin.php');
		}else{
			header('Location:connexionadmin.php');
		}
	}else{
		$conn = new connexionBDD();
		$cli = new Client($_POST['nomprenom'],$_POST['societe']);
		$conn->ajouterClient($cli);

		// Instruction 1
		$fp = fopen ("log/log.txt", "a");

		// Instruction 4
		fseek ($fp, 0);
		$r = chr(13); 
		// Instruction 5
		fprintf($fp,date('Y-m-d H:i:s',time()). " = " .$_POST['nomprenom']." de la société ".$_POST['societe']." est arrivé".$r);
		
								
		// Instrcution 6
		fclose ($fp);

		
    $_SESSION['client'] = serialize($cli);
		header('Location: listeContact.php');
	}
}
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
    <div style="overflow-y: auto; height: 400px">
      <table id="tablevisitor" class="table  table-striped">
        <th>
          Nom prénom
        </th>
        <th></th>
        <?php
        $conn = new connexionBDD();
        $reponse = $conn->afficherClient();

        while ($donnees = $reponse->fetch())
        {
          echo "<tr> <td> ".$donnees['Nom']." </td> <td><a href='listeContact.php?id=0' class='btn btn-primary' style='display:none'>C'est bien moi</a></td> </tr>";
        }


        ?>
      </table>
    </div>
  </div>
  
</div>