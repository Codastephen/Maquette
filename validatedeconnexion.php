<?php
require_once("autoload.php");

session_start();
if(isset($_GET['nomprenom']) && isset($_GET['societe'])){
	$nomprenom = $_GET['nomprenom'];
	$societe = $_GET['societe'];

	$cli = new Client($nomprenom,$societe);
	$bdd = new ConnexionBDD();
	$bdd->retirerClient($cli);
	
	// Ouverture du fichier
	$d = date('m-y',time());
	$fp = fopen ("log/log".$d.".txt", "a");

	fseek ($fp, 0);
	$r = chr(13); 
	// Ecriture dans le fichier
	fprintf($fp,date('Y-m-d H:i:s',time()). " = DEPART : " .$_GET['nomprenom']."  ".$_GET['societe'].$r);
		
	// Fermeture du fichier 
	fclose ($fp);
	
	if(isset($_GET['type']) && $_GET['type'] == 'admin'){
		$_SESSION['infomsg'] = "Visiteur bien déconnecté";
		$_SESSION['infotype'] = "warning";
		header("Location: admin.php");
	}else{
		$_SESSION['infomsg'] = "Vous êtes bien déconnecté";
		$_SESSION['infotype'] = "warning";
		header("Location: index.php");
	}
}else{
	$_SESSION['infomsg'] = "Erreur dans la déconnexion";
	$_SESSION['infotype'] = "danger";
	header("Location: index.php");
}

?>