<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once("autoload.php");
if(isset($_POST['type'])){
	if($_POST['type']=="admin"){
		if($_POST['password']=="toto"){
			$_SESSION['admin']=true;
			$_SESSION['infomsg'] = "Bienvenue maitre admin";
			$_SESSION['infotype'] = "success";
			header('Location:admin.php');
		}else{
			header('Location:connexionadmin.php');
		}
	}else{
		if(empty($_POST['nomprenom']) || empty($_POST['societe'])){
			$_SESSION['infomsg'] = "Erreur, champs incomplet";
			$_SESSION['infotype'] = "danger";
			header('Location: index.php');
			exit();
		}
		$cli = new Client($_POST['nomprenom'],$_POST['societe']);
		$type = "ACTION";
		if($_POST['type']=="newvisitor"){
			$conn = new connexionBDD();
			$conn->ajouterClient($cli);
			$type = "ARRIVEE";
		}else if($_POST['type']=="reconexion"){
			$type = "RECONNEXION";
		}

		$log = new BDDLog();
		$log->ajouterLigne($type,$cli);
		// // Ouverture du fichier
		// $d = date('m-y',time());
		// $fp = fopen ("log/log".$d.".txt", "a");

		// fseek ($fp, 0);
		// $r = chr(13); 
		// // Ecriture dans le fichier
		// fprintf($fp,date('Y-m-d H:i:s',time()). " = ".$type." : " .$_POST['nomprenom']."  ".$_POST['societe'].$r);
		

		// // Fermeture du fichier 
		// fclose ($fp);
		
		$_SESSION['client'] = serialize($cli);
		header('Location: listeContact.php?');
	}
}
?>
<div class="row">
	<div class="col-xs-10 col-xs-offset-1">
		<h1 class="text-center">Déjà sur place?</h1>
		<p class="text-center"><i>Choisissez votre nom dans la liste ci-dessous :</i></p>
		<div class="tableresize" style="overflow-y:auto">
			<table class="table table-striped tablevisitor">
				<?php
				$conn = new connexionBDD();
				$reponse = $conn->afficherClient();

				while ($donnees = $reponse->fetch(PDO::FETCH_ASSOC))
				{
					echo "<tr>
					<td width='75%'> ".$donnees['Nom']." </td>
					<td class='no-padding'  width='25%'>
					<form Action ='connexion.php' method ='post' role='form' act>
					<input type='hidden' id='nomprenom' name='nomprenom' value='".$donnees['Nom']."''>
					<input type='hidden' id='societe' name='societe' value='".$donnees['Societe']."''>
					<input type='hidden' id='type' name='type' value='reconexion'>

					<button type='submit' class='btn btn-primary pull-right big' style='display:none;width:100%'>C'est bien moi</a>

					</form>
					</td> 
					</tr>";
				}


				?>
			</table>
		</div>
	</div>

</div>