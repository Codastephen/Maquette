<?php
require_once("autoload.php");

session_start();
if(isset($_GET['nomprenom']) && isset($_GET['societe'])){
	$nomprenom = $_GET['nomprenom'];
	$societe = $_GET['societe'];

	$cli = new Client($nomprenom,$societe);
	$bdd = new ConnexionBDD();
	$bdd->retirerClient($cli);
	
	$log = new BDDLog();
	$log->ajouterLigne("DEPART",$cli);
	
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