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