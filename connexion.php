<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
require_once("autoload.php");
if(isset($_POST['type'])){ //J'ai envoyé des infos
	if($_POST['type']=="admin"){ //Je suis admin
		verifAdmin();
	}else{ 
		//Je suis visiteur
		if($_POST['type']=='reco'){ 
		//Je me reconnecte
			$bdd = new connexionBDD();
			$cli = $bdd->getClientCode($_POST['code']);
			if(!$cli){  
				$_SESSION['infomsg'] = "Erreur, mauvais code";
				$_SESSION['infotype'] = "danger";
				header('Location: index.php#reconnexion');
				exit();
			}else{ 
				//Mon code de reconnexion est bon
				$type = "RECONNEXION";
				$helper=1;
			}			
		}else { 
			//Je me connecte
			if(empty($_POST['nomprenom']) || empty($_POST['societe'])){ 
			//Erreurs dans les champs
				$_SESSION['infomsg'] = "Erreur, champs incomplet";
				$_SESSION['infotype'] = "danger";
				header('Location: index.php');
				exit();
			}
			$cli = new Client($_POST['nomprenom'],$_POST['societe']); //Les champs sont bons, création d'un nouveau visiteur
			$conn = new connexionBDD();
			$cli = $conn->ajouterClient($cli);
			$type = "ARRIVEE";
			$helper=0;
		}
		$log = new BDDLog();
		$log->ajouterLigne($type,$cli);
		$_SESSION['client']=serialize($cli);
		header('Location: listeContact.php?helper='.$helper);
	}
}
function verifAdmin(){
	if($_POST['password']=="toto"){ //Mon mdp est toto
		$_SESSION['admin']=true;
		$_SESSION['infomsg'] = "Bienvenue maitre admin";
		$_SESSION['infotype'] = "success";
		header('Location:admin.php');
	}else{ 
	//Mon mdp n'est pas bon ou n'est pas donné
		header('Location:connexionadmin.php');
	}
}

?>
<div class="row">
	<div class="col-xs-10 col-xs-offset-1">
		<h1 class="text-center">Déjà sur place?</h1>
		<p class="text-center"><i>Rentrez votre code dans le champ ci-dessous pour vous reconnecter :</i></p>
		<form Action ='connexion.php' method ='post' role='form' act>
			<input type='hidden' id='type' name='type' value='reco'>
			<div class="row">
				<div class="col-xs-6 col-xs-offset-3">
					<input type="number" class="form-control upperCase" id="code" name ="code" autocomplete="off" required>
				</div>
			</div>
			<br/>
			<div class="row">
				<div class="col-xs-4 col-xs-offset-4">
					<button type='submit' class='btn btn-primary btn-lg ' style="width:100%">Se reconnecter</button>
				</div>
			</div>
		</form>
	</div>

</div>