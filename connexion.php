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
			$cli = $bdd->getVisiteur($_POST['code']);
			if(!$cli){  
				$_SESSION['infomsg'] = "Code incorrect";
				$_SESSION['infotype'] = "danger";
				header('Location: index.php#reconnexion');
				exit();
			}else{ 
				//Mon code de reconnexion est bon
				$type = "RECONNEXION";
				$helper=1;
				BDDLog::ajouterLigne("RECONNEXION",$cli);
			}			
		}else { 
			//Je me connecte
			if(empty($_POST['nomprenom']) || empty($_POST['societe'])){ 
			//Erreurs dans les champs
				$_SESSION['infomsg'] = "Vous n'avez pas saisi tout les champs";
				$_SESSION['infotype'] = "danger";
				header('Location: index.php');
				exit();
			}
			$cli = new Visiteur($_POST['nomprenom'],$_POST['societe']); //Les champs sont bons, création d'un nouveau visiteur
			$conn = new connexionBDD();
			$cli = $conn->ajouterVisiteur($cli);
			$type = "ARRIVEE";
		}
		$_SESSION['visiteur']=serialize($cli);
		header('Location: listeContact.php');
	}
}
function verifAdmin(){
	if($_POST['password']=="4DMIN"){ //Mon mdp est toto
		$_SESSION['admin']=true;
		$_SESSION['infomsg'] = "Bienvenue dans l'interface d'administration";
		$_SESSION['infotype'] = "success";
		header('Location:admin.php');
	}else{ 
	//Mon mdp n'est pas bon ou n'est pas donné
		$_SESSION['infomsg'] = "Mauvais mot de passe";
		$_SESSION['infotype'] = "danger";
		header('Location:connexionadmin.php');
	}
}

?>