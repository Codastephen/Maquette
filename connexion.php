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

		// Ouverture du fichier
		$d = date('m-y',time());
		$fp = fopen ("log/log".$d.".txt", "a");

		fseek ($fp, 0);
		$r = chr(13); 
		// Ecriture dans le fichier
		fprintf($fp,date('Y-m-d H:i:s',time()). " = ARRIVEE : " .$_POST['nomprenom']."  ".$_POST['societe'].$r);
		
								
		// Fermeture du fichier 
		fclose ($fp);

		
    $_SESSION['client'] = serialize($cli);
		header('Location: listeContact.php');
	}
}
?>

<div class="row">
  <div class="col-xs-5 col-xs-offset-1">
    <h1 class="text-center">Nouvel arrivant</h1>
    <p class="text-center"><i>Merci de bien vouloir vous inscrire ci-dessous :</i></p>
    <form Action ="connexion.php" method ="post" role="form" act>
      <div class="form-group">
        <label for="exampleInputPassword1">Société :</label>
        <input type="text" class="form-control" id="societe" name ="societe" placeholder="Entrer votre société" required>
      </div>
      <div class="form-group">
        <label for="nomprenom">Nom et prénom :</label>
        <input type="text" class="form-control" id="nomprenom" name ="nomprenom" placeholder="Entrer votre nom prénom" required>
      </div>
      <input type="hidden" name="type" value="visitor">

      <button type="submit" class="btn btn-success btn-lg pull-right">Valider</button>
    </form>
  </div>
  <div class="col-xs-5">
    <h1 class="text-center">Déjà sur place?</h1>
    <p class="text-center"><i>Choisissez votre nom dans la liste ci-dessous :</i></p>
    <div class="tableresize" style="overflow-y:auto">
      <table id="tablevisitor" class="table  table-striped">
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